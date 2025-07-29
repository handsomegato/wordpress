<?php
// Are we being accessed directly ?
if(!defined('PAGELAYER_VERSION')) {
	exit('Hacking Attempt !');
}

// Add tmp attribute to block code
function pagelayer_pro_replace_content_atts($content, $new_atts){
	
	$blocks = parse_blocks( $content );
	$output = '';
	
	foreach ( $blocks as $block ) {
		$block_name = $block['blockName'];
		
		// Is pagelayer block
		if ( is_string( $block_name ) && 0 === strpos( $block_name, 'pagelayer/' ) ) {
			$_block = pagelayer_pro_add_atts_block($block, $new_atts);
			$output .= serialize_block($_block);
			continue;
		}
		
		$output .= serialize_block($block);
	}
		
	return $output;
}

function pagelayer_pro_add_atts_block($block, $new_atts){
	global $pagelayer;
	
	// Load shortcode
	pagelayer_load_shortcodes();
	
	if(empty($block['attrs']['pagelayer-id'])) return $block;
	
	$pl_id = $block['attrs']['pagelayer-id'];
	if (isset($new_atts[$pl_id]) && is_array($new_atts[$pl_id])){
		$block['attrs'] = array_merge($block['attrs'], $new_atts[$pl_id]);
		
		// If block saved by Pagelayer Editor
		if(in_array( $block['blockName'], ['pagelayer/pl_inner_col', 'pagelayer/pl_inner_row'])){
			$block['blockName'] = str_replace('inner_', '', $block['blockName']);
		}
		
		$tag = substr( $block['blockName'], 10 );
		$pl_tag = str_replace('-', '_', $tag);
		
		if(isset($pagelayer->shortcodes[$pl_tag])){
			// Create attribute Object
			
			$innerHTML = pagelayer_isset($pagelayer->shortcodes[$pl_tag], 'innerHTML');
			if(!empty($innerHTML) && isset($block['attrs'][$innerHTML])){
				$block['innerHTML'] = $block['attrs'][$innerHTML];
				$block['innerContent'] = array($block['attrs'][$innerHTML]);
			}
			
		}
	}
	
	// This have innerBlocks
	if(!empty($block['innerBlocks']) && is_array($block['innerBlocks'])){
		foreach($block['innerBlocks'] as $key => $inner_block){
			$block['innerBlocks'][$key] = pagelayer_pro_add_atts_block($inner_block, $new_atts);
		}
	}
	
	return $block;
}

// Add tmp attribute to block code
function pagelayer_pro_extract_editable_atts($content, $only_images = false){
	
	$blocks = parse_blocks( $content );
	
	$el_atts = array();
	foreach( $blocks as $block ){
		$block_name = $block['blockName'];
		
		// Is pagelayer block
		if( is_string( $block_name ) && 0 === strpos( $block_name, 'pagelayer/' ) ){
			pagelayer_pro_parse_ai_atts($block, $el_atts, $only_images);
		}
		
	}
		
	return array_filter($el_atts);
}

function pagelayer_pro_parse_ai_atts($block, &$el_atts, $only_images = false){
	global $pagelayer;
	
	// Load shortcode
	pagelayer_load_shortcodes();
	
	// TODO: if empty then assign id and updated content
	if(empty($block['attrs']['pagelayer-id'])){
		return;
	}
	
	// If block saved by Pagelayer Editor
	if(in_array( $block['blockName'], ['pagelayer/pl_inner_col', 'pagelayer/pl_inner_row'])){
		$block['blockName'] = str_replace('inner_', '', $block['blockName']);
	}
	
	$tag = substr( $block['blockName'], 10 );
	$pl_tag = str_replace('-', '_', $tag);
	
	if(isset($pagelayer->shortcodes[$pl_tag])){
	
		// Create attribute Object
		$pl_props = $pagelayer->shortcodes[$pl_tag];
		$pl_id = $block['attrs']['pagelayer-id'];
		$el_atts[$pl_id] = array();
		
		foreach($pagelayer->tabs as $tab){
			
			if(empty($pl_props[$tab])){
				continue;
			}
			
			foreach($pl_props[$tab] as $section => $_props){
				
				$props = !empty($pl_props[$section]) ? $pl_props[$section] : $pagelayer->styles[$section];
				
				if(empty($props)){
					continue;
				}
				
				// Reset / Create the cache
				foreach($props as $prop => $param){
					
					// No value set
					if(empty($block['attrs'][$prop]) || (isset($param['ai']) && $param['ai'] === false)){
						continue;
					}
										
					// Is editable?
					if(!empty($param['edit']) && empty($only_images)){
						$el_atts[$pl_id][$prop] = $block['attrs'][$prop];
						$el_atts[$pl_id]['blockName'] = $pl_props['name'];
					}
					
					// Is image?
					if(!empty($only_images) && !empty($param['type']) && $param['type'] == 'image'){
						$el_atts['img_urls'][] = $block['attrs'][$prop];
					}
					
					// Is multi_image?
					if(!empty($only_images) && !empty($param['type']) && $param['type'] == 'multi_image'){
						$el_atts['img_urls'][] = $block['attrs'][$prop];
					}
					
				}
			}
		}
		
	}
		
	// This have innerBlocks
	if(!empty($block['innerBlocks'])){
		foreach($block['innerBlocks'] as $key => $inner_block){
			pagelayer_pro_parse_ai_atts($inner_block, $el_atts, $only_images);
		}
	}
	
}

// Call to AI server
function pagelayer_pro_ai_prompt_run($ai_data = array()){
	global $pagelayer;

	if(empty($pagelayer->license) || empty($pagelayer->license['license'])){
		return null;
	}
	
	// Only SoftWP license works
	$ai_data['license'] = $pagelayer->license['license'];
	$ai_data['url'] = apply_filters('pagelayer_ai_siteurl', site_url());
	
	$response = wp_remote_post(PAGELAYER_AI_API, [
		'body'	=> $ai_data,
		'timeout' => 600,
	]);

	$body = wp_remote_retrieve_body($response);
	$result = json_decode($body, true);
	
	if(isset($_GET['debug1']) && $_GET['debug1'] == 'regenerate'){
		pagelayer_print($ai_data);
		pagelayer_print($result);
	}
	
	if(isset($result['error'])){
		// TODO: show this error error if possible
		error_log('API Request Failed: ' . $result['error']);
		return null;
	}
	
	if(isset($result['response'])){
		$json_content = $result['response'];
		
		// Remove markdown code fences if they exist
		if(strpos($json_content, '```') !== false){
			$json_content = preg_replace('/^```(?:json)?\s*/', '', trim($json_content));
			$json_content = preg_replace('/\s*```$/', '', $json_content);
		}

		$generated = json_decode($json_content, true);
	
		if (json_last_error() === JSON_ERROR_NONE) {
			return $generated;
		} else {
			error_log("JSON decode error: " . json_last_error_msg());
			return null;
		}
	}
	
	return null;
}

// The actual function to import the theme
function pagelayer_pro_generate_ai_contents($contents, $args = array()){	
	
	if(empty($args['description'])) return $contents;
	
	$widgets_attrs = [];
		
	// STEP 1: Prepare blocks and extract editable attributes
	foreach($contents as $page => $content){
		
		if(defined('PAGELAYER_BLOCK_PREFIX') && PAGELAYER_BLOCK_PREFIX == 'wp'){
			$content = str_replace('<!-- sp:pagelayer', '<!-- wp:pagelayer', $content);
			$content = str_replace('<!-- /sp:pagelayer', '<!-- /wp:pagelayer', $content);
		}
		
		$contents[$page] = $content;
		
		if(!pagelayer_has_blocks($content)) continue;
		
		$widgets_attrs[$page] = pagelayer_pro_extract_editable_atts($content);
	}
	
	if(empty($widgets_attrs)){
		return $contents;
	}
	
	// STEP 2: Prepare data for AI prompt
	$widgets_attrs_json = json_encode( $widgets_attrs );
	
	$data = [
		'request_type' => 'builder_replacer',
		'site_name' => get_bloginfo('name'),
		'user_context' => $args['description'],
		'widgets_attrs_json' => $widgets_attrs_json
	];
	
	// STEP 3: Run AI prompt
	$new_atts = pagelayer_pro_ai_prompt_run($data);

	// Retry logic if AI prompt fails 
	if(empty($new_atts)){
		if(empty($args['retry'])){
			$args['retry'] = 1;
			$contents = pagelayer_pro_generate_ai_contents($contents, $args);
		}
		return $contents;
	}
	
	// STEP 4: Check for unconverted attributes
	$updated_content = !empty($new_atts)? $new_atts : array();
	$unconverted = array();
	
	foreach($widgets_attrs as $page => $atts){
		$updated = empty($updated_content[$page]) ? [] : $updated_content[$page];
		$_unconverted = pagelayer_pro_unconverted_fields($atts, $updated);
		if(!empty($_unconverted)){
			$unconverted[$page] = $_unconverted;
		}
	}
	
	// STEP 5: Re-run prompt for unconverted fields
	if(!empty($unconverted)){
		$data['widgets_attrs_json'] = json_encode($unconverted);
		$retry_atts = pagelayer_pro_ai_prompt_run($data);
		
		if(!empty($retry_atts)){
			if(!empty($retry_atts) && is_array($retry_atts)){
				foreach($new_atts as $page => $new_fields){
					
					if(empty($retry_atts[$page])) continue;
					
					$new_atts[$page] = array_replace_recursive($new_atts[$page], $retry_atts[$page]);
				}
			}
		}
	}
	
	//pagelayer_print($new_atts);
	foreach($contents as $page => $content){
		
		if(!isset($new_atts[$page])){
			continue;
		}
		
		$content = pagelayer_pro_replace_content_atts($content, $new_atts[$page]);
		
		$contents[$page] = $content;
	}
	
	return $contents;
}

// Content image replace with random images
function pagelayer_pro_replace_rand_imgs($content, $images, &$mapImages = array()) {
	
	if(empty($images) || !is_array($images)){
		return $content;
	}
	
	// Image provide by user to replace
	$image_urls = array_map(function($item) {
		$url = is_array($item) ? $item['image_url'] : $item;
		return strpos($url, 'https://images.pexels.com/photos/') === 0 ? strtok($url, '?') : $url;
	}, $images);
		
	$img_data  = pagelayer_pro_extract_editable_atts($content, true);
	
	if(empty($img_data['img_urls']) || !is_array($image_urls)){
		return $content;
	}
	
	// Copy from original image list
	$rand_images = $image_urls;
	shuffle($rand_images);
	
	foreach($img_data['img_urls'] as $imgUrl){
		$imgUrls = is_string($imgUrl) ? explode(',', $imgUrl) : (is_array($imgUrl) ? $imgUrl : []);
		
		foreach ($imgUrls as $url) {
			$url = trim($url);
			
			// Build a lookup map for replaced images
			if(!pagelayer_pro_is_image_url($url)){
				continue;
			}
						
			// Cache replacements for same URL
			if(!isset($mapImages[$url])) {
				
				// Refill with random images
				if(empty($rand_images)){
					$rand_images = $image_urls;
					shuffle($rand_images);
				}
				
				$first_img = array_shift($rand_images);
				
				// URL replace with first image and removed first image to random image list
				$mapImages[$url] = pagelayer_pro_resize_pexel_img($url, $first_img);
			}
			
			// Replace old image URL with the new one in the content
			$escapedUrl = str_replace('/', '\/', $url);
			$escapedMapUrl = str_replace('/', '\/', $mapImages[$url]);
			$content = str_replace([$url, $escapedUrl], [$mapImages[$url], $escapedMapUrl], $content);
		}
	}
	
	return $content;
}

// Get random Pexels images
function pagelayer_pro_resize_pexel_img($url, $new_url){
	
	if(empty($new_url)){
		return $url;
	}
	
	// Get the dimensions of the old image (assuming the path is local)
	$template_path = apply_filters('pagelayer_template_path', '');
	
	$oldImagePath = str_replace('{{theme_url}}', $template_path, $url); // Replace theme_url placeholder
	
	// Check if the new image URL is from Pexels
	if (strpos($new_url, 'https://images.pexels.com/photos/') !== 0) {
		return $new_url;
	}
	
	// Assuming that the old image is local and can be fetched
	$size = @getimagesize($oldImagePath);
	$size = $size ? $size : [0, 0];

	list($width, $height) = $size;
	
	if(empty($width) || empty($height)){
		return $new_url;
	}
	// Parse existing query parameters and remove width/height
	$parsed_url = parse_url( $new_url );
	parse_str( isset( $parsed_url['query'] ) ? $parsed_url['query'] : '', $query );
	unset( $query['w'], $query['h'] );

	// Ensure optimization parameters are included
	$optimize_defaults = [
		'auto' => 'compress',
		'cs'   => 'tinysrgb',
		'dpr'  => '1',
		'fit'  => 'crop',
		'pl'  => pagelayer_RandomString(4), // Set unique ID for each image to import each suggested image
	];

	// Merge defaults if not already set
	$query = array_merge( $optimize_defaults, $query );

	// Add width and height
	$query['w'] = (int) $width;
	$query['h'] = (int) $height;

	// Rebuild the full URL
	$base = strtok( $new_url, '?' );
	$new_url = $base . '?' . http_build_query( $query );
	
	return $new_url;
}

// Helper function to detect image URLs for import only
function pagelayer_pro_is_image_url($str) {
	return is_string($str) && preg_match('/\.(jpe?g|png|gif)(\?.*)?$/i', $str) && strpos($str, '{{theme_url}}') !== false;
}

function pagelayer_pro_unconverted_fields($inputWidgets, $updatedContent){
	$unconverted = [];
	
	if(empty($updatedContent)){
		return $inputWidgets;
	}

	foreach($inputWidgets as $widgetId => $widgetData){
		foreach ($widgetData as $field => $value) {
			
			// Skip field
			if($field == 'blockName'){
				continue;
			}
			
			// TEXT FIELD CHECK
			if (is_string($value) && strip_tags($value) !== '' && !is_numeric($value)) {
				$original = trim($value);
				$updated = $updatedContent[$widgetId][$field] ? $updatedContent[$widgetId][$field] : '';
				if (is_string($updated) && (trim($updated) === '' || trim($updated) === $original)) {
					$unconverted[$widgetId][$field] = $original;
				}
			}
		}
	}

	return $unconverted;
}

// Download external images like pexels
function pagelayer_pro_download_external_images($content) {
	global $pagelayer;
	
	if (empty($content)){ 
		return $content;
	}

	if (defined('PAGELAYER_BLOCK_PREFIX') && PAGELAYER_BLOCK_PREFIX == 'wp') {
		$content = str_replace('<!-- sp:pagelayer', '<!-- wp:pagelayer', $content);
		$content = str_replace('<!-- /sp:pagelayer', '<!-- /wp:pagelayer', $content);
	}

	if (!pagelayer_has_blocks($content)) return $content;

	$widgets_attrs = pagelayer_pro_extract_editable_atts($content);
	if (empty($widgets_attrs)) return $content;

	$processed_images = [];

	foreach($widgets_attrs as $widget_id => $attrs) {
		if( empty($attrs['img_urls']) || !is_array($attrs['img_urls'])){
			continue;
		}
		
		foreach($attrs['img_urls'] as $image_url) {
			$imgUrls = is_string($image_url) ? explode(',', $image_url) : (is_array($image_url) ? $image_url : []);
			foreach ($imgUrls as $url) {
				if (!is_string($url)){
					continue;
				}
				
				$url = trim($url);
				
				// Caching the image
				if(strpos($url, 'https://images.pexels.com/photos/') === false || isset($pagelayer->import_media[$url])){
					continue;
				}

				// Get ilename
				$filename = basename(strtok($url, '?'));
				
				// We are going to create a loop to find the image
				for($i = 1; $i <= 3; $i++){
					// Upload the image
					$ret = pagelayer_upload_media($filename, file_get_contents($url));
					
					// Lets check the file exists ?
					if(!empty($ret)){
						
						// Lets check if the file exists
						$tmp_image_path = pagelayer_cleanpath(get_attached_file($ret));
						
						// If the file does not exist, simply delete the old upload as well
						if(!file_exists($tmp_image_path)){
							wp_delete_attachment($ret, true);
							$ret = false;
						
						// The image does exist and we can continue
						}else{
							break;
						}
						
					}
				}
				
				if(empty($ret)){
					continue;
				}
				
				// This replaces images when inserting content
				$pagelayer->import_media[$url] = $ret;
				
				$imgs_json = array('sitepad_img_source' => 'pexels.com', 'sitepad_download_url' => $url, 'sitepad_img_lic' => '');
				$fields = array('sitepad_img_source', 'sitepad_download_url', 'sitepad_img_lic');
				
				foreach($fields as $field){
					if(!empty($imgs_json[$field])){
						update_post_meta($ret, $field, $imgs_json[$field]);
					}
				}
			}
		}
	}

	return $content;
}

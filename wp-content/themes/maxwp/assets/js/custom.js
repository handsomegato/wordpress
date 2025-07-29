jQuery(document).ready(function($) {

    if(maxwp_ajax_object.secondary_menu_active){

    //$(".maxwp-nav-secondary .maxwp-secondary-nav-menu").addClass("maxwp-secondary-responsive-menu").before('<div class="maxwp-secondary-responsive-menu-icon"></div>');
    $(".maxwp-nav-secondary .maxwp-secondary-nav-menu").addClass("maxwp-secondary-responsive-menu");

    $( ".maxwp-secondary-responsive-menu-icon" ).on( "click", function() {
        $(this).next(".maxwp-nav-secondary .maxwp-secondary-nav-menu").slideToggle();
    });

    $(window).on( "resize", function() {
        if(window.innerWidth > 1112) {
            $(".maxwp-nav-secondary .maxwp-secondary-nav-menu, nav .sub-menu, nav .children").removeAttr("style");
            $(".maxwp-secondary-responsive-menu > li").removeClass("maxwp-secondary-menu-open");
        }
    });

    $( ".maxwp-secondary-responsive-menu > li" ).on( "click", function(event) {
        if (event.target !== this)
        return;
        $(this).find(".sub-menu:first").toggleClass('maxwp-submenu-toggle').parent().toggleClass("maxwp-secondary-menu-open");
        $(this).find(".children:first").toggleClass('maxwp-submenu-toggle').parent().toggleClass("maxwp-secondary-menu-open");
    });

    $( "div.maxwp-secondary-responsive-menu > ul > li" ).on( "click", function(event) {
        if (event.target !== this)
            return;
        $(this).find("ul:first").toggleClass('maxwp-submenu-toggle').parent().toggleClass("maxwp-secondary-menu-open");
    });

    }

    if(maxwp_ajax_object.primary_menu_active){

    if(maxwp_ajax_object.sticky_menu){
    // grab the initial top offset of the navigation 
    var maxwpstickyNavTop = $('.maxwp-primary-menu-container').offset().top;
    
    // our function that decides weather the navigation bar should have "fixed" css position or not.
    var maxwpstickyNav = function(){
        var maxwpscrollTop = $(window).scrollTop(); // our current vertical position from the top
             
        // if we've scrolled more than the navigation, change its position to fixed to stick to top,
        // otherwise change it back to relative

        if(maxwp_ajax_object.sticky_menu_mobile){
            if (maxwpscrollTop > maxwpstickyNavTop) {
                $('.maxwp-primary-menu-container').addClass('maxwp-fixed');
            } else {
                $('.maxwp-primary-menu-container').removeClass('maxwp-fixed');
            }
        } else {
            if(window.innerWidth > 1112) {
                if (maxwpscrollTop > maxwpstickyNavTop) {
                    $('.maxwp-primary-menu-container').addClass('maxwp-fixed');
                } else {
                    $('.maxwp-primary-menu-container').removeClass('maxwp-fixed'); 
                }
            }
        }
    };

    maxwpstickyNav();
    // and run it again every time you scroll
    $(window).on( "scroll", function() {
        maxwpstickyNav();
    });
    }

    //$(".maxwp-nav-primary .maxwp-primary-nav-menu").addClass("maxwp-primary-responsive-menu").before('<div class="maxwp-primary-responsive-menu-icon"></div>');
    $(".maxwp-nav-primary .maxwp-primary-nav-menu").addClass("maxwp-primary-responsive-menu");

    $( ".maxwp-primary-responsive-menu-icon" ).on( "click", function() {
        $(this).next(".maxwp-nav-primary .maxwp-primary-nav-menu").slideToggle();
    });

    $(window).on( "resize", function() {
        if(window.innerWidth > 1112) {
            $(".maxwp-nav-primary .maxwp-primary-nav-menu, nav .sub-menu, nav .children").removeAttr("style");
            $(".maxwp-primary-responsive-menu > li").removeClass("maxwp-primary-menu-open");
        }
    });

    $( ".maxwp-primary-responsive-menu > li" ).on( "click", function(event) {
        if (event.target !== this)
        return;
        $(this).find(".sub-menu:first").toggleClass('maxwp-submenu-toggle').parent().toggleClass("maxwp-primary-menu-open");
        $(this).find(".children:first").toggleClass('maxwp-submenu-toggle').parent().toggleClass("maxwp-primary-menu-open");
    });

    $( "div.maxwp-primary-responsive-menu > ul > li" ).on( "click", function(event) {
        if (event.target !== this)
            return;
        $(this).find("ul:first").toggleClass('maxwp-submenu-toggle').parent().toggleClass("maxwp-primary-menu-open");
    });

    }

    $(".maxwp-social-icon-search").on('click', function (e) {
        e.preventDefault();
        document.getElementById("maxwp-search-overlay-wrap").style.display = "block";
    });

    $(".maxwp-search-closebtn").on('click', function (e) {
        e.preventDefault();
        document.getElementById("maxwp-search-overlay-wrap").style.display = "none";
    });

    $(".post").fitVids();

    var scrollButtonEl = $( '.maxwp-scroll-top' );
    scrollButtonEl.hide();

    $(window).on( "scroll", function() {
        if ( $( window ).scrollTop() < 20 ) {
            $( '.maxwp-scroll-top' ).fadeOut();
        } else {
            $( '.maxwp-scroll-top' ).fadeIn();
        }
    } );

    scrollButtonEl.on( "click", function() {
        $( "html, body" ).animate( { scrollTop: 0 }, 300 );
        return false;
    } );

    if(maxwp_ajax_object.slider){
    if ( $().owlCarousel ) {
        var maxwpcarouselwrapper = $('.maxwp-posts-carousel');
        var imgLoad = imagesLoaded(maxwpcarouselwrapper);
        imgLoad.on( 'always', function() {
            maxwpcarouselwrapper.each(function(){
                    var $this = $(this);
                    $this.find('.owl-carousel').owlCarousel({
                        autoplay: true,
                        loop: true,
                        margin: 0,
                        smartSpeed: 250,
                        dots: false,
                        nav: true,
                        autoplayTimeout: 4000,
                        autoHeight: false,
                        navText: [ '<i class="fa fa-arrow-left"></i>', '<i class="fa fa-arrow-right"></i>' ],
                        responsive:{
                        0:{
                            items: 1
                        },
                        520:{
                            items: 2
                        },
                        991:{
                            items: 3
                        },
                        1024:{
                            items: 3
                        }
                    }
                });
            });
        });
    } // end if
    }

    if(maxwp_ajax_object.sticky_sidebar){
        $('.maxwp-main-wrapper, .maxwp-sidebar-one-wrapper').theiaStickySidebar({
            containerSelector: ".maxwp-content-wrapper",
            additionalMarginTop: 0,
            additionalMarginBottom: 0,
            minWidth: 890,
        });

        $(window).on( "resize", function() {
            $('.maxwp-main-wrapper, .maxwp-sidebar-one-wrapper').theiaStickySidebar({
                containerSelector: ".maxwp-content-wrapper",
                additionalMarginTop: 0,
                additionalMarginBottom: 0,
                minWidth: 890,
            });
        });
    }

});
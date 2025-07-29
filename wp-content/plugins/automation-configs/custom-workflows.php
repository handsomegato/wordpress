<?php
/**
 * Custom workflows configuration for Zero BS CRM.
 *
 * @package HandsomeGato
 * @since 1.0.0
 */

// Add a custom workflow for client onboarding
add_action('zbscrm_workflow_init', function () {
    zeroBSCRM_AddInternalAutomatorRecipe(
        'client.onboarding',
        'custom_client_onboarding_workflow',
        array()
    );
});

// Define the custom client onboarding workflow
function custom_client_onboarding_workflow() {
    // Example: Add a log for a new client
    zeroBSCRM_addUpdateContactLog(
        $userID = 1, // Replace with dynamic user ID
        $status = 'new',
        $description = 'New client onboarded successfully.'
    );
}
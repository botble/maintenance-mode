<?php

return [
    'maintenance_mode' => 'Maintenance mode',
    'message' => 'Message',
    'message_placeholder' => 'A message for your users',
    'retry_time' => 'Retry Time',
    'retry_time_placeholder' => 'Set the Retry-After header',
    'secs' => 'secs',
    'allowed_ip_address' => 'Allowed IP Addresses',
    'allowed_your_current_ip' => 'Allow your current IP',
    'allowed_your_current_ip_helper' => 'If you uncheck this and do not add your IP address above you will lose access to this site as well',
    'enable_maintenance_mode' => 'Enable maintenance mode',
    'disable_maintenance_mode' => 'Disable maintenance mode',
    'application_live' => 'Application is now live',
    'application_down' => 'Application is now in maintenance mode',
    'notice_enable' => 'Your website is currently in Maintenance Mode',
    'notice_disable' => 'Your website is live now',
    'secret' => 'Secret (Bypassing Maintenance Mode)',
    'secret_helper' => 'Even while in maintenance mode, you may use the secret option to specify a maintenance mode bypass token; <br />
                                        After placing the application in maintenance mode, you may navigate to the application URL matching this token and Laravel will issue a maintenance mode bypass cookie to your browser:;',
    'redirect' => 'Redirecting Maintenance Mode Requests',
    'redirect_placeholder' => '/',
    'redirect_helper' => 'While in maintenance mode, Laravel will display the maintenance mode view for all application URLs the user attempts to access. If you wish, you may instruct Laravel to redirect all requests to a specific URL. This may be accomplished using the redirect option.',
    'bypass_maintenance_mode' => 'Bypassing Maintenance Mode',
    'click_to_bypass_maintenance_mode' => 'Please click <a class="maintenance-mode-bypass" href="" target="_blank">here</a> to bypassing maintenance mode.',
    'close' => 'Close',
    'bypass_warning' => 'The secret link to bypass maintenance mode, <strong>YOU NEED TO BACK UP THIS LINK IN A SAFE PLACE</strong>',
];

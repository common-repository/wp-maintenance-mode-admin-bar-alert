<?php
/*
Plugin name: WP Maintenance Mode Admin Bar Alert
Description: Checks whether the Maintenance Mode of the <a href="http://wordpress.org/extend/plugins/wp-maintenance-mode/">WP Maintenance Mode</a> plugin is on and, if so, adds an alert to that effect in your Admin Bar.
Version: 1.0
Author: David Herrera
Author URI: http://dherrera.org
*/

function add_maintenance_mode_alert() {
    global $wp_admin_bar;
    // Check whether WP Maintenance Mode is active
	if ( in_array( 'wp-maintenance-mode/wp-maintenance-mode.php', (array) get_option( 'active_plugins', array() ) ) ) {
        // If Maintenance Mode is on...
        $mmcheck = get_option('wp-maintenance-mode-msqld');
        if ( $mmcheck == "1" ) {
            // ...add a notice to the Admin Bar
            $wp_admin_bar->add_menu( array( 'id' => 'mm_alert', 'title' => __( 'Maintenance Mode is active!' ), 'href' => admin_url() . 'plugins.php#wm-pluginconflink' ) );
            // The notice uses the same "Deactivate or change settings" link as the WPMM plugin itself
        }
    }
}
add_action( 'admin_bar_menu', 'add_maintenance_mode_alert', 1000);

?>

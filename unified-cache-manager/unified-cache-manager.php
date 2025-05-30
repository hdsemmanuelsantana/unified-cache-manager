<?php
/**
 * Plugin Name: Unified Cache Manager
 * Description: Manage and troubleshoot caching tools across multiple platforms and plugins.
 * Version: 1.0.2
 * Author: Emmanuel Santana
 * Author URI: https://github.com/hdsemmanuelsantana
 */

if (!defined('ABSPATH')) exit;

// Admin menu
add_action('admin_menu', function () {
    add_menu_page(
        'Unified Cache Manager',
        'Admin Utilities and Tools',
        'manage_options',
        'unified-cache-manager',
        function () {
            include plugin_dir_path(__FILE__) . 'admin-page.php';
        },
        'dashicons-admin-tools',
        99
    );
});

// Update checker
if (!class_exists('Puc_v4_Factory') && file_exists(plugin_dir_path(__FILE__) . 'plugin-update-checker/plugin-update-checker.php')) {
    require plugin_dir_path(__FILE__) . 'plugin-update-checker/plugin-update-checker.php';

    $updateChecker = Puc_v4_Factory::buildUpdateChecker(
        'https://github.com/hdsemmanuelsantana/unified-cache-manager/',
        __FILE__,
        'unified-cache-manager'
    );

    $updateChecker->getVcsApi()->enableReleaseAssets();
}

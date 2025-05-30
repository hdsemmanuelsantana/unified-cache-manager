<?php
/**
 * Plugin Name: Unified Cache Manager
 * Description: Detects active caching systems and offers a single dashboard to manage them.
 * Version: 1.0
 * Author: Emmanuel Santana
 * Author URI: https://github.com/hdsemmanuelsantana
 * Tested up to: 6.5
 */

require plugin_dir_path(__FILE__) . 'plugin-update-checker/plugin-update-checker.php';

$updateChecker = Puc_v4_Factory::buildUpdateChecker(
    'https://github.com/hdsemmanuelsantana/unified-cache-manager/',
    __FILE__,
    'unified-cache-manager'
);
$updateChecker->getVcsApi()->enableReleaseAssets();
?>

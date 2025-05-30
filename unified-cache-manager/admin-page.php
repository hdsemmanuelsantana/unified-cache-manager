<?php
// Unified Cache Manager Admin Page

if (!current_user_can('manage_options')) {
    return;
}

// Handle Update Trigger
if (isset($_POST['ucm_force_plugin_update_check']) && check_admin_referer('ucm_update_check')) {
    do_action('wp_update_plugins');
    echo '<div class="notice notice-success is-dismissible"><p>Plugin update check triggered. Please refresh the Plugins page shortly.</p></div>';
}

// Handle Manual Cache Clear (optional existing feature)
if (isset($_POST['ucm_manual_cache_clear']) && check_admin_referer('ucm_cache_clear')) {
    if (function_exists('rocket_clean_domain')) {
        rocket_clean_domain();
        echo '<div class="notice notice-success is-dismissible"><p>WP Rocket cache manually cleared.</p></div>';
    }
}
?>

<div class="wrap">
    <h1>Unified Cache Manager</h1>
    <p>Manage and troubleshoot your caching tools across plugins and platforms from one dashboard.</p>

    <h2>Manual Actions</h2>

    <form method="post" style="margin-bottom: 1em;">
        <?php wp_nonce_field('ucm_cache_clear'); ?>
        <input type="hidden" name="ucm_manual_cache_clear" value="1">
        <?php submit_button('Clear WP Rocket Cache', 'primary'); ?>
    </form>

    <form method="post">
        <?php wp_nonce_field('ucm_update_check'); ?>
        <input type="hidden" name="ucm_force_plugin_update_check" value="1">
        <?php submit_button('Check for Plugin Updates', 'secondary'); ?>
    </form>
</div>

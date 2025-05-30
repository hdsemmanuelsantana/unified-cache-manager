<?php
// Detect WP Rocket
function ucm_is_wp_rocket_active() {
    return defined('WP_ROCKET_VERSION');
}

// Detect Cloudflare (via WP plugin)
function ucm_is_cloudflare_active() {
    return defined('CLOUDFLARE_PLUGIN_VERSION') || class_exists('CF\WordPress\Hooks');
}

// Detect WP Engine (via mu-plugin or constants)
function ucm_is_wp_engine() {
    return defined('WPE_APIKEY') || defined('IS_WPE');
}

// Output buttons based on what is detected
function ucm_render_cache_buttons() {
    echo '<div class="wrap"><h2>Cache Actions</h2><p>Available cache tools based on detected plugins/hosts:</p>';

    // WP Rocket
    if (ucm_is_wp_rocket_active()) {
        echo '<form method="post"><input type="submit" name="ucm_clear_wp_rocket" class="button button-primary" value="Clear WP Rocket Cache"></form>';
    }

    // Cloudflare
    if (ucm_is_cloudflare_active()) {
        echo '<form method="post"><input type="submit" name="ucm_clear_cloudflare" class="button" value="Purge Cloudflare Cache"></form>';
    }

    // WP Engine
    if (ucm_is_wp_engine()) {
        echo '<form method="post"><input type="submit" name="ucm_clear_wp_engine" class="button" value="Clear WP Engine Cache"></form>';
    }

    echo '</div>';
}

// Handle actions
add_action('admin_init', function () {
    if (isset($_POST['ucm_clear_wp_rocket']) && function_exists('rocket_clean_domain')) {
        rocket_clean_domain();
        add_action('admin_notices', function () {
            echo '<div class="notice notice-success is-dismissible"><p>WP Rocket cache cleared.</p></div>';
        });
    }

    if (isset($_POST['ucm_clear_cloudflare']) && class_exists('CF\WordPress\Hooks')) {
        do_action('cloudflare_purge_all'); // Cloudflare plugin hook
        add_action('admin_notices', function () {
            echo '<div class="notice notice-success is-dismissible"><p>Cloudflare cache purge triggered.</p></div>';
        });
    }

    if (isset($_POST['ucm_clear_wp_engine']) && function_exists('wpe_clear_cache')) {
        wpe_clear_cache();
        add_action('admin_notices', function () {
            echo '<div class="notice notice-success is-dismissible"><p>WP Engine cache clear called.</p></div>';
        });
    }
});

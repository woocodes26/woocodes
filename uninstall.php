<?php
/**
 * WooCodes Uninstall Script
 *
 * This file is executed when the plugin is uninstalled via WordPress admin.
 * It removes all plugin data from the database.
 *
 * @package WooCodes
 * @version 1.2.0
 */

// If uninstall not called from WordPress, then exit
if (!defined('WP_UNINSTALL_PLUGIN')) {
    exit('Direct access denied.');
}

// Security check - ensure current user can delete plugins
if (!current_user_can('delete_plugins')) {
    exit('Permission denied.');
}

/**
 * Remove all WooCodes data from database
 */
function woocodes_uninstall_cleanup() {
    global $wpdb;

    // Remove plugin options
    $options_to_remove = array(
        'woocodes_invoice_logo_id',
        'woocodes_invoice_footer_link', 
        'woocodes_invoice_color',
        'woocodes_email_title',
        'woocodes_back_to_store_text',
        'woocodes_codes_description',
        'woocodes_support_message',
        'woocodes_support_link_text',
        'woocodes_support_link',
        'woocodes_logs',
        'woocodes_version',
        'woocodes_db_version',
    );

    foreach ($options_to_remove as $option) {
        delete_option($option);
        
        // For multisite installations
        delete_site_option($option);
    }

    // Remove custom database tables
    $table_name = $wpdb->prefix . 'woocodes_logs';
    $wpdb->query("DROP TABLE IF EXISTS {$table_name}");

    // Remove post meta data
    $wpdb->query(
        $wpdb->prepare(
            "DELETE FROM {$wpdb->postmeta} WHERE meta_key LIKE %s",
            '_woocodes_%'
        )
    );

    // Clear any cached data
    wp_cache_flush();

    // Remove uploaded files (logos) if they exist
    woocodes_cleanup_uploaded_files();
}

/**
 * Clean up uploaded files
 */
function woocodes_cleanup_uploaded_files() {
    $logo_id = get_option('woocodes_invoice_logo_id');
    
    if ($logo_id) {
        // Get attachment file path
        $file_path = get_attached_file($logo_id);
        
        if ($file_path && file_exists($file_path)) {
            // Only delete if it was uploaded by our plugin
            $upload_dir = wp_upload_dir();
            $woocodes_dir = $upload_dir['basedir'] . '/woocodes/';
            
            if (strpos($file_path, $woocodes_dir) === 0) {
                wp_delete_file($file_path);
                wp_delete_attachment($logo_id, true);
            }
        }
    }
}

/**
 * Multisite cleanup
 */
function woocodes_uninstall_multisite() {
    global $wpdb;

    if (is_multisite()) {
        // Get all blog IDs
        $blog_ids = $wpdb->get_col("SELECT blog_id FROM {$wpdb->blogs}");
        
        foreach ($blog_ids as $blog_id) {
            switch_to_blog($blog_id);
            woocodes_uninstall_cleanup();
            restore_current_blog();
        }
    } else {
        woocodes_uninstall_cleanup();
    }
}

// Execute cleanup
try {
    woocodes_uninstall_multisite();
    
    // Trigger action for extensions
    do_action('woocodes_uninstalled');
    
} catch (Exception $e) {
    // Log error but don't stop uninstall process
    error_log('WooCodes Uninstall Error: ' . $e->getMessage());
}
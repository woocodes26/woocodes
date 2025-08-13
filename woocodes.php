<?php
/**
 * Plugin Name: WooCodes - Digital Product Codes Management
 * Plugin URI: https://woocodes.online
 * Description: Automatically deliver digital product codes, license keys, and activation codes to customers after WooCommerce purchase completion. Professional email templates and comprehensive code management system.
 * Version: 1.2.0
 * Author: codeswf
 * Author URI: https://woocodes.online
 * Text Domain: woocodes
 * Domain Path: /languages
 * Requires at least: 5.6
 * Tested up to: 6.5
 * Requires PHP: 7.4
 * WC requires at least: 5.0
 * WC tested up to: 8.0
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * 
 * @package WooCodes
 * @version 1.2.0
 */

// support WooCommerce HPOS (Custom Order Tables)
add_action( 'before_woocommerce_init', function() {
    if ( class_exists( \Automattic\WooCommerce\Utilities\FeaturesUtil::class ) ) {
        \Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'custom_order_tables', __FILE__, true );
    }
} );

// Prevent direct access
if (!defined('ABSPATH')) {
    exit('Direct access denied.');
}

// Prevent direct access
if (!defined('ABSPATH')) {
    exit('Direct access denied.');
}

// Define plugin constants
define('WOOCODES_VERSION', '1.2.0');
define('WOOCODES_PLUGIN_URL', plugin_dir_url(__FILE__));
define('WOOCODES_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('WOOCODES_PLUGIN_BASENAME', plugin_basename(__FILE__));
define('WOOCODES_TEXT_DOMAIN', 'woocodes');

/**
 * Main WooCodes Plugin Class
 * 
 * @class WooCodes_Plugin
 * @version 1.2.0
 */
final class WooCodes_Plugin {

    /**
     * The single instance of the class
     *
     * @var WooCodes_Plugin
     */
    protected static $_instance = null;

    /**
     * Main WooCodes Instance
     *
     * Ensures only one instance of WooCodes is loaded or can be loaded.
     *
     * @static
     * @return WooCodes_Plugin - Main instance
     */
    public static function instance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * Constructor
     */
    public function __construct() {
        $this->woocodes_define_constants();
        $this->woocodes_includes();
        $this->woocodes_init_hooks();
    }

    /**
     * Define WooCodes Constants
     */
    private function woocodes_define_constants() {
        $this->woocodes_define('WOOCODES_ABSPATH', dirname(WOOCODES_PLUGIN_BASENAME) . '/');
    }

    /**
     * Define constant if not already set
     *
     * @param string $name  Constant name
     * @param string $value Constant value
     */
    private function woocodes_define($name, $value) {
        if (!defined($name)) {
            define($name, $value);
        }
    }

    /**
     * Include required core files
     */
    public function woocodes_includes() {
        /**
         * Core classes
         */
        include_once WOOCODES_PLUGIN_PATH . 'includes/class-woocodes-install.php';
        include_once WOOCODES_PLUGIN_PATH . 'includes/class-woocodes-admin.php';
        include_once WOOCODES_PLUGIN_PATH . 'includes/class-woocodes-frontend.php';
        include_once WOOCODES_PLUGIN_PATH . 'includes/class-woocodes-emails.php';
        include_once WOOCODES_PLUGIN_PATH . 'includes/woocodes-core-functions.php';
    }

    /**
     * Hook into actions and filters
     */
    private function woocodes_init_hooks() {
        register_activation_hook(__FILE__, array('WooCodes_Install', 'woocodes_install'));
        register_deactivation_hook(__FILE__, array('WooCodes_Install', 'woocodes_deactivate'));

        add_action('plugins_loaded', array($this, 'woocodes_init'), 0);
        add_action('init', array($this, 'woocodes_load_plugin_textdomain'));
    }

    /**
     * Initialize the plugin
     */
    public function woocodes_init() {
        // Check if WooCommerce is active
        if (!$this->woocodes_is_woocommerce_active()) {
            add_action('admin_notices', array($this, 'woocodes_woocommerce_missing_notice'));
            return;
        }

        // Initialize plugin components
        $this->woocodes_init_components();
    }

    /**
     * Initialize plugin components
     */
    private function woocodes_init_components() {
        if (is_admin()) {
            new WooCodes_Admin();
        }
        
        new WooCodes_Frontend();
        new WooCodes_Emails();
    }

    /**
     * Load plugin textdomain
     */
    public function woocodes_load_plugin_textdomain() {
        load_plugin_textdomain(
            WOOCODES_TEXT_DOMAIN,
            false,
            dirname(WOOCODES_PLUGIN_BASENAME) . '/languages/'
        );
    }

    /**
     * Check if WooCommerce is active
     *
     * @return bool
     */
    private function woocodes_is_woocommerce_active() {
        return class_exists('WooCommerce');
    }

    /**
     * WooCommerce missing notice
     */
    public function woocodes_woocommerce_missing_notice() {
        /* translators: %s: WooCommerce plugin link */
        $message = sprintf(
            esc_html__('WooCodes requires WooCommerce to be installed and active. You can download %s here.', 'woocodes'),
            '<a href="https://wordpress.org/plugins/woocommerce/" target="_blank">WooCommerce</a>'
        );
        
        printf(
            '<div class="error"><p><strong>%s</strong></p></div>',
            wp_kses_post($message)
        );
    }

    /**
     * Get the plugin url
     *
     * @return string
     */
    public function woocodes_plugin_url() {
        return untrailingslashit(plugins_url('/', __FILE__));
    }

    /**
     * Get the plugin path
     *
     * @return string
     */
    public function woocodes_plugin_path() {
        return untrailingslashit(plugin_dir_path(__FILE__));
    }

    /**
     * Get the template path
     *
     * @return string
     */
    public function woocodes_template_path() {
        return apply_filters('woocodes_template_path', 'woocodes/');
    }

    /**
     * Get Ajax URL
     *
     * @return string
     */
    public function woocodes_ajax_url() {
        return admin_url('admin-ajax.php', 'relative');
    }
}

/**
 * Main instance of WooCodes
 *
 * Returns the main instance of WooCodes to prevent the need to use globals.
 *
 * @return WooCodes_Plugin
 */
function WooCodes() {
    return WooCodes_Plugin::instance();
}

// Global for backwards compatibility
$GLOBALS['woocodes'] = WooCodes();
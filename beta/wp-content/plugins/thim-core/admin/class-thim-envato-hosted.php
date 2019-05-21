<?php

/**
 * Class Thim_Envato_Hosted
 *
 * @since 1.6.0
 */
class Thim_Envato_Hosted extends Thim_Singleton {
    /**
     * @since 1.6.0
     *
     * @var string
     */
    static $key_callback_request = 'tc_callback_verify_subscription';

    /**
     * Check is Envato hosted site.
     *
     * @since 1.6.0
     *
     * @return bool
     */
    public static function is_envato_hosted_site() {
        return defined( 'ENVATO_HOSTED_SITE' );
    }

    /**
     * Get subscription code.
     *
     * @since 1.6.0
     *
     * @return bool
     */
    public static function get_subscription_code() {
        if ( ! defined( 'SUBSCRIPTION_CODE' ) ) {
            return false;
        }

        return SUBSCRIPTION_CODE;
    }

    /**
     * Get url verify subscription code.
     *
     * @since 0.2.1
     *
     * @return string
     */
    public static function get_url_verify_subscription_code() {
        $base_url = Thim_Admin_Config::get( 'host_envato_app' ) . '/envato-hosted-subscription-code/';

        return $base_url;
    }

    /**
     * Get verify callback url.
     *
     * @since 1.3.0
     *
     * @param $return
     *
     * @return string
     */
    public static function get_url_verify_callback( $return = false ) {
        $url = Thim_Dashboard::get_link_main_dashboard(
            array(
                self::$key_callback_request => 1,
            )
        );

        if ( $return ) {
            $url = add_query_arg(
                array(
                    'return' => urlencode( $return ),
                ),
                $url
            );
        }

        return $url;
    }

    /**
     * Thim_Envato_Hosted constructor.
     *
     * @since 1.6.0
     */
    protected function __construct() {
        $this->hooks();
    }

    /**
     * Add hooks.
     *
     * @since 1.6.0
     */
    private function hooks() {
        add_filter( 'thim_core_path_template_getting_started_updates', array(
            $this,
            'override_getting_started_step_updates'
        ) );

        add_action( 'admin_init', array( $this, 'handle_verify_callback' ) );
        add_filter( 'thim_core_list_plugins_required', array( $this, 'add_envato_market_plugin' ), 100 );
    }

    /**
     * Add Envato Market plugin to list plugins required.
     *
     * @since 1.6.0
     *
     * @param $plugins
     *
     * @return array
     */
    public function add_envato_market_plugin( $plugins ) {
        if ( ! self::is_envato_hosted_site() ) {
            return $plugins;
        }

        $plugins[] = array(
            'name'        => 'Envato Market',
            'slug'        => 'envato-market',
            'required'    => false,
            'premium'     => true,
            'version'     => '1.0.0-RC2',
            'description' => 'WordPress Theme & Plugin management for the Envato Market.',
        );

        return $plugins;
    }

    /**
     * Handle verify callback.
     *
     * @since 1.6.0
     */
    public function handle_verify_callback() {
        if ( ! isset( $_REQUEST[ self::$key_callback_request ] ) ) {
            return;
        }

        $args = wp_parse_args( $_REQUEST, array(
            'site_key' => '',
            'return'   => ''
        ) );

        if ( empty( $args['site_key'] ) ) {
            return;
        }

        $redirect_to = ! empty( $args['return'] ) ? $args['return'] : Thim_Dashboard::get_link_main_dashboard();

        Thim_Product_Registration::save_site_key( $args['site_key'] );
        thim_core_redirect( $redirect_to );
    }

    /**
     * Override template path step update in getting started.
     *
     * @since 1.6.0
     *
     * @param $template_path
     *
     * @return string
     */
    public function override_getting_started_step_updates( $template_path ) {
        if ( ! self::is_envato_hosted_site() ) {
            return $template_path;
        }

        return 'dashboard/gs-steps/envato-hosted.php';
    }

}
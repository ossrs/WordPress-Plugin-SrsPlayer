<?php

/**
 * The core plugin class.
 *
 * @package Srs_Player
 * @subpackage Srs_Player/includes
 */

class Srs_Player {
    protected $loader;
    protected $version;

    public function __construct() {
        if (defined('SRS_PLAYER_VERSION')) {
            $this->version = SRS_PLAYER_VERSION;
        } else {
            $this->version = '1.0.0';
        }

        $this->load_dependencies();
        $this->define_public_hooks();
    }

    private function load_dependencies() {
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-srs-player-loader.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-srs-player-public.php';
        $this->loader = new Srs_Player_Loader();
    }

    private function define_public_hooks() {
        $plugin_public = new Srs_Player_Public($this->version);
        $this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_styles');
        $this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_scripts');
        $this->loader->add_shortcode('srs_player', $plugin_public, 'embed_player_handler');
        $this->loader->add_shortcode('srs_publisher', $plugin_public, 'embed_publisher_handler');
    }

    public function run() {
        $this->loader->run();
    }
}


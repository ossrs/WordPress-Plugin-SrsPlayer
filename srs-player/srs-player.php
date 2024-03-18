<?php
/**
 * SRS player supports live-streaming such as HTTP-FLV, HLS, WebRTC, etc.
 *
 * @package Srs_Player
 *
 * @wordpress-plugin
 * Plugin Name: SRS Player
 * Plugin URI: https://github.com/ossrs/WordPress-Plugin-SrsPlayer
 * Description: SRS Player is a video streaming player, supports HLS/HTTP-FLV/WebRTC etc.
 * Version: 1.0.18
 * Author: Winlin Yang
 * Author URI: https://github.com/ossrs/WordPress-Plugin-SrsPlayer
 * License: MIT
 * License URI: https://spdx.org/licenses/MIT.html
 * Text Domain: srs-player
 */

if (!defined('WPINC')) {
    exit();
}

define( 'SRS_PLAYER_VERSION', '1.0.18' );

function activate_srs_player() {
    require_once plugin_dir_path(__FILE__) . 'includes/class-srs-player-activator.php';
    Srs_Player_Activator::activate();
}
register_activation_hook(__FILE__, 'activate_srs_player');

function deactivate_srs_player() {
    require_once plugin_dir_path(__FILE__) . 'includes/class-srs-player-deactivator.php';
    Srs_Player_Deactivator::deactivate();
}
register_activation_hook(__FILE__, 'deactivate_srs_player');

require plugin_dir_path( __FILE__ ) . 'includes/class-srs-player.php';

function run_srs_player() {
    $plugin = new Srs_Player();
    $plugin->run();
}
run_srs_player();


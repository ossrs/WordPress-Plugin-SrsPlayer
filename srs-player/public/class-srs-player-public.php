<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @package Srs_Player
 * @subpackage Srs_Player/public
 */

class Srs_Player_Public {
    private $version;
    public function __construct($version) {
        $this->version = $version;
    }

    public function enqueue_styles() {
        wp_enqueue_style('srs-player-css', plugin_dir_url(__FILE__) . 'css/srs-player-public.css', array(), $this->version, 'all');
    }

    public function enqueue_scripts() {
        if (is_admin()) return;

        $plugin_url = plugins_url('js', __FILE__);
        wp_enqueue_script('jquery');
        wp_enqueue_script('srs-player-sdk', $plugin_url . '/srs.sdk.js', array(), $this->version, false );
        wp_enqueue_script('srs-player-flv', $plugin_url . '/flv-1.5.0.min.js', array(), $this->version, false );
        wp_enqueue_script('srs-player-hls', $plugin_url . '/hls-0.14.17.min.js', array(), $this->version, false );
        wp_enqueue_script('srs-player-adapter', $plugin_url . '/adapter-7.4.0.min.js', array(), $this->version, false );
        wp_enqueue_script('srs-player-main', $plugin_url . '/srs.player.js', array('jquery'), $this->version, false );
    }

    public function embed_handler($atts = [], $content = null, $tag = '') {
        $atts = array_change_key_case((array)$atts, CASE_LOWER);
        $q = shortcode_atts(
            array(
                'url' => '',
            ), $atts, $tag
        );

        if (empty($q['url'])) {
            return __('Please specify the url of stream', 'srs-player');
        }

        $id = 'srs-player-' . $this->random_str(32);

        $o = '<div class="srs-player-wrapper">';
        $o .= '  <video id="' . $id .'" controls autoplay muted></video>';
        $o .= '<script>(function($) {';
        $o .= '  new SrsPlayer("#' . $id . '", "' . $q['url'] . '").play();';
        $o .= '})(jQuery);</script>';
        $o .= '</div>';

        return $o;
    }

    private function random_str(
        int $length = 64,
        string $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
    ): string {
        if ($length < 1) {
            throw new RangeException("Length must be a positive integer");
        }
        $pieces = [];
        $max = mb_strlen($keyspace, '8bit') - 1;
        for ($i = 0; $i < $length; ++$i) {
            $pieces []= $keyspace[random_int(0, $max)];
        }
        return implode('', $pieces);
    }
}


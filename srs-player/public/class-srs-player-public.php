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
        wp_enqueue_script('srs-player-flv', $plugin_url . '/mpegts-1.7.3.min.js', array(), $this->version, false );
        wp_enqueue_script('srs-player-hls', $plugin_url . '/hls-1.4.14.min.js', array(), $this->version, false );
        wp_enqueue_script('srs-player-adapter', $plugin_url . '/adapter-7.4.0.min.js', array(), $this->version, false );
        wp_enqueue_script('srs-player-main', $plugin_url . '/srs.player.js', array('jquery'), $this->version, false );
    }

    public function embed_player_handler($atts = [], $content = null, $tag = '') {
        $atts = array_change_key_case((array)$atts, CASE_LOWER);
        $q = shortcode_atts(
            array(
                'url' => '',
                'controls' => 'controls',
                'autoplay' => 'autoplay',
                'muted' => 'muted',
                'width' => '100%',
            ), $atts, $tag
        );

        if (empty($q['url']) && empty($q['src'])) {
            return __('Please specify the url of stream', 'srs-player');
        }
        // convert &amp; to &.
        $q['url'] = html_entity_decode($q['url']);

        $url = $q['url'];
        if (empty($url)) $url = $q['src'];
        $id = 'srs-player-' . $this->random_str(32);

        $vControls = $q['controls'];
        $controls = " controls=${vControls}";
        if ($q['controls'] != 'true' && $q['controls'] != 'controls') $controls = '';

        $vAutoplay = $q['autoplay'];
        $autoplay = " autoplay=${vAutoplay}";
        if ($q['autoplay'] != 'true' && $q['autoplay'] != 'autoplay') $autoplay = '';

        $vMuted = $q['muted'];
        $muted = " muted=${vMuted}";
        if ($q['muted'] != 'true' && $q['muted'] != 'muted') $muted = '';

        $width = $q['width'];
        if (empty($q['width'])) $width = '';
        if (!strpos($width, '%') && !strpos($width, 'px')) $width = "${width}px";

        // We must use style to setup the width, or some theme like 2020 will set height to 0.
        $style = '';
        if (!empty($width)) $style = "<style>#${id} { width: {$width}; } </style>";

        $o = <<<EOT
    <div class="srs-player-wrapper">
        <video id="${id}" ${controls}${autoplay}${muted}></video>
        <script>(function($) { new SrsPlayer("#${id}", "${url}").play(); })(jQuery);</script>
    </div>
    $style
EOT;
        return $o;
    }

    public function embed_publisher_handler($atts = [], $content = null, $tag = '') {
        $atts = array_change_key_case((array)$atts, CASE_LOWER);
        $q = shortcode_atts(
            array(
                'url' => '',
                'controls' => 'controls',
                'width' => '100%',
            ), $atts, $tag
        );

        if (empty($q['url']) && empty($q['src'])) {
            return __('Please specify the url of stream', 'srs-publisher');
        }
        // convert &amp; to &.
        $q['url'] = html_entity_decode($q['url']);

        $url = $q['url'];
        if (empty($url)) $url = $q['src'];
        $id = 'srs-publisher-' . $this->random_str(32);

        // For publisher, always disable controls.
        $controls = '';

        // For publisher, always enable autoplay.
        $autoplay = " autoplay=autoplay";

        // For publisher, always mute it.
        $muted = " muted=muted";

        $width = $q['width'];
        if (empty($q['width'])) $width = '';
        if (!strpos($width, '%') && !strpos($width, 'px')) $width = "${width}px";

        // We must use style to setup the width, or some theme like 2020 will set height to 0.
        $style = '';
        if (!empty($width)) $style = "<style>#${id} { width: {$width}; } </style>";

        $o = <<<EOT
    <div class="srs-publisher-wrapper">
        <video id="${id}" ${controls}${autoplay}${muted}></video>
        <script>(function($) { new SrsPublisher("#${id}", "${url}").publish(); })(jQuery);</script>
    </div>
    $style
EOT;
        return $o;
    }

    private function random_str(
        int $length = 64,
        string $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
    ): string {
        if ($length < 1) {
            throw new RangeException("Invalid length ${length}");
        }
        $pieces = [];
        $max = mb_strlen($keyspace, '8bit') - 1;
        for ($i = 0; $i < $length; ++$i) {
            $pieces []= $keyspace[random_int(0, $max)];
        }
        return implode('', $pieces);
    }
}


=== Live Streaming Video Player - by SRS Player ===
Contributors: winlinvip
Tags: video, media, woocommerce, ecommerce, e-commerce, audio, live streaming, video streaming, player, video player
Requires at least: 5.3
Tested up to: 6.5
Requires PHP: 7.2
Stable tag: 1.0.18
License: MIT
License URI: https://spdx.org/licenses/MIT.html
Author: Winlin Yang
Author URI: https://github.com/ossrs/WordPress-Plugin-SrsPlayer

SRS Player is a open source live streaming video player, supports HLS/HTTP-FLV/WebRTC etc.

== Description ==

SRS Player is a dedicated video streaming player, supports a set of protocols, compatible with major browsers, such as Chrome, Safari and Firefox.

= Usage =

First, you could create a media server SRS, using [Droplet](https://ossrs.medium.com/how-to-setup-a-video-streaming-service-by-1-click-e9fe6f314ac6) or [aaPanel](https://blog.ossrs.io/how-to-setup-a-video-streaming-service-by-aapanel-9748ae754c8c).

Then, publish live stream to SRS by [OBS](https://obsproject.com/) and follow the tutorial: [Step 2: Publish Stream using OBS](https://blog.ossrs.io/how-to-setup-a-video-streaming-service-by-1-click-e9fe6f314ac6).

Done, view stream on a WordPress post or page, please follow the tutorial: [How to Publish Your SRS Livestream Through WordPress](https://blog.ossrs.io/publish-your-srs-livestream-through-wordpress-ec18dfae7d6f), and bellow are some tips.

For HLS live streaming, please use the following shortcode:

`[srs_player url="https://your_server/live/livestream.m3u8"]`

For WebRTC streaming, the shortcode:

`[srs_player url="webrtc://your_server/live/livestream"]`

For HTTP-FLV live streaming, the shortcode:

`[srs_player url="https://your_server/live/livestream.flv"]`

For HLS/MP4 VoD streaming, the shortcode:

`[srs_player url="https://your_server/vod/file.mp4"]`

You could also use WebRTC to publish live stream:

`[srs_publisher url="webrtc://your_server/live/livestream"]`

For detailed documentation, please visit the [SRS Player](https://github.com/ossrs/WordPress-Plugin-SrsPlayer) page.

= Key Features =

* Embed live streaming into a post/page or anywhere on your WordPress site
* Supports HLS/HTTP-FLV/WebRTC over HTTP or HTTPS for live streaming
* Embed HTML5 videos which are compatible with all major browsers
* Automatically play a video when the page is rendered
* No setup required, simply install and start embedding videos
* Lightweight and compatible with the latest version of WordPress
* Supports HLS/MP4 VoD streaming

= Shortcode Options =

Options supported in the shortcode.

**Width**

Optional, limit the width of the video.

`[srs_player url="https://your_server/live/livestream.m3u8" width="720"]`

== Installation ==

You could install it through the regular installer of the WordPress. Please download plugin and install it using WordPress repository.

If you would like to install the latest develop version, please:

1. Download the `srs-player.zip` from [releases](https://github.com/ossrs/WordPress-Plugin-SrsPlayer/releases).
1. Click the `Plugins > Add Plugin > Uplaod Plugin` menu in WrodPress.
1. Upload the `srs-player.zip` and active it.

== Frequently Asked Questions ==

= Does SRS Player supports HLS live streaming? =

Yes, please follow the usage, use shortcode to embed to your post.

= Does SRS Player supports HTTP-FLV live streaming? =

Yes, please follow the usage, use shortcode to embed to your post.

= Does SRS Player supports WebRTC live streaming? =

Yes, please follow the usage, use shortcode to embed to your post.

= Does SRS Player supports VoD HLS/MP4? =

Yes, but please use default Video player of BlockEditor directly.

== Screenshots ==

1. SRS Player Shortcode for HLS/HTTP-FLV/WebRTC.
2. The SRS Player Demo in a post.

== Changelog ==

= 1.0.18 =
* 2024-03-18: Update tested up to WP 6.5

= 1.0.17 =
* 2023-07-23: Support HEVC over enhanced RTMP or FLV (#5)

= 1.0.16 =
* 2023-05-01: Test with new WordPress 6.2

= 1.0.15 =
* 2023-02-25: Replace flv.js with mpegts.js to play HEVC over HTTP-FLV (#1)

= 1.0.14 =
* 2022-06-15: Support publish live stream by WebRTC.

= 1.0.13 =
* 2022-06-08: Use class to set the width.

= 1.0.12 =
* 2022-05-11: Refine plugin description.
* 2022-05-11: Refine the plugin shortcode.
* 2022-05-11: Refine the plugin usage.
* 2022-05-10: Refine the plugin description.

= 1.0.8 =
* 2022-05-10: Refine the tags.
* 2022-05-01: Support url alias src.
* 2022-05-01: Default width to 100%.

= 1.0.7 =
* 2022-05-01: Refine the release script.
* 2022-05-01: Support play MP4 VoD file.
* 2022-05-01: Refine release script.

= 1.0.6 =
* 2022-04-12: Update plugin release in readme.txt
* 2022-04-12: Update plugin name in readme.txt

= 1.0.4 =
* 2022-04-12: Add screenshots for plugin.
* 2022-04-12: Refine the installation of plugin.
* 2022-04-12: Support auto release.
* 2022-04-12: Refine documents content.
* 2022-04-12: Support option width for player.
* 2022-04-12: Support auto release.

= 1.0.0 =
* 2022-04-12: Support HLS/WebRTC/HTTP-FLV video streaming.

=== Plugin Name ===
Contributors: winlinvip
Tags: video, audio, live streaming, video streaming, player, video player
Requires at least: 5.3
Tested up to: 5.9
Requires PHP: 7.2
Stable tag: 1.0.2
License: MIT
License URI: https://spdx.org/licenses/MIT.html
Author: Winlin Yang
Author URI: https://github.com/ossrs/WordPress-Plugin-SrsPlayer

SRS Player is a video streaming player, supports HLS/HTTP-FLV/WebRTC etc.

== Description ==

SRS Player is a dedicated video streaming player, supports a set of protocols, compatible with major browsers, such as Chrome, Safari and Firefox.

= Usage =

For HLS live streaming, please use the following shortcode:

`[srs_player url="https://your_droplet_ip/live/livestream.m3u8"]`

For WebRTC streaming, the shortcode:

`[srs_player url="webrtc://your_droplet_ip/live/livestream"]`

For HTTP-FLV live streaming, the shortcode:

`[srs_player url="https://your_droplet_ip/live/livestream.flv"]`

You could create a video streaming server using [SRS Droplet](https://ossrs.medium.com/how-to-setup-a-video-streaming-service-by-1-click-e9fe6f314ac6) by only 1-Click.

For detailed documentation, please visit the [Srs Player](https://github.com/ossrs/WordPress-Plugin-SrsPlayer) page.

= Key Features =

* Embed live streaming into a post/page or anywhere on your WordPress site
* Supports HLS/HTTP-FLV/WebRTC over HTTP or HTTPS for live streaming
* Embed HTML5 videos which are compatible with all major browsers
* Automatically play a video when the page is rendered
* No setup required, simply install and start embedding videos
* Lightweight and compatible with the latest version of WordPress

= Shortcode Options =

Options supported in the shortcode.

**Width**

Optional, limit the width of the video.

`[srs_player url="https://your_droplet_ip/live/livestream.m3u8" width="720"]`

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

No, please use default Video player of BlockEditor directly.

== Changelog ==

= 1.0.2 =
Support auto release.

= 1.0.1 =
* Refine documents content.
* Support option width for player.
* Support auto release.

= 1.0.0 =
* Support HLS/WebRTC/HTTP-FLV video streaming.

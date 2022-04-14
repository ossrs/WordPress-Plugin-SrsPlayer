# WordPress-Plugin-SrsPlayer

[![](https://img.shields.io/twitter/follow/srs_server?style=social)](https://twitter.com/srs_server)
[![](https://badgen.net/discord/members/yZ4BnPmHAd)](https://discord.gg/yZ4BnPmHAd)
[![](https://ossrs.net/wiki/images/do-btn-srs-125x20.svg)](https://cloud.digitalocean.com/droplets/new?appId=104916642&size=s-1vcpu-1gb&region=sgp1&image=ossrs-srs&type=applications)

SRS Player is a video streaming player, supports HLS/HTTP-FLV/WebRTC etc.

## Usage

First, you should get your own video streaming server. Highly recommend to [Create SRS Droplet](https://cloud.digitalocean.com/droplets/new?appId=104916642&size=s-1vcpu-1gb&region=sgp1&image=ossrs-srs&type=applications)
by 1-Click.

Then, publish live streaming by OBS to your server, you should be able to play the stream by VLC, please follow the 
[tutorial](https://ossrs.medium.com/how-to-setup-a-video-streaming-service-by-1-click-e9fe6f314ac6)

Next, visit your WordPress, install this plugin, and create a post with the following shortcodes:

* For HLS: `[srs_player url="https://your_server_ip/live/livestream.m3u8"]`
* For WebRTC: `[srs_player url="webrtc://your_server_ip/live/livestream"]`
* For HTTP-FLV: `[srs_player url="https://your_server_ip/live/livestream.flv"]`

If you are stuck, please get help from [discord](https://discord.gg/yZ4BnPmHAd)

## Options

You could specify options, for example, to limit the HLS:

```text
[srs_player url="https://your_server_ip/live/livestream.m3u8" width="720"]
```

The options of SRS player:

* `url`: The url to play, supports HLS, HTTP-FLV and WebRTC, please see [Usage](#usage).
* `width`: (Optional) The width to limit the video, it's not required.


Winlin, 2022

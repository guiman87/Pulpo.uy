<?php
/*
Plugin Name: GA events send Responsive Video Shortcode
Plugin URI: http://uberchord.com
Description: This plugin provides a shortcode you wrap around the ID of a video in YouTube. The plugin then adds the necessary markup and CSS to make that video responsive. To use it, type [responsive-video]'source'[/responsive-video], where 'source' is the iframe embed code for your video.
Version: 1.0
Author: Guillermo Dutra
Author URI: http://pulpo.uy
License: GPLv2
*/
?>
<?php
// register the shortcode to wrap html around the content
function wptuts_responsive_video_shortcode( $atts ) {
    extract( shortcode_atts( array (
        'ytidentifier' => '',
        'uniquename' => ''
    ), $atts ) );

    	$utm_source =  $utm_source ;
        $output  = '<div id="' . $uniquename .'"></div>'; 
		$output .= '<script type="text/javascript">';
		$output .= 'var utm_source="' . $utm_source .'";';
		$output .= 'var tag = document.createElement("script");';
		$output .= 'tag.src = "https://www.youtube.com/iframe_api";';
		$output .= 'var firstScriptTag = document.getElementsByTagName("script")[0];';
		$output .= 'var player;';
		$output .= 'function onYouTubeIframeAPIReady() {';
		$output .= 'player = new YT.Player("player", { height: "360", width: "640", videoId:"' . $ytidentifier .'", frameborder: "0", events: { "onReady": onPlayerReady, "onStateChange": onPlayerStateChange } }); }';
		$output .= 'var player; function onYouTubeIframeAPIReady(){player=new YT.Player("player",{height:"360",width:"640",videoId:"' . $ytidentifier .'",frameborder:"0",events:{"onReady":onPlayerReady,"onStateChange":onPlayerStateChange}})}';
		$output .= 'function onPlayerReady(event){}function onPlayerStateChange(event){if(event.data==YT.PlayerState.PLAYING){if(utm_source=="zilch"){ga("send","event","YouTube","Started","Promo from Main Page")}else if(utm_source=="CAMPAIGN"){ga("send","event","YouTube","Started","Promo from Main Page via CAMPAIGN")}else{ga("send","event","YouTube","Started","Promo from Main Page")}}if(event.data==YT.PlayerState.ENDED){if(utm_source=="zilch"){ga("send","event","YouTube","Finished","Promo from Main Page")}else if(utm_source=="CAMPAIGN"){ga("send","event","YouTube","Finished","Promo from Main Page via CAMPAIGN")}else{ga("send","event","YouTube","Finished","Promo from Main Page")}}}';      
		$output .= '</script>';
        return $output; 
    }
add_shortcode ('responsive-video', 'wptuts_responsive_video_shortcode' );
?>

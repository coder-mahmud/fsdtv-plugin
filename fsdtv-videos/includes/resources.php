<?php
// Add scripts

function sl_add_script(){

	wp_enqueue_style('fsdtv-main-style', plugins_url().'/fsdtv-videos/css/style.css');
	
	wp_enqueue_script('mixitup-script', plugins_url().'/fsdtv-videos/js/mixitup.min.js','','',true);
	wp_enqueue_script('multifilter-script', plugins_url().'/fsdtv-videos/js/multifilter.js',array('mixitup-script'),'',true);
	wp_enqueue_script('fsdtv-main-script', plugins_url().'/fsdtv-videos/js/main.js','','',true);
}

add_action('wp_enqueue_scripts','sl_add_script');
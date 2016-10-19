<?php
/*
Plugin Name: Remove Meta genrators 
Version: 0.1
Plugin URL: http://ehostcloud.com
Author: Dinesh kumar krishna
Author URI: http://ehostcloud.com
Description: It removes meta-generators of visual composer,layer slider,revoution slider, wordpress.
*/
//Remove wp generators like theme,slider
remove_action('wp_head', 'wp_generator');

add_action('init', 'myoverride', 100);

function myoverride() {

    remove_action('wp_head', array(visual_composer(), 'addMetaData'));

}

function remove_revslider_meta_tag() {

    return '';

}

add_filter( 'revslider_meta_generator', 'remove_revslider_meta_tag' );

function remove_layerslider_meta_tag($html) {

    return '';

}
add_filter( 'ls_meta_generator', 'remove_layerslider_meta_tag' );

?>

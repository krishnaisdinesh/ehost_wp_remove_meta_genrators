<?php
/*
Plugin Name: Remove Meta genrators 
Version: 0.1
Plugin URL: https://ehostcloud.com
Author: Ehostcloud Services
Author URI: https://ehostcloud.com
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

/******************************************************************/
//Get Rid of “Howdy”
add_filter('gettext', 'change_howdy', 10, 3);

function change_howdy($translated, $text, $domain) {

    if (!is_admin() || 'default' != $domain)
        return $translated;

    if (false !== strpos($translated, 'Howdy'))
        return str_replace('Howdy', 'Welcome', $translated);

    return $translated;
}

// Hide WordPress Version Info
function hide_wordpress_version() {
	return '';
}
add_filter('the_generator', 'hide_wordpress_version');

// Remove WordPress Meta Generator
remove_action('wp_head', 'wp_generator');

// Remove WordPress Version Number In URL Parameters From JS/CSS
function hide_wordpress_version_in_script($src, $handle) {
    $src = remove_query_arg('ver', $src);
	return $src;
}
add_filter( 'style_loader_src', 'hide_wordpress_version_in_script', 10, 2 );
add_filter( 'script_loader_src', 'hide_wordpress_version_in_script', 10, 2 );

?>

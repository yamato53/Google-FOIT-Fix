<?php
/*
Plugin Name: Google FOIT Fix
Plugin URI: https://www.dakotakearns.com
Description: Adds font-display=swap to Google web fonts. This prevents Flash of Invisible Text errors during site audits when using Google Fonts. 
Version: v1.0.10292019
Author: Dakota
Author URI: https://www.dakotakearns.com
*/

// This function initiates the output buffering.
function init_buffer() {
    ob_start();
}
add_action('wp_head','init_buffer',0);

// This function injects the font-display=swap to the end of the URL.
function inject_font_display() {
    $head = ob_get_clean();
    $head = str_replace("googleapis.com/css?family", "googleapis.com/css?display=swap&family", $head);

    echo $head;
}
add_action('wp_head','inject_font_display', PHP_INT_MAX);
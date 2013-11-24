<?php
/*
Plugin Name: Traffic Lights
Plugin URI: http://www.wp-plugin-dev.com
Description: A simple Traffic Light to show some state for visitor
Version: 0.1
Author: wp-plugin-dev.com
Author URI: http://www.wp-plugin-dev.com
License: GPLv2 or later

Graphic from http://www.openclipart.org/

Dies ist eine einfache Ampel. Hauptsächlich ein Lernprojekt.
Jedes WordPress Plugin hat die oben gemachten Angaben

*/

// um das Haupt Plugin File nicht so sehr mit Code voll zu machen
// rufen wir nur die anderen Files auf.

// Das Dokument was die Ampel malt
include('draw-traffic-lights.php');
include('traffic-lights-widget.php');

// register traffic_light_Widget widget
function register_traffic_light_Widget() {
    register_widget( 'traffic_light_Widget' );
}
add_action( 'widgets_init', 'register_traffic_light_Widget' );

// Function that outputs the contents of the dashboard widget
function dashboard_widget_function_traffic_light() {
	draw_traffic_light();
}

// Function used in the action hook
function add_dashboard_widgets_tl() {
	wp_add_dashboard_widget('dashboard_widget', 'Traffic Light Dashboard Widget', 'dashboard_widget_function_traffic_light');
}

// Register the new dashboard widget with the 'wp_dashboard_setup' action
add_action('wp_dashboard_setup', 'add_dashboard_widgets_tl' );

add_shortcode("trafficlights","trafficlight_shorty");

function trafficlight_shorty(){
ob_start();
draw_traffic_light();
return ob_get_clean();
}

?>
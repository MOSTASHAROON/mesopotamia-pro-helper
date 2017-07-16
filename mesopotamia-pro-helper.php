<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

/*
  Plugin Name: Mesopotamia Pro Helper
  Plugin URI: https://mostasharoon.org/mesopotamia/
  Description: Add support for a few premium plugins to Mesopotamia theme.
  Version: 1.0
  Author: Mohammed Al-Mahdawi(Mohammed Thaer)
  Author URI: https://mostasharoon.org
  Text Domain: mesopotamia_pro_helper
 */

define( 'MESOPOTAMIA_PRO_HELPER', '1.0' );

if ( file_exists( __DIR__ . '/lib/cmb2/init.php' ) ) {
	require_once __DIR__ . '/lib/cmb2/init.php';
} elseif ( file_exists(  __DIR__ . '/lib/CMB2/init.php' ) ) {
	require_once __DIR__ . '/lib/CMB2/init.php';
}

require_once __DIR__ . '/metaboxes.php';

/**
 * UberMenu
 */
function mesopotamia_inject_ubermenu(){
	if ( function_exists( 'ubermenu' ) && ( true == get_theme_mod( 'UberMenu' ) ) ){
		ubermenu( 'main', array( 'theme_location' => 'primary' ) );
	}
}
add_action( 'mesopotamia_start_header_tag', 'mesopotamia_inject_ubermenu' );

function inject_ubermenu_settings($wp_customize){
	$wp_customize->add_setting( "UberMenu", array(
		"default"   => false,
		"transport" => "refresh",
	) );
}
add_action( 'register_mesopotamia_settings', 'inject_ubermenu_settings' );

function inject_ubermenu_controls($wp_customize){
	$wp_customize->add_control(
		'UberMenu',
		array(
			'type'    => 'checkbox',
			'label'   => __( 'Enable UberMenu', 'mesopotamia' ),
			'section' => 'header'
		)
	);
}
add_action( 'register_mesopotamia_controls', 'inject_ubermenu_controls' );

/**
 * Slider Revolution
 */
function inject_slider_revolution_in_the_archive_page(){
	$rev_slider = get_theme_mod( 'archive_slider_revolution' );

	if ( $rev_slider && function_exists( 'putRevSlider' ) ) {

		echo '<div id="main-slideshow">';
		putRevSlider( $rev_slider );
		echo '</div>';
	}
}
add_action( 'mesopotamia_start_archive_page', 'inject_slider_revolution_in_the_archive_page' );

function inject_slider_revolution_in_the_index_page(){

	$rev_slider = get_theme_mod( 'blog_slider_revolution' );

	if ( $rev_slider && function_exists( 'putRevSlider' ) ) {

		echo '<div id="main-slideshow">';
		putRevSlider( $rev_slider );
		echo '</div>';
	}
}
add_action( 'mesopotamia_start_index_page', 'inject_slider_revolution_in_the_index_page' );

function inject_slider_revolution_in_the_page_page(){
	$rev_slider = get_post_meta( get_the_ID(), '_mesopotamia_slider_revolution', true );

	if ( $rev_slider && function_exists( 'putRevSlider' ) ) {

		echo '<div id="main-slideshow">';
		putRevSlider( $rev_slider );
		echo '</div>';
	}
}
add_action( 'mesopotamia_start_page_page', 'inject_slider_revolution_in_the_page_page' );

function inject_slider_revolution_in_the_search_page(){
	$rev_slider = get_theme_mod( 'search_slider_revolution' );

	if ( $rev_slider && function_exists( 'putRevSlider' ) ) {

		echo '<div id="main-slideshow">';
		putRevSlider( $rev_slider );
		echo '</div>';
	}
}
add_action( 'mesopotamia_start_search_page', 'inject_slider_revolution_in_the_search_page' );

function inject_slider_revolution_in_the_single_page(){
	$rev_slider = get_post_meta( get_the_ID(), '_mesopotamia_slider_revolution', true );

	if ( $rev_slider && function_exists( 'putRevSlider' ) ) {

		echo '<div id="main-slideshow">';
		putRevSlider( $rev_slider );
		echo '</div>';
	}
}
add_action( 'mesopotamia_start_single_page', 'inject_slider_revolution_in_the_single_page' );

function inject_slider_revolution_in_the_content_full_width_page(){
	$rev_slider = get_post_meta( get_the_ID(), '_mesopotamia_slider_revolution', true );

	if ( $rev_slider && function_exists( 'putRevSlider' ) ) {

		echo '<div id="main-slideshow">';
		putRevSlider( $rev_slider );
		echo '</div>';
	}
}
add_action( 'mesopotamia_start_content_full_width_page', 'inject_slider_revolution_in_the_content_full_width_page' );

function inject_slider_revolution_in_the_full_width_page(){
	$rev_slider = get_post_meta( get_the_ID(), '_mesopotamia_slider_revolution', true );

	if ( $rev_slider && function_exists( 'putRevSlider' ) ) {

		echo '<div id="main-slideshow">';
		putRevSlider( $rev_slider );
		echo '</div>';
	}
}
add_action( 'mesopotamia_start_full_width_page', 'inject_slider_revolution_in_the_full_width_page' );

function inject_slider_revolution_in_the_no_sidebar_page(){
	$rev_slider = get_post_meta( get_the_ID(), '_mesopotamia_slider_revolution', true );

	if ( $rev_slider && function_exists( 'putRevSlider' ) ) {

		echo '<div id="main-slideshow">';
		putRevSlider( $rev_slider );
		echo '</div>';
	}
}
add_action( 'mesopotamia_start_no_sidebar_page', 'inject_slider_revolution_in_the_no_sidebar_page' );

function inject_slider_revolution_in_the_scratch_page(){
	$rev_slider = get_post_meta( get_the_ID(), '_mesopotamia_slider_revolution', true );

	if ( $rev_slider && function_exists( 'putRevSlider' ) ) {

		echo '<div id="main-slideshow">';
		putRevSlider( $rev_slider );
		echo '</div>';
	}
}
add_action( 'mesopotamia_start_scratch_page', 'inject_slider_revolution_in_the_scratch_page' );

function inject_slider_revolution_in_the_sidebar_content_page(){
	$rev_slider = get_post_meta( get_the_ID(), '_mesopotamia_slider_revolution', true );

	if ( $rev_slider && function_exists( 'putRevSlider' ) ) {

		echo '<div id="main-slideshow">';
		putRevSlider( $rev_slider );
		echo '</div>';
	}
}
add_action( 'mesopotamia_start_sidebar_content_page', 'inject_slider_revolution_in_the_sidebar_content_page' );

function inject_slider_revolution_controls($wp_customize){
	$rev_sliders = array();

	if ( class_exists( 'RevSlider' ) ) {

		$rev = new RevSlider();

		$arrSliders = $rev->getArrSliders();
		foreach ( (array) $arrSliders as $revSlider ) {
			$rev_sliders[ $revSlider->getAlias() ] = $revSlider->getTitle();
		}
	}

	$rev_sliders[''] = 'None';

	$wp_customize->add_control(
		'blog_slider_revolution',
		array(
			'type'    => 'select',
			'label'   => __( 'Select Slider Revolution For Blog Page', 'mesopotamia' ),
			'section' => 'general',
			'choices' => $rev_sliders,
		)
	);

	$wp_customize->add_control(
		'search_slider_revolution',
		array(
			'type'    => 'select',
			'label'   => __( 'Select Slider Revolution For Search Page', 'mesopotamia' ),
			'section' => 'general',
			'choices' => $rev_sliders,
		)
	);

	$wp_customize->add_control(
		'archive_slider_revolution',
		array(
			'type'    => 'select',
			'label'   => __( 'Select Slider Revolution For Archive/Category/Tag Page', 'mesopotamia' ),
			'section' => 'general',
			'choices' => $rev_sliders,
		)
	);
}
add_action( 'register_mesopotamia_controls', 'inject_slider_revolution_controls' );

function inject_revolution_slider_settings($wp_customize){
	$wp_customize->add_setting( "blog_slider_revolution", array(
		"default"   => "",
		"transport" => "refresh",
	) );

	$wp_customize->add_setting( "search_slider_revolution", array(
		"default"   => "",
		"transport" => "refresh",
	) );

	$wp_customize->add_setting( "archive_slider_revolution", array(
		"default"   => "",
		"transport" => "refresh",
	) );
}
add_action( 'register_mesopotamia_settings', 'inject_revolution_slider_settings' );
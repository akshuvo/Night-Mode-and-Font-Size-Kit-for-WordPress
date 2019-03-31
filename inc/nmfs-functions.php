<?php
/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function nmfs_body_classes( $classes ) {

	$night_mode_cookie = esc_attr( $_COOKIE['night_mode'] );
	$text_size_cookie = esc_attr( $_COOKIE['text_size'] );

	// Adds a class of hfeed to non-singular pages.
	if ( isset( $night_mode_cookie ) &&  $night_mode_cookie == '1' ) {
		$classes[] = 'nm_active';
	}
	// Adds a class of no-sidebar when there is no sidebar present.
	if ( isset( $text_size_cookie ) ) {
		$classes[] = 'size-'.$text_size_cookie;
	}
	return $classes;
}
add_filter( 'body_class', 'nmfs_body_classes' );

/**
 *	Custom CSS function 
 */
if( !function_exists( 'nmfs_custom_css_function' ) ){
	function nmfs_custom_css_function(){

		global $nmfs_opt;
		$output = '';

		if( $nmfs_opt["nmfs-bgcolor"] != '#1c1b1b' ) :
			$output .= '
			body.nm_active,
			body.nm_active *,
			body.nm_active ::after{
			    background: '.$nmfs_opt["nmfs-bgcolor"].';
			}
			';
		endif;

		if( $nmfs_opt["nmfs-color"] != '#d3d3d3' ) :
			$output .= '
			body.nm_active,
			body.nm_active *{
			    color: '.$nmfs_opt["nmfs-color"].'!important;
			}
			body.nm_active svg{
			    fill: '.$nmfs_opt["nmfs-color"].';
			}
			';
		endif;

		if( $nmfs_opt["nmfs-linkcolor"] != '' ) :
			$output .= '
			body.nm_active a{
			    color: '.$nmfs_opt["nmfs-linkcolor"].'!important;
			}
			';
		endif;

		if( $nmfs_opt["nmfs-link-hcolor"] != '' ) :
			$output .= '
			body.nm_active a:hover{
			    color: '.$nmfs_opt["nmfs-link-hcolor"].'!important;
			}
			';
		endif;

		if( $nmfs_opt["nmfs-bordercolor"] != '' ) :
			$output .= '
			body.nm_active,
			body.nm_active *{
			    border-color: '.$nmfs_opt["nmfs-bordercolor"].'!important;
			}
			';
		endif;

		if( $nmfs_opt["nmfs-imgfilter"] != '1' ) :
			$output .= '
			body.nm_active img {  
			  -webkit-filter: opacity('.$nmfs_opt["nmfs-imgfilter"].');  
			          filter: opacity('.$nmfs_opt["nmfs-imgfilter"].');
			}
			';
		endif;

		if( $nmfs_opt["nmfs-lsize"] != '107' ) :
			$output .= '
			body.size-L,
			body.size-L p, 
			body.size-L a, 
			body.size-L h3, 
			body.size-L h4, 
			body.size-L h5, 
			body.size-L h6, 
			body.size-L button, 
			body.size-L span {
			  font-size: '.$nmfs_opt["nmfs-lsize"].'%;
			}
			';
		endif;

		if( $nmfs_opt["nmfs-xlsize"] != '115' ) :
			$output .= '
			body.size-XL,
			body.size-XL p, 
			body.size-XL a,  
			body.size-XL h3, 
			body.size-XL h4, 
			body.size-XL h5, 
			body.size-XL h6, 
			body.size-XL button, 
			body.size-XL span {
			  font-size: '.$nmfs_opt["nmfs-xlsize"].'%;
			}
			';
		endif;

		if( $nmfs_opt["nmfs-custom-css"] != '' ) :
			$output .= $nmfs_opt["nmfs-custom-css"]; //Custom css
		endif;
		
		wp_add_inline_style( 'nmfs-styles', $output );
	}
}
add_action( 'wp_enqueue_scripts', 'nmfs_custom_css_function', 200 );
<?php
/**
 * Dymanic css choose from backend
 * 
 * @package The Monday
 */

$root = '../../../..';
if (file_exists($root . '/wp-load.php')) {
    require_once( $root . '/wp-load.php' );
} elseif (file_exists($root . '/wp-config.php')) {
    require_once( $root . '/wp-config.php' );
} else {
    die('/* Error */');
}

header("Content-type: text/css");
 
 //Converts hex colors to rgba for the menu background color
function the_monday_hex2rgba($color, $opacity = false) {

        if ($color[0] == '#' ) {
        	$color = substr( $color, 1 );
        }
        $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        $rgb =  array_map('hexdec', $hex);
        $opacity = 0.9;
        $output = 'rgba('.implode(",",$rgb).','.$opacity.')';

        return $output;
}

//Dynamic styles

	$custom_css = '';
    
    //Header section
    //$front_header_type = get_theme_mod( 'front_header_type', __( 'slider', 'the-monday' ) );
    //$inner_header_type = get_theme_mod( 'inner_header_type', __( 'image', 'the-monday' ) ); 
    
    /*if ( ( $front_header_type == 'nothing' && is_front_page() ) || ( $inner_header_type == 'nothing' && !is_front_page() ) ) {
		$menu_bg_color = get_theme_mod( 'menu_bg_color', '#000000' );
		$menu_rgba 	= the_monday_hex2rgba( $menu_bg_color, 0.9 );
		$custom_css .= ".site-header { position:relative;background-color:" . esc_attr( $menu_rgba ) . ";}" . "\n";
		$custom_css .= ".admin-bar .site-header,.admin-bar .site-header.float-header { top:0;}"."\n";
		$custom_css .= ".site-header.fixed {position:relative;}"."\n";
		$custom_css .= ".site-header.float-header {padding:20px 0;}"."\n";
	}*/
    
    $the_monday_header_font_family = get_theme_mod( 'header_fonts', __( 'Open Sans,sans-serif', 'the-monday' ) );
    $the_monday_h2font_size = get_theme_mod( 'h2_font_size', '24' );
    //$the_monday_header_color = get_theme_mod( 'header_font_color', __( '#000000', 'the-monday' ) );
    $the_monday_section_title_size = get_theme_mod( 'home_section_title_size', '35' );
        
        //$custom_css .= "h2.home-title{";
        $custom_css .= "h2.home-title{ font-size:". esc_attr( $the_monday_section_title_size ) ."px; font-family:". esc_attr( $the_monday_header_font_family ) ."; }". "\n";
        
        $the_monday_custom_css_value = get_theme_mod( 'custom_css_textarea', '' );
        
        $custom_css .= $the_monday_custom_css_value;	
    
    echo $custom_css;
?>


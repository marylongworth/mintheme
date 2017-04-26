<?php
/**
 * Adds custom CSS to the wp_head() hook.
 *
 *
 * @package WordPress
 * @subpackage mintheme
 */
 
 
if ( !function_exists( 'bspwp_custom_css' ) ) {
    
    add_action('wp_head', 'mint_custom_css');
    function mint_custom_css() {
            
            $custom_css ='';
 
            if(mint_option('custom_css') != '') {
                $custom_css .= mint_option('custom_css');
            }   
 
            if(mint_option('disable_fixed_navbar') == '1') {
                $custom_css .= 'body { padding-top: 70px; }
                body.admin-bar .navbar {position:fixed; top: 28px; z-index: 1000; height: 40px;}';
            }   
            
            //trim white space for faster page loading
            $custom_css_trimmed =  preg_replace( '/\s+/', ' ', $custom_css );
        
            //echo css
            $css_output = "<!-- Custom CSS -->\n<style type=\"text/css\">\n" . $custom_css_trimmed . "\n</style>";
            
            if(!empty($custom_css)) {
                echo $css_output;
            }
    }
    
}
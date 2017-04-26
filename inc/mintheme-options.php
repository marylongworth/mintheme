<?php
/**
 * @package mintheme
 */
 
if ( ! function_exists('mint_option') ) {
	function mint_option($id, $fallback = false, $param = false ) {
		global $mint_options;
		if ( $fallback == false ) $fallback = '';
		$output = ( isset($mint_options[$id]) && $mint_options[$id] !== '' ) ? $mint_options[$id] : $fallback;
		if ( !empty($mint_options[$id]) && $param ) {
			$output = $mint_options[$id][$param];
		}
		return $output;
	}
}
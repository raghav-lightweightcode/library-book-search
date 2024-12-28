<?php
/**
 * File to execute the Librarybooksearch Shortcode
 *
 * @package Librarybooksearch
 */

$lbs_shortcode = '';

/*$lbs_shortcode .= '[LBS_book_search]';

echo do_shortcode( $lbs_shortcode );*/

// function that runs when shortcode is called
function lbs_get_shortcode() { 
 
// Things that you want to do. 
$message = 'Hello world!'; 
 
// Output needs to be return
return $message;
} 
// register shortcode
add_shortcode('LBS_book_search', 'lbs_get_shortcode');
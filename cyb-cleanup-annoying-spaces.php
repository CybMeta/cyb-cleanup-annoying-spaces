<?php
/*
Plugin Name:  Cyb Cleanup Annoying non-breaking Spaces
Plugin URI:   http://cybmeta.com
Description:  A plugin to cleanup annoying spaces from TinyMCE
Version:      0.2
Author:       Juan Padial (@CybMeta)
Author URI:   http://cybmeta.com
*/
add_filter( 'wp_insert_post_data', 'cyb_cleanup_annoying_spaces', 10, 2 );
function cyb_cleanup_annoying_spaces( $data, $postarr ) {
   
    // Cleanup annoying non-breaking spaces that
    // makes lines of text to be broken in wrong places.
    // It seems to be due tinyMCE adding U+00A0 unicode's character
    // in some copy&paste situations that I've not been
    // able to determine
    // See: http://blog.room34.com/archives/5075
    //      http://www.fileformat.info/info/unicode/char/00a0/index.htm
    //      http://stackoverflow.com/questions/2592502/i-have-a-string-with-u00a0-and-i-need-to-replace-it-with-str-replace-fail
    
    $data['post_content'] = str_replace( chr( 194 ) . chr( 160 ) , chr( 32 ),  $data['post_content'] );
	
    return $data;
	
}
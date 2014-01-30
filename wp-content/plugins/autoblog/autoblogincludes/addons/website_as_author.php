<?php
/*
Addon Name: Use the website as the author name
Description: This plugin changes the author name to the website name
Author: Thomas Faurbye Nielsen (Dreamabout Aps)
Network: False
*/

function AB_source_as_author( $permalink ) {

    global $post;
    if(!isset($post)) {
        return $permalink;
    }
    $thePostID = $post->ID;

    $internal_post = get_post( $thePostID );

    $title = $internal_post->post_title;

    $post_keys = array();
    $post_val  = array();
    $post_keys = get_post_custom_keys( $thePostID );

    if (!empty($post_keys)) {
        foreach ($post_keys as $pkey) {
            if ($pkey == 'original_source') {
                $post_val = get_post_custom_values( $pkey, $thePostID );
                break;
            }
        }

        if(empty($post_val)) {
            $link = $permalink;
        } else {
            $pUrl = parse_url($post_val[0]);
            $link = $pUrl["host"];
        }
    } else {
        $link = $permalink;
    }

    return $link;

}

add_filter('the_author','AB_source_as_author');

?>
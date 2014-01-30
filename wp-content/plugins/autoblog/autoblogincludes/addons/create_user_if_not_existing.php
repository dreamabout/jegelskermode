<?php
/*
Addon Name: Create user if not existing
Description: Imports any images in a post to the media library and attaches them to the imported post.
Author: Barry (Incsub)
Author URI: http://premium.wpmudev.org
*/

class A_CreateUserByDomainAddon {
    public function filterAuthor($author, $ablog = null)
    {
        $pUrl = parse_url($ablog["url"]);
        
        $slug = $pUrl["host"];

        $user = get_user_by('login', $slug);
        if ($user) {
            return $user->ID;    
        } else {
            $id = wp_insert_user(
                array(
                    "user_pass" => sha1($slug) . uniqid(),
                    "user_login" => "{$slug}",
                    "user_email" => sha1($slug) . "@blogger.jegelskermode.dk",
                    "user_url" => $slug,
                    "display_name" => $slug,
                    "role" => "external_blogger"
                )
            );
            return $id;
        }
        
    }
}

$ACreateUserByDomainAddon = new A_CreateUserByDomainAddon();

add_filter("autoblog_author", array($ACreateUserByDomainAddon, "filterAuthor"), 10, 2);
?>

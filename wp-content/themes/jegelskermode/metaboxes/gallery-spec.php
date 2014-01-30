<?php

$media_mb = new WPAlchemy_MetaBox(array

(

    'id' => '_custom_meta',

    'title' => 'Tilføj galleri til indlæg',

    'template' => get_stylesheet_directory() . '/metaboxes/gallery-meta.php',

));
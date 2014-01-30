<?php 
function dw_minion_entry_meta() {
    if ( !('post' === get_post_type() || 'external_post' === get_post_type()) || has_post_format('link') ) return false;
    echo '<div class="entry-meta">';

    if ( ! has_post_format('quote') ) {
        printf( __( '<span class="byline">By <span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span></span>', 'dw-minion' ),
            esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
            esc_attr( sprintf( __( 'View all posts by %s', 'dw-minion' ), get_the_author() ) ),
            esc_html( get_the_author() )
        );

        $categories_list = get_the_category_list( __( ', ', 'dw-minion' ) );
        if ( $categories_list )
            printf( __( '<span class="cat-links"> in %1$s</span>', 'dw-minion' ), $categories_list );

        if( 'gallery' == get_post_format() ) {
            $post_format_icon = 'icon-picture';
        } else if ( 'video' == get_post_format() ) {
            $post_format_icon = 'icon-facetime-video';
        } else if ( 'quote' == get_post_format() ) {
            $post_format_icon = 'icon-quote-left';
        } else if ( 'link' == get_post_format() ) {
            $post_format_icon = 'icon-link';
        } else {
            $post_format_icon = 'icon-file-text';
        }

        printf( __( '<span class="sep"><span class="post-format"><i class="%1$s"></i></span></span>', 'dw-minion' ), $post_format_icon );
    }

    $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';

    $time_string = sprintf( $time_string,
        esc_attr( get_the_date( 'c' ) ),
        esc_html( get_the_date() )
    );

    printf( __( '<span class="posted-on"><a href="%1$s" title="%2$s" rel="bookmark"><i class="icon-calendar-empty"></i> %3$s</a></span>', 'dw-minion' ),
        esc_url( get_permalink() ),
        esc_attr( get_the_time() ),
        $time_string
    );

    if ( ! post_password_required() && comments_open() ) { ?>
        <span class="comments-link"><?php comments_popup_link( __( '<i class="icon-comment-alt"></i> 0 Comment', 'dw-minion' ), __( '<i class="icon-comment-alt"></i> 1 Comment', 'dw-minion' ), __( '<i class="icon-comment-alt"></i> % Comments', 'dw-minion' ) ); ?></span>
    <?php }

    echo '</div>';
}

function jem_old_gallery_format($pictures) {
    $pictures   = (array) $pictures;
    $id         = get_the_ID();
    $itemtag    = tag_escape("div");
    $selector   = "carousel-1";
    $icontag    = tag_escape("div");
    $captiontag = tag_escape("div");
    $itemclass  = "";
    if(empty($pictures)) {
        return "";
    }
    $output = "<div class='entry-gallery'>";

    $output .= "<div id='{$selector}' class='carousel slide carousel-{$id}'>";

    $output .= "<ol class='carousel-indicators'>";
    $j = 0;
    foreach ( $pictures as $id => $attachment ) {
        $itemclass = ($j==0) ? 'active' : '';
        $output .= "<li class='{$itemclass}' data-slide-to='{$j}' data-target='#{$selector}'></li>";
        $j++;
    }
  $output .= "</ol>";

    $i = 0;
  $output .= "<div class='carousel-inner'>";
  foreach ( $pictures as $id => $picture ) {
    $itemclass = ($i==0) ? 'item active' : 'item';
    $caption = isset($picture["title"]) ? $picture["title"] : "";
    $url = isset($picture["imgurl"]) ? $picture["imgurl"] : false;
    if ($url === false) {
        continue;
    }
    $link = "<img src=\"{$picture["imgurl"]}\" alt=\"{$caption}\">";

    $output .= "<{$itemtag} class='{$itemclass}'>";
    $output .= "<{$icontag} class='carousel-icon'>{$link}</{$icontag}>";

    if ( $captiontag && $caption ) {
      $output .= "<{$captiontag} class='carousel-caption'>{$caption}</{$captiontag}>";
    }
    $output .= "</{$itemtag}>";
    $i++;
  }
  $output .= "</div>";
  $output .= "<a data-slide='prev' href='#{$selector}' class='carousel-control left'><i class='icon-chevron-left'></i></a>";
  $output .= "<a data-slide='next' href='#{$selector}' class='carousel-control right'><i class='icon-chevron-right'></i></a>";
  
  $output .= "</div>";
  $output .= "</div>";
  return $output;
}
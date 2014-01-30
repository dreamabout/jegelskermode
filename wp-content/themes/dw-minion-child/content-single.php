<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php if( ! has_post_format('quote') ) : ?><h1 class="entry-title"><?php the_title(); ?></h1><?php endif; ?>
        <?php dw_minion_entry_meta(); ?>
    </header>
    <?php if( has_post_thumbnail() ) : ?>
    <div class="entry-thumbnail"><?php the_post_thumbnail(); ?></div>
    <?php endif; ?>
    <?php if ( is_search() ) : ?>
    <div class="entry-summary">
        <?php the_excerpt(); ?>
    </div>
    <?php else : ?>
    <div class="entry-content">
        <?php 
            $meta = get_post_meta( get_the_ID() , "_custom_meta", true); 
            $pictures = array();
            if(!empty($meta) && isset($meta["docs"])) {
                $pictures = $meta["docs"];
            }
            echo jem_old_gallery_format($pictures);
        ?>
        <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'dw-minion' ) ); ?>
        <?php
            wp_link_pages( array(
                'before' => '<div class="page-links">',
                'after'  => '</div>',
                'link_before' => '<span class="btn btn-small">',
                'link_after'  => '</span>',
            ) );
        ?>
    </div>
    <?php endif; ?>
    <footer class="entry-footer">
        <?php
            $tags_list = get_the_tag_list( '', __( '', 'dw-minion' ) );
            if ( $tags_list ) :
        ?>
        <div class="entry-tags">
            <span class="tags-title"><?php _e('Tags','dw-minion') ?></span>
            <span class="tags-links">
                <?php printf( __( '%1$s', 'dw-minion' ), $tags_list ); ?>
            </span>
        </div>
        <?php endif; ?>
    </footer>
</article>
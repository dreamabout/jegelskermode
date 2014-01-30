<article id="external_post-<?php the_ID(); ?>" <?php 
$classes[] = "clearfix";
if(has_post_thumbnail()) {
    $classes[] = "has-thumb";
}

$classes = get_post_class($classes); 

echo "class=\"" . implode(" ", $classes) .  "\"";
?>>
    <?php if( has_post_thumbnail() ) : ?>
    <div class="entry-thumbnail">
        <a href="<?= get_permalink(); ?>" title="<?= get_the_title(); ?>"><?php the_post_thumbnail(); ?></a></div>
    <?php endif; ?>
    <div class="content-block">
    <header class="entry-header">
        <?php if( ! has_post_format('quote') ) : ?><h1 class="entry-title"><a href="<?= get_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1><?php endif; ?>
        <?php dw_minion_entry_meta(); ?>
    </header>
    
    <div class="entry-content"> 
        <?php the_excerpt(); ?>
        <?php
            wp_link_pages( array(
                'before' => '<div class="page-links">' . __( '', 'dw-minion' ),
                'after'  => '</div>',
                'link_before' => '<span class="btn btn-small">',
                'link_after'  => '</span>',
            ) );
        ?>
    </div>
    </div>
</article>
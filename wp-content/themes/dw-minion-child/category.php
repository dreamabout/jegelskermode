<?php get_header(); ?>

        <div id="primary" class="content-area category">
            <div class="primary-inner">
                <header class="page-header">
                    <h1 class="page-title">
                        <?php
                        single_cat_title();
                        ?>
                    </h1>
                    <?php

                        $term_description = term_description();
                        if ( ! empty( $term_description ) ) :
                            printf( '<div class="taxonomy-description">%s</div>', $term_description );
                        endif;
                    ?>
                </header>
                <div id="content" class="site-content content-list" role="main">

                <?php if ( have_posts() ) : ?>

                    <?php while ( have_posts() ) : the_post(); ?>

                        <?php get_template_part( 'content', get_post_format() ); ?>

                    <?php endwhile; ?>

                    <?php dw_minion_content_nav( 'nav-below' ); ?>

                <?php else : ?>

                    <?php get_template_part( 'no-results', 'archive' ); ?>

                <?php endif; ?>

                </div>
            </div>
        </div>

<?php get_sidebar('secondary'); ?>
<?php get_footer(); ?>
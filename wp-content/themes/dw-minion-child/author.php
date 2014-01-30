<?php get_header(); ?>

        <div id="primary" class="content-area author">
            <div class="primary-inner">
                <header class="page-header">
                    <h1 class="page-title">
                <?php 
                $user = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
                the_post();
                $externalBlogger = in_array("external_blogger", $user->roles);
                if($externalBlogger) {
                    /////var_dump($user);
                    printf( 
                    __('Ekstern blogger: %s', 'dw-minion' ), 
                        '<span class="vcard"><a class="url" href="' . esc_url( $user->user_url) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' );
                } else {
                     printf(
                        __( 
                            get_user_meta($user->ID, 'title',true) . ': %s', 'dw-minion' 
                        ), 
                        '<span class="vcard"><a class="url fn n" href="' . 
                            esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . 
                        '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . 
                            get_the_author() . '</a></span>' 
                    ); 
                }
                rewind_posts(); ?>
                </h1>
                <?php

                $term_description = term_description();
                if ( ! empty( $term_description ) ) :
                    printf( '<div class="taxonomy-description">%s</div>', $term_description );
                endif;
                ?>
            </header>

                
                <?php
    
    ?>

                <div class="description clearfix">
                    <div class="image pull-left">
                        <?php echo get_avatar(get_the_author_meta('user_email'),200); ?>
                    </div>
                    <div class="pull-left">
                        <?php if(!$externalBlogger || $user->description ) : ?>
                            <?php echo $user->description; ?>
                        <?php else : ?>
                        <a href="<?=esc_url( $user->user_url); ?>" title="<?=esc_attr( get_the_author() );?>" rel="me"><?= $user->display_name; ?></a> er en blogger hos jegelskermode.dk, som har tilmeldt sin blog til vores blognetværk.
                        Der er endnu ikke blevet udfyldt en beskrivelse af vedkommende.
                        <?php endif; ?>

                </div>
                </div>
<h2>Indlæg af <?= $user->display_name; ?></h2>
                <div id="content" class="site-content content-list" role="main">

                <?php if ( have_posts() ) : ?>

                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php get_template_part( 'content', get_post_type() == "external_post" ? "external_post" : get_post_format() ); ?>

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
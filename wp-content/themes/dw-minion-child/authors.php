<?php
/*
  Template Name: Redaktionsiden med bloggere
 */
?>
<?php get_header(); ?>

        <div id="primary" class="content-area">
            <div class="primary-inner">
                <div id="content" class="site-content" role="main">

                <?php while ( have_posts() ) : the_post(); ?>

                    <?php get_template_part( 'content', 'page' ); ?>

                    <?php if ( comments_open() ) comments_template(); ?>

                <?php endwhile; ?>
                    <div class="clearfix bloggers">
                        <h2>Skribenter</h2>
                    <?php 
                    $bloggers = array_values(get_users("role=author"));
                    $bloggers = array_merge($bloggers, array_values(get_users(array("role" => "administrator", "exclude" => array(1)))));
                    foreach($bloggers as $i => $blogger) {
                        $GLOBALS['blogger'] = $blogger;
                        get_template_part( 'author/blogger' , $i % 2 == 1 ? 'even' : 'odd' );
                    }
                    ?>
                    </div>
                </div>
            </div>
        </div>

<?php get_sidebar('secondary'); ?>
<?php get_footer(); ?>
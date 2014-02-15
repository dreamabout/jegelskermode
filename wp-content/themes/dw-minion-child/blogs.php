<?php
/*
  Template Name: Blogliste sorteret alfabetisk
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
                    <div class="clearfix bloglist">
                    	<?php // fetch blogs from autoblogs-table.
                    	global $wpdb;

                    	$table = $wpdb->prefix . 'autoblog';
                    	$rows = $wpdb->get_col( $wpdb->prepare( "SELECT feed_meta FROM {$table}", null ), 0 );

                        $sorted = array();

                    	foreach ($rows as $blog) {
                    		$blog = unserialize($blog);
                            $name = trim($blog['bloginfo']['name'], ' \t\n\r\0\x0B".*\'-'); // trim chars from names to fix sorting
                            $link = $blog['bloginfo']['link'];
                            $sorted[$name] = $link;
                    	}

                        ksort($sorted, SORT_LOCALE_STRING); // sort entries by system default locale

                        foreach ($sorted as $name => $link) {
                            printf('<a class="bloglist-link" href="%s">%s</a><br>', $link, $name);
                        }

                    	?>
                    </div>
                </div>
            </div>
        </div>

<?php get_sidebar('secondary'); ?>
<?php get_footer(); ?>
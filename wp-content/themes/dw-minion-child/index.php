<?php get_header(); ?>

		<div id="primary" class="content-area">
			<div class="primary-inner">
				<div id="content" class="site-content content-list" role="main">
				<?php if ( have_posts() ) : ?>
				<?php 	
					$maxRegularPosts = get_option('posts_per_page');
					while ( have_posts() ) : the_post(); ?>
					<?php global $paged; 
					if (!$paged) {
						$paged = 1;
					}
					if (!isset($i)) {
						$i = $maxRegularPosts * $paged - $maxRegularPosts;
					}
					?>
						<?php get_template_part( 'content', get_post_format() ); ?>
						<?php 

						$externalPosts = get_posts(array("posts_per_page" => 2, "orderby" => "date", "post_type" => "external_post", "offset" => $i));
						if(count($externalPosts) > 0) : ?>
							<div class="external-posts clearfix">
							<?php foreach($externalPosts as $post) : ?>
								<?php 
								setup_postdata($post);

								get_template_part( 'content', get_post_type() ); ?>
							<?php endforeach; ?>
							<?php $i = $i + count($externalPosts); ?>
							</div>
						<?php endif; ?>
					<?php $i++; ?>		
					<?php endwhile; ?>

					<?php dw_minion_content_nav( 'nav-below' ); ?>

				<?php else : ?>

					<?php get_template_part( 'no-results', 'index' ); ?>

				<?php endif; ?>

				</div>
			</div>
		</div>

<?php get_sidebar('secondary'); ?>
<?php get_footer(); ?>
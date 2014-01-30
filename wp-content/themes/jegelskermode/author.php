<?php
/* -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
  Author Page
  ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ */
?>
<?php require 'res/inc/header.inc.php'; ?>
<section class="span8" id="main" role="main">
	<?php if (have_posts()): the_post(); ?>
	<h1 class="screen-reader-text"><?php echo get_the_author(); ?></h1>
		<div id="auther">
			<div class="divideAuther">
				<div class="row">
					<div class="span4">
						<?php echo get_avatar(get_the_author_meta('user_email'), 280); ?>
					</div>
					<div class="span4">
						
							<?php if ( get_the_author_meta('first_name')): ?>
							<h1>
								<?php the_author_meta('first_name'); ?>
							</h1>
							<?php else: ?>
								<h1>Oplysninger mangler</h1>	
							<?php endif; ?>	
								
							<?php if ( get_the_author_meta('title')): ?>
							<p>
								<?php the_author_meta('title'); ?>
								<?php if(get_the_author_meta('category')):?>
								| <?php the_author_meta('category'); ?>
								<?php endif; ?>
							</p>
							<?php endif; ?>									
							
							<?php if ( get_the_author_meta('description')): ?>
							<p>
								<?php the_author_meta('description') ?>
							</p>	
							<?php else: ?>
							<p>
								Skribenten har endnu ikke indtastede oplysninger som sig selv endnu.
							</p>
							<?php endif; ?>						
					</div>	
				</div>
			</div>
		</div>
		<?php
		rewind_posts();
		while (have_posts()) : the_post();
			?>
			<article class="divider">
				<h1><a href="<?php esc_url(the_permalink()); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
				<div class="elegantSeperatorTop"></div>
				<p class="dec">
					Af <?php the_author_posts_link(); ?> - <?php the_category(', '); ?> 
				</p>
				<?php if ( has_post_thumbnail() ): // check if the post has a Post Thumbnail assigned to it. ?> 
				<div>
					<a href="<?php esc_url( the_permalink()); ?>" class="border">
						<?php the_post_thumbnail(); ?>				
					</a>
				</div>	
				<?php endif; ?>
				<div class="postExcerpt">
					<a href="<?php esc_url(the_permalink()); ?>"><?php the_excerpt(); ?></a>

				</div>   
			</article>
		<?php endwhile; ?>
		<?php require 'res/inc/postsposts-nav.inc.php'; ?>
	<?php else: ?>
		<h2>Der er endnu ingen indlæg fra: <?php echo get_the_author(); ?></h2>	
	<?php endif; ?>			
</section>
<?php require 'res/inc/sidebar.inc.php'; ?>
<?php require 'res/inc/footer.inc.php'; ?>
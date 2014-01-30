<?php
	/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	Search
	------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/	
?>
<?php require 'res/inc/header.inc.php'; ?>
<section class="span8 offset2" role="main">
	<?php if (get_search_query() == 'searchmode') : ?>
		<article class="divider">
			<h1>Foretag din s&oslash;gning herunder</h1>
			<div class="elegantSeperatorTop"></div>
			<p class="dec">
				Der s&oslash;ges b&aring;de p&aring; interne og eksterne blogindl&aelig;g
			</p>
			<div class="search-page-search-space">
			<?php require 'res/inc/searchform.php'; ?>
			</div>				
		</article>
	<?php else: ?>
	<?php if (have_posts()): ?>
	<div class="divider">
		<h1>S&oslash;geresultat for:  '<?php echo get_search_query(); ?>'</h1>
		<div class="search-page-search-space">	
		<?php require 'res/inc/searchform.php'; ?>
		</div>
	</div>
	
		<?php while (have_posts()) : the_post(); ?>
		<article class="divider">
			<h1><a href="<?php esc_url( the_permalink() ); ?>" title="Link til <?php the_title(); ?>" rel="bookmark"><?php the_title() ?></a></h1>
			<div class="elegantSeperatorTop"></div>
			<p class="dec">
				<?php if (get_post_type( $post->ID ) == 'ekstern'): 
					$s_link = get_syndication_source_link();
					$s_name_remove = array('http://www.', 'www.', 'http://');
					$s_name = ucfirst(str_replace($s_name_remove, "", $s_link));
				?>
				Fra <a href="<?php the_permalink() ?>"><?php echo $s_name; ?></a> - <?php the_category(', '); ?> 
				<?php else: ?>
				Af <?php  the_author_posts_link(); ?> - <?php the_category(', '); ?> 
				
				<?php endif; ?>
			</p>
			<?php if ( has_post_thumbnail() ): // check if the post has a Post Thumbnail assigned to it. ?> 
			<div>
				<a href="<?php esc_url( the_permalink()); ?>" class="border">
					<?php the_post_thumbnail(); ?>				
				</a>
			</div>	
			<?php endif; ?>
			
			<div class="postExcerpt">
			<?php 
			// Get excerpt
			$my_excerpt = get_the_content();
			$my_excerpt = strip_tags ( $my_excerpt );
			
			// Count and create string but stop at space.
			if (strlen($my_excerpt) > 300){
				$pos = strpos($my_excerpt, ' ', 300);
				$my_excerpt = substr($my_excerpt,0,$pos );
			}			
			?>
				
			<a href="<?php esc_url( the_permalink() ); ?>"><?php echo $my_excerpt."..." ?></a>
			</div>   				
		</article>
		<?php endwhile; ?>
		<?php require 'res/inc/postsposts-nav.inc.php'; ?>
	<?php else: ?>

	<div class="divider">
		<h1>Ingen s&oslash;geresultat for:  '<?php echo get_search_query(); ?>'</h1>
		<div class="search-page-search-space">	
		<?php require 'res/inc/searchform.php'; ?>
		</div>
	</div>	
	
	
	<?php endif; ?>
	<?php endif; ?>
</section>
<?php require 'res/inc/footer.inc.php'; ?>
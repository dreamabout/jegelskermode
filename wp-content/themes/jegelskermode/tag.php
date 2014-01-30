<?php
	/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	Category page
	------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/	
?>
<?php require 'res/inc/header.inc.php'; ?>
	<section class="span8" id="main" role="main">
	<?php if ( have_posts() ): ?>
	<h1 class="screen-reader-text">Indl&aelig;g i: <?php echo single_cat_title( '', false ); ?></h1>
	<?php while ( have_posts() ) : the_post(); ?>
		<article class="divider">
			<h1><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
			<div class="elegantSeperatorTop"></div>
			
			<?php 
				$s_link = get_syndication_source_link();
				$s_name_remove = array('http://www.', 'www.', 'http://');
				$s_name = ucfirst(str_replace($s_name_remove, "", $s_link));
			?>				

			<p class="dec">
				Fra <?php echo $s_name; ?>
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
		<h2>Der findes ingen indl&aelig;g i denne kategori</h2>
	<?php endif; ?>
	</section>
<?php require 'res/inc/sidebar.inc.php'; ?>
<?php require 'res/inc/footer.inc.php'; ?>
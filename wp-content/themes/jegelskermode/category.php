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
			<p class="dec">
				Af <?php  the_author_posts_link(); ?> - <?php  the_category(', ');?>
			</p>
			<?php if ( has_post_thumbnail() ): // check if the post has a Post Thumbnail assigned to it. ?> 
			<div>
				<a href="<?php esc_url( the_permalink()); ?>" class="border">
					<?php the_post_thumbnail(); ?>				
				</a>
			</div>	
			<?php endif; ?>	
			<div class="postExcerpt">
				<a href="<?php esc_url( the_permalink() ); ?>"><?php the_excerpt(); ?></a>
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
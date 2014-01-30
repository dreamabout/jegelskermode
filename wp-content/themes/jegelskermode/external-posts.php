<?php
/*
  Template Name:  Eksterne Posts
 */
?>
<?php require 'res/inc/header.inc.php'; ?>
<section class="span8" id="main" role="main">
	<heading class="screen-reader-text">
		<h1>Feed fra eksterne indekseret blogge</h1>
	</heading>

<?php
$args = array( 'post_type' => 'ekstern', 'posts_per_page' => 10);
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post(); 
?>
	
	<article class="divider">
			<h1><a href="<?php esc_url(the_permalink()); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
			<div class="elegantSeperatorTop"></div>
			<p class="dec">
				Af <?php the_author_posts_link(); ?> - <?php the_category(', '); ?> 
			</p>
			<a href="<?php esc_url(the_permalink()); ?>">
				<?php
				if (has_post_thumbnail()) { // check if the post has a Post Thumbnail assigned to it.
					the_post_thumbnail();
				}
				?>				
			</a>
			<div class="postExcerpt">
				<a href="<?php esc_url(the_permalink()); ?>"><?php the_content(); ?></a>
			</div>   				
		</article>	
	
	
<!--	<article>-->
<!--	<h1>//<?php the_title();?></h1>-->
<?php 
	
//	the_content();
?>
<!--	</article>-->
<?php endwhile;?>
<?php require 'res/inc/postsposts-nav.inc.php'; ?>	
		

	
	
</section>
<?php require 'res/inc/sidebar.inc.php'; ?>
<?php require 'res/inc/footer.inc.php'; ?>
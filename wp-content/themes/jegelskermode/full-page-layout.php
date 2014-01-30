<?php
/*
  Template Name:  Full page layout
 */
?>

<?php require 'res/inc/header.inc.php'; ?>
<article class="span12" role="main">
	<?php if (have_posts()) while (have_posts()) : the_post(); ?>
			<header>
				<h1 class="screen-reader-text"><?php the_title(); ?></h1>
			</header>
			<?php the_content(); ?>
		<?php endwhile; ?>
</article>
<?php require 'res/inc/footer.inc.php'; ?>
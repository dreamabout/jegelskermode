<?php
	/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	Page
	------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/	
  ?>
<?php require 'res/inc/header.inc.php'; ?>
<section class="span8" id="main" role="main">
	<?php if (have_posts()) while (have_posts()) : the_post(); ?>
			<article class="divider">
				<h1><?php the_title(); ?></h1>
				<div class="elegantSeperatorTop"></div>
				<?php the_content(); ?>
			</article>				
		<?php endwhile; ?>	
	
</section>
<?php require 'res/inc/sidebar.inc.php'; ?>
<?php require 'res/inc/footer.inc.php'; ?>
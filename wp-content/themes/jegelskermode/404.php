<?php
	/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	404 siden blev ikke fundet
	------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/	
?>
<?php require 'res/inc/header.inc.php'; ?>
	<section class="span8" role="main">
		<article class="divider" >
			<h1>Vi beklager</h1>
			<div class="elegantSeperatorTop"></div>
			<p class="dec">
				Gå til: <a href="<?php echo get_option('home'); ?>">Forside</a><br/>
				Indrapporter fejl til: <a href="mailto: <?php echo get_settings('admin_email'); ?> ">Administrator</a> 
				
				
			</p>
		</article>
	</section>
<?php require 'res/inc/sidebar.inc.php'; ?>
<?php require 'res/inc/footer.inc.php'; ?>
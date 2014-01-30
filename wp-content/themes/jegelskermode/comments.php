<div id="comments">
	<?php if ( post_password_required() ) : ?>
	<p>This post is password protected. Enter the password to view any comments</p>
</div>
	<?php endif; ?>
	<p>Midlertidig</p>
	<?php if ( have_comments() ) : ?>

	<h2><?php comments_number(); ?></h2>

	<ol>
		<?php wp_list_comments(); ?>
	</ol>

	<p>Comments are closed</p>
	
	<?php endif; ?>

	<?php comment_form(); ?>

</div><!-- #comments -->

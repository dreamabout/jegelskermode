<?php

/*

  Template Name: Tilføj en modeblog

 */

?>

<?php require 'res/inc/header.inc.php'; ?>
<section class="span8 offset2" id="main" role="main">
	<?php if (have_posts()) while (have_posts()) : the_post(); ?>
			<article class="divider">
				<h1><?php the_title(); ?></h1>
				<div class="elegantSeperatorTop"></div>
				<?php the_content(); ?>
			
<div class="row">
	<div class="span6 offset1">
		<?php 
		if (isset($_GET['addlinkmessage'])) {

			global $wpdb;
			$output = "";
			$settings = ( isset( $_GET['settings'] ) ? $_GET['settings'] : 1 );
			$settingsname = 'LinkLibraryPP' . $settings;
			$options = get_option($settingsname);	

			if ($_GET['addlinkmessage'] == 8)
							   {
								  $output .= "<div class='alert alert-success ll-custom-submit-msg'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Ok, </strong> " . $options['newlinkmsg'];
								  if ($options['showuserlinks'] == false)
										$output .= " " . $options['moderatemsg'];
								  $output .= "</div>";
								  echo $output;
							   }


		}
		?>
		<form class="jemForm" role="search" action="<?php bloginfo('siteurl'); ?>/wp-content/plugins/link-library/usersubmission.php" method="post">
			<?php echo wp_nonce_field('LL_ADDLINK_FORM', '_wpnonce', true, false); ?>
			<input type="hidden" name="_wp_http_referer" value="<?php the_permalink(); ?>">
			<input type="hidden" name="thankyouurl" value="">
			<input type="hidden" name="settingsid" value="1">
			<input type="hidden" name="link_category" id="link_category" value="52">

			<div class="foWrap">
					<input name="ll_submittername" class="span6" type="text" placeholder="Dit Navn" required>
			</div>
			<div class="foWrap">
					<input name="ll_email" class="span6" type="email" placeholder="Din kontakt e-mail" required>
			</div>
			<div class="foWrap">
					<textarea name="ll_submittercomment" class="span6" rows="4" type="text" placeholder="Beskrivelse af dig selv" required></textarea>
			</div>
			<div class="foWrap">
					<input name="link_name" class="span6" type="text" placeholder="Navn på din modeblog" required>
			</div>
			<div class="foWrap">
					<input name="link_url" class="span6" type="url" placeholder="Link til din blog (URL, husk http:// foran)" required >
			</div>
			<div class="foWrap">
					<textarea name="link_description" class="span6" rows="4" type="text" placeholder="Beskrivelse af din blog" required></textarea>
			</div>		

				<p class="center">
					<span style="border:0;" class="LLUserLinkSubmit">
					<input type="submit" class="button-jem btn-jem-red btnspace" name="submit" value="Tilmeld blog" />
					</span>
				</p>
			
			<p class="center">Ved at tilf&oslash;je din blog accepterer du <a href="#myModal" role="button" class="underline" data-toggle="modal">Jegelskermode.dk betingelserne</a></p>
			
		</form>	

		<!-- Modal -->
		<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-header">
		    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		    <h2 id="myModalLabel">Jegelskermode.dk betingelserne</h2>
		  </div>
		  <div class="modal-body">
		    <p>Betingelser mangler</p>
		  </div>
		  <div class="modal-footer">
		    <button data-dismiss="modal" aria-hidden="true" class="button-jem btn-jem-red">Luk</button>
		  </div>
		</div>			
		
	</div>
</div>

</article>				
		<?php endwhile; ?>	
	
</section>

<?php require 'res/inc/footer.inc.php'; ?>
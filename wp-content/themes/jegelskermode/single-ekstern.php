<?php require 'res/inc/header.inc.php'; ?>
<section class="span8" role="main">
	<header>
		<h1 class="screen-reader-text">Indlæg</h1>
	</header>
	<?php if (have_posts()) while (have_posts()) : the_post(); 
		$s_link = get_syndication_source_link();
		$s_name_remove = array('http://www.', 'www.', 'http://', '/');
		$s_name = ucfirst(str_replace($s_name_remove, "", $s_link));
	?>	

			<article class="divider">
				<header>
					<h1><?php the_title(); ?></h1>
				</header>
				<div class="elegantSeperatorTop"></div>
				<p class="dec">
					Skrevet <?php the_date(); ?>, fra <a href="<?php echo $s_link ?>"><?php echo $s_name; ?></a>
				</p>

				<?php the_content(); ?>
				<div class="row">
					<div class="span8">	
						<!-- AddThis Button BEGIN -->
						<div class="addthis_toolbox addthis_default_style">
							<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
							<a class="addthis_button_tweet"></a>
							<a class="addthis_button_pinterest_pinit"></a>
							<a class="addthis_counter addthis_pill_style"></a>
						</div>
						<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-510e8f933d959be8"></script>
						<!-- AddThis Button END -->
					</div>
				</div>
			</article>
			<div class="divider">
				<p><strong>Gå til kilde:</strong> <a href="<?php echo get_syndication_permalink() ?>"><?php the_title(); ?> - <?php echo $s_name; ?></a></p>
			</div>

			<?php if (has_tag()) : ?> 

			<div class="divider">
				<p><?php the_tags('<strong>Kategorier:</strong> ', ', ')?></p>
			</div>

			<?php endif; ?>
	
			<?php require 'res/inc/postpost-nav.inc.php'; ?>
	
		<?php endwhile; ?>
		<div class="fb-comments" data-href="<?php the_permalink() ?>" data-width="620" data-num-posts="10"></div>
</section>
<?php require 'res/inc/sidebar.inc.php'; ?>
<?php require 'res/inc/footer.inc.php'; ?>
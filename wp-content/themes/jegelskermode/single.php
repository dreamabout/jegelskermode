<?php require 'res/inc/header.inc.php'; ?>
<section class="span8" role="main">
	<header>
		<h1 class="screen-reader-text">Indlæg</h1>
	</header>
	<?php if (have_posts()) while (have_posts()) : the_post(); ?>
			<article class="divider">
				<header>
					<h1><?php the_title(); ?></h1>
				</header>
				<div class="elegantSeperatorTop"></div>
				<p class="dec">
					Skrevet <?php the_date(); ?>, af  <?php the_author_posts_link(); ?>, <?php the_category(', '); ?>
				</p>
				<div class="single-post-image">
				<?php
					global $media_mb;
					$meta = $media_mb->the_meta();
				?>
				<?php if(isset($meta["docs"]) && count($meta["docs"]) > 0):?>
					<div id="galleria">	
					<?php
					if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
						the_post_thumbnail();
					   } 
					?>   
					<?php foreach ($meta[docs] as $metaData): ?>
					<a href="<?php echo $metaData['imgurl']?>">
					    <img 
						   src="<?php echo $metaData['imgurl']?>"
						   data-big="<?php echo $metaData['imgurl']?>"
						   data-title="<?php echo $metaData['title']?>"
						   data-description="<?php echo $metaData['title']?>"
						   alt="<?php echo $metaData['title']?>"
					    >
					</a>						
					<?php endforeach;?>	
					</div>
					<script src="<?php echo get_stylesheet_directory_uri();?>/res/frameworks/galleria/galleria-1.2.9.min.js"></script>
					<script>
						// Load the classic theme
							Galleria.loadTheme('<?php echo get_stylesheet_directory_uri();?>/res/frameworks/galleria/galleria.classic.min.js');

							Galleria.configure({
							   showInfo: false,
							   showCounter: false
							});

							// Initialize Galleria
							Galleria.run('#galleria');
					</script>						
				<?php else: ?>
					<?php if ( has_post_thumbnail() ): // check if the post has a Post Thumbnail assigned to it. ?> 
					<div clasS="border">
						<?php the_post_thumbnail(); 	?>
					</div>
					<?php endif; ?>
				<?php endif; ?>	

				</div>
				<?php the_content(); ?>
				<!-- AddThis Button BEGIN -->
				<div class="addthis_toolbox addthis_default_style">
					<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
					<a class="addthis_button_tweet"></a>
					<a class="addthis_button_pinterest_pinit"></a>
					<a class="addthis_counter addthis_pill_style"></a>
				</div>
				<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-510e8f933d959be8"></script>
				<!-- AddThis Button END -->
			</article>
			<?php require 'res/inc/postpost-nav.inc.php'; ?>
			<?php $categories = get_the_category($post->ID); ?>
			
			<?php if ($categories[1] == NULL): // If category 1 is empty there are no other in categori, 0 = current post.?>
			<section>
				<header>
				<h2 class="relatedHeading">
					Relaterede nyheder i kategorien: <?php the_category(', '); ?>
				</h2>
				</header>	
				<div class="elegantSeperatorTop"></div>
				<div class="row">
					<ul class="span8 related">
					<?php 
						$category_ids = array();
						foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
						$args=array(
							'category__in' => $category_ids,
							'post__not_in' => array($post->ID),
							'showposts'=>4, // Number of related posts that will be shown.
							'caller_get_posts'=>1
						);						
						$my_query = new wp_query($args);
						if( $my_query->have_posts() ) { 
							while ($my_query->have_posts()) {
								$my_query->the_post();
							?>
						<li><a href="<?php the_permalink()?>" rel="bookmark" title="Link til indlæg: <?php the_title_attribute(); ?>"><?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'related-thumb' ); } ?></a><a href="<?php the_permalink()?>" rel="bookmark" title="Link til indlÃ¦g: <?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
							<?php
							}
					}							
					?>
					</ul>
				</div><!--Row-->
			</section>
			<?php endif; ?>
		<?php endwhile; ?>
		<div class="fb-comments" data-href="<?php the_permalink() ?>" data-width="620" data-num-posts="10"></div>
</section>
<?php require 'res/inc/sidebar.inc.php'; ?>
<?php require 'res/inc/footer.inc.php'; ?>
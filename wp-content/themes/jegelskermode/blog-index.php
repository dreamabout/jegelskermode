<?php

/*

  Template Name: Blogindex

 */
?>
<?php require 'res/inc/header.inc.php'; ?>

<section class="span8" id="main" role="main">
	<?php if (have_posts()) while (have_posts()) : the_post(); ?>
			<article class="divider">
				<h1><?php the_title(); ?></h1>
				<div class="elegantSeperatorTop"></div>
				<?php the_content(); ?>
				<?php
					echo $my_link_library_plugin->LinkLibrary(	$order = 'name', $hide_if_empty = true, $catanchor = true,	$showdescription = false, $shownotes = false, $showrating = false,
														$showupdated = false, $categorylist = '', $show_images = false, 
														$show_image_and_name = false, $use_html_tags = false, 
														$show_rss = false, $beforenote = '<br />', $nofollow = false, $excludecategorylist = '',
														$afternote = '', $beforeitem = '<li>', $afteritem = '</li>', $beforedesc = '', $afterdesc = '',
														$displayastable = false, $beforelink = '', $afterlink = '', $showcolumnheaders = false, 
														$linkheader = '', $descheader = '', $notesheader = '', $catlistwrappers = 1,
														$beforecatlist1 = '', 
														$beforecatlist2 = '', $beforecatlist3 = '', $divorheader = false, $catnameoutput = 'linklistcatname',
														$show_rss_icon = false, $linkaddfrequency = 0, $addbeforelink = '', $addafterlink = '', $linktarget = '',
														$showcategorydesclinks = false, $showadmineditlinks = false, $showonecatonly = false, $AJAXcatid = '',
														$defaultsinglecat = '', $rsspreview = false, $rsspreviewcount = 3, $rssfeedinline = false, $rssfeedinlinecontent = false,
														$rssfeedinlinecount = 1, $beforerss = '', $afterrss = '', $rsscachedir = NULL, $direction = 'ASC', 
														$linkdirection = 'ASC', $linkorder = 'name', $pagination = false, $linksperpage = 5, $hidecategorynames = false,
														$settings = '', $showinvisible = false, $showdate = false, $beforedate = '', $afterdate = '', $catdescpos = 'right',
														$showuserlinks = false, $rsspreviewwidth = 900, $rsspreviewheight = 700, $beforeimage = '', $afterimage = '', $imagepos = 'beforename',
														$imageclass = '', $AJAXpageid = 1, $debugmode = false, $usethumbshotsforimages = false, $showonecatmode = 'AJAX',
														$dragndroporder = '1,2,3,4,5,6,7,8,9,10', $showname = true, $displayweblink = 'false', $sourceweblink = 'primary', $showtelephone = 'false',
														$sourcetelephone = 'primary', $showemail = 'false', $showlinkhits = false, $beforeweblink = '', $afterweblink = '', $weblinklabel = '',
														$beforetelephone = '', $aftertelephone = '', $telephonelabel = '', $beforeemail = '', $afteremail = '', $emaillabel = '', $beforelinkhits = '',
														$afterlinkhits = '', $emailcommand = '', $sourceimage = 'primary', $sourcename = 'primary', $thumbshotscid = '',
														$maxlinks = '', $beforelinkrating = '', $afterlinkrating = '', $showlargedescription = false, $beforelargedescription = '',
														$afterlargedescription = '', $featuredfirst = false, $shownameifnoimage = false, $enablelinkpopup = false, $popupwidth = 300, $popupheight = 400, $nocatonstartup = false 
					);
				?>

				<div class='result'></div>   

			</article>				
		<?php endwhile; ?>	
	
</section>
    
<script>
       jQuery(function(){
			 transformToIndex('.linklist');
		      jQuery('.result').columnize({
                width : '206',
                lastNeverTallest : true
            });
	});
</script>
 
<?php require 'res/inc/sidebar.inc.php'; ?>
<?php require 'res/inc/footer.inc.php'; ?>


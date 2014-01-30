<?php
/*
  Template Name: Redaktionsiden med bloggere
 */
?>
<?php require 'res/inc/header.inc.php'; ?>
<section class="span8" id="main" role="main">
	<h1 class="screen-reader-text"><?php the_title(); ?></h1>
	<?php if (have_posts()) while (have_posts()) : the_post(); ?>
			<article class="divider">	
				<h1><?php the_title(); ?></h1>
				<div class="elegantSeperatorTop"></div>
				<?php the_content(); ?>
			</article>
		<?php endwhile; ?>	


	<div id="auther">
		
	<?php
	$blogusers = get_users('role=author');
	$args = array('role' => 'administrator', 'exclude' => array(1)); 
	$administrators = get_users($args);
	$i = 0;
	
	$divider =  function($nest) {
		return '<div class="divideAuthers">'. $nest .'</div>' ;
	};
	
	
	$row = function ($nest) {
		return  '<div class="row">' . $nest . '</div>' ;
	};
	
	$span = function ($nest, $size) {
		return '<div class="span' .$size.'">' . $nest . '</div>' ;
	};	

	foreach ($administrators as $user) {
	$link = get_author_posts_url( $user->ID);
	$avatar = get_avatar($user->user_email, 280, '', $user->first_name);
	$avatar = '<a href="'.$link.'" title="Se indlæg for blogger" class="block">' . $avatar . '</a>';
	$descripeAuther = 
					   '<h1><a href="'.$link.'" title="Se indlæg for blogger" class="block">' . $user->first_name . '</a></h1>'.
					   '<p><a href="'.$link.'" title="Se indlæg for blogger" class="block">'. $user->title . ($user->category? " | ". $user->category : "")  .'</a></p>'. 
					   '<p><a href="'.$link.'" title="Se indlæg for blogger" class="block">'. $user->description .'</a></p>' ;
	
	if ($i === 0) {
				$s  = $span($avatar, 4);
				$s .= $span($descripeAuther , 4);
				$i++;
	} else {
				$s  = $span($descripeAuther , 4);
				$s .= $span($avatar, 4);
				$i = $i - 1;
	}
	echo $divider($row($s));
	}; // loop	
	
	
	foreach ($blogusers as $user) {
	$link = get_author_posts_url( $user->ID);		
	$avatar = get_avatar($user->user_email, 280, '', $user->first_name);
	$avatar = '<a href="'.$link.'" title="Se indlæg for blogger" class="block">' . $avatar . '</a>';
	
	$descripeAuther = 
					   '<h1><a href="'.$link.'" title="Se indlæg for blogger" class="block">' . $user->first_name . '</a></h1>'.
					   '<p><a href="'.$link.'" title="Se indlæg for blogger" class="block">'. $user->title . ($user->category? " | ". $user->category : "")  .'</a></p>'.  
					   '<p><a href="'.$link.'" title="Se indlæg for blogger" class="block">'. $user->description .'</a></p>' ;
	
	if ($i === 0) {
				$s  = $span($avatar, 4);
				$s .= $span($descripeAuther , 4);
				$i++;
	} else {
				$s  = $span($descripeAuther , 4);
				$s .= $span($avatar, 4);
				$i = $i - 1;
	}
	echo $divider($row($s));
	}; // loop
	

	
	?>
	</div>
</section>
<?php require 'res/inc/sidebar.inc.php'; ?>
<?php require 'res/inc/footer.inc.php'; ?>
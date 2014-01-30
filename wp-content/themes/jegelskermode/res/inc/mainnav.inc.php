<nav class="navigation">
	<h1 class="screen-reader-text">Navigation</h1>
	<a class="menuButtonCollapse" data-toggle="collapse" data-target=".navbar-responsive-collapse">
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	</a>

	<?php
	// Controlled menu	
	wp_nav_menu(
		   array(
			  'theme_location' => 'main-menu',
			  'container' => false,
			  'echo' => true,
			  'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
			  'depth' => 2,
			  'walker' => new Bootstrap_Walker_Nav_Menu()
		   )
	);
	?>	
</nav>
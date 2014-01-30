<?php

// Change Wordpress build in canonical option when posts is from indexed rss

// Remove the action
remove_action('wp_head', 'rel_canonical');

// Add new action
add_action('wp_head', 'my_rel_canonical');

function my_rel_canonical() {
	
	// Statements to scope action
	if (is_post_type('ekstern') && get_syndication_permalink() && is_single()){
		
		// Get the source permalink
		$link = get_syndication_permalink();
		
		// Output it...
		echo "<link rel=\"canonical\" href=\"$link\" />\n";
	}
	
	else {
		// Do like normal
		rel_canonical();
	}
}
<?php
/*
 *  Add extra fields to wordpress user profile
*/

class Extrafield {
	
	public function __construct() {
		add_action( 'show_user_profile',  array($this, 'add_custom_user_profile_field') );
		add_action( 'edit_user_profile', array($this, 'add_custom_user_profile_field') );
		add_action( 'personal_options_update', array($this, 'save_custom_user_profile_field') );
		add_action( 'edit_user_profile_update', array($this, 'save_custom_user_profile_field') );
	}

	public function add_custom_user_profile_field ($user) {
		
		$s =	'<h3>Ekstra information</h3>' .
			'<table class="form-table">' .
			'<tr>' .
			'<th><label for="title">Titel</label></th>' .
			'<td>' .
			'<input type="text" name="title" id="title" value="' . esc_attr( get_the_author_meta( 'title', $user->ID ) ) . '" class="regular-text" /><br />' .   
			'<span class="description">Indtast din Titel</span>'	.	
			'</td>' .
			'</tr>' .
			'</table>' .
		

			'<table class="form-table">' .
			'<tr>' .
			'<th><label for="category">Kategori</label></th>' .
			'<td>' .
			'<input type="text" name="category" id="category" value="' . esc_attr( get_the_author_meta( 'category', $user->ID ) ) . '" class="regular-text" /><br />' .   
			'<span class="description">Indtast den kategori du skriver indenfor</span>'.	
			'</td>' .
			'</tr>' .
			'</table>' ;		

		echo $s;
	}
	
	public function save_custom_user_profile_field( $user_id ) {
		if ( !current_user_can( 'edit_user', $user_id ) )
			return FALSE;
		update_usermeta( $user_id, 'title', $_POST['title'] );
		update_usermeta( $user_id, 'category', $_POST['category'] );
	}	
	
}

$Extrafield = new Extrafield(); 
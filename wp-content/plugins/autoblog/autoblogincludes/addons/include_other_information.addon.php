<?php
/*
Addon Name: More information about each feed
Description: Adds some more information for each field.
Author: Thomas Faurbye Nielsen
Author URI: http://dreamabout.dk
*/

function A_include_other_information_showTableInput($inputName, $inputField, $table) {
    echo "<tr>";
    echo "<td valign='top' class='heading'>";
    echo __($inputName,'autoblogtext');
    echo "</td>";
    echo "<td valign='top' class=''>";

    if (isset($table['bloginfo']) && isset($table['bloginfo'][$inputField])) {
        echo "<input name='abtble[bloginfo][{$inputField}]' class='field' value='{$table['bloginfo'][$inputField]}'>";
    } else  {
        echo "<input name='abtble[bloginfo][{$inputField}]' class='field' value=''>";
    }
    echo "</td>";
    echo "</tr>\n";
}

function A_include_other_information( $key, $details ) {

    $table = maybe_unserialize($details->feed_meta);

    A_include_other_information_showTableInput("Blog navn", 'name', $table);
    A_include_other_information_showTableInput("Blog email", 'email', $table);
    A_include_other_information_showTableInput("Blog link", 'link', $table);

}

add_action( 'autoblog_feed_edit_form_author_details_end', 'A_include_other_information', 10, 2 );

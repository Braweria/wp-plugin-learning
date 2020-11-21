<?php

/**
 * Trigger this file on Plugin uninstall
 * 
 * @package 
 * 
 */

 if ( !defined( "WP_UNINSTALL_PLUGIN" ) ) {
   die;
 }

 /**
  * Clear Database stored data
  */

$books = get_posts( array( "post_type" => "book", "numbersposts" => -1 ) ); // ["numbersposts" => -1] means ALL of the post type

foreach( $books  as $book ) {
  wp_delete_post( $book->ID, true );
}

// Access the database via SQL
// SQL can be dangerous, only use when you know what you are doing!
// global $wpdb;
// $wpdb->query( "DELETE FROM wp_posts WHERE post_type = 'book'" );
// $wpdb->query( "DELETE FROM wp_postmeta WHERE post_id NOT IN ( SELECT id FROM wp_posts )" );
// $wpdb->query( "DELETE FROM wp_term_relationships WHERE object_id NOT IN ( SELECT id FROM wp_posts )" );
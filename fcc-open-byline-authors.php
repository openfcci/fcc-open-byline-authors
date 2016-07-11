<?php
/*
Plugin name: FCC Open Byline Authors
Plugin URI: http://www.forumcomm.com
Description: This plugin adds options to assign alternate post authors as bylines without creating WordPress user accounts. The selected author name and link will be shown on posts in place of the original post author. If no "Open Byline Author" is assigned to a post, the original post author will be used.
Author: FCC Interactive
Author URI: http://www.forumcomm.com
Version: 1.2.1
*/


/*************************** Plugin Registration  *****************************
*******************************************************************************
* Plugin loading, registration and admin dashboard menu functions.
*/

// Plugin Activation/Deactivation Functions
function fcc_open_byline_flush_rewrites() {
  // Updates WP rewrite settings so author link templates are called correctly
	flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'fcc_open_byline_flush_rewrites' );
register_deactivation_hook( __FILE__, 'fcc_open_byline_flush_rewrites' );

// Call fcc_open_byline_menu function to load plugin menu in dashboard
add_action( 'admin_menu', 'fcc_open_byline_menu' );

// Create WordPress admin menu
function fcc_open_byline_menu(){

  $page_title = 'Open Byline';
  $menu_title = 'Open Byline';
  $capability = 'publish_posts';
  $menu_slug  = 'fcc-open-byline-admin';
  $function   = 'fcc_open_byline_page';
  $icon_url   = 'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz48c3ZnIHZlcnNpb249IjEuMiIgYmFzZVByb2ZpbGU9InRpbnkiIGlkPSJMYXllcl8xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjUxMnB4IiBoZWlnaHQ9IjUxMnB4IiB2aWV3Qm94PSIwIDAgNTEyIDUxMiIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+PHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBmaWxsPSIjOTk5OTk5IiBkPSJNNy44NzcsNTcuODIxYzE2NS43MSwwLDMzMS40MTIsMCw0OTcuMTIzLDBjMCwxMzEuNzgsMCwyNjMuNTY1LDAsMzk1LjM0M2MtNzUuNjU4LDAtMTUyLjYyMywwLTIzMS4zMTgsMGMtMTEuMTk0LDAtMjUuNzUzLDIuMjgzLTMyLjgwNCwwYy0zLjMwNy0xLjA3Mi05LjE3LTkuODItMTIuNjE3LTE1LjE0MmMtMjQuNjU4LTM4LjA3Ny00MS45NDgtOTIuOTUzLTM2LjE2OS0xNTIuMjQ5YzI5Ljc2Ni0yLjY0MSw0Ny41MTQsMTEuMTA3LDU0LjY3NCwyOC42YzQuNjQ2LDExLjM0OSwxLjI2NSwzMS41NzEsMTUuOTgyLDI5LjQzOWM5Ljg1My0xLjQyNiw4LjU2My0xOC4wMzYsNy41NzEtMzEuOTYzYy0yLjAyMy0yOC4zODMtNC4wMi00Ni42MDMtMi41MjUtNzguMjI3YzAuNjc1LTE0LjI1NCwxLjM1My0zMS40NjctMTAuMDkzLTMxLjEyM2MtMTAuMjE4LDAuMzA3LTEyLjg4NSwyMC42NDQtMTcuNjY1LDI4LjZjLTkuNzI4LDE2LjE4OC0xOC4yNDYsMjAuOTAyLTQxLjIxNywyMy41NTJjMTYuMzQ1LTQ2Ljc0Miw0NS40MTQtODAuNzYsOTQuMjA5LTk1LjA1MWMwLjQxNCw5LjM0NywwLjM2MiwxNy40OTgsNi43MjksMTkuMzQ2YzEyLjYzNiwzLjY2OSwxNS43MTMtOS45NTMsMTQuMzAxLTI0LjM5M2M1Mi4zNjUtMi44NSw4My4zOTcsMTQuNjEyLDExNC4zOTYsMzcuODUyYzEzLjExNSw5LjgzMiwyNS43MjQsMjQuNDI0LDM2LjE2OSw0MC4zNzVjNC4wMTMsNi4xMjYsMTAuMDc1LDE1LjM1MiwxMy40NTksMjUuMjM0YzMuMjc4LDkuNTc5LDIuMzM0LDI1LjM4MiwxMi42MTcsMjUuMjM0YzEwLjYyMi0wLjE1Myw4LjAyMi0xOS4zODgsNi43MjktMzEuMTIyYy0yLjkyNy0yNi41NTktNy43NjMtNDUuNTYtMTAuOTM2LTcxLjQ5OWMtMS40MjItMTEuNjQxLDAuNzMyLTMxLjI4OC03LjU2OS0zMy42NDZjLTEwLjQ2Mi0yLjk3MS04LjIxOCwxMi42ODktMTkuMzQ3LDE0LjNjLTcuMTAxLDEuMDI4LTE4LjY4Mi02LjkyNC0yNy43NTgtMTAuOTM1Yy0zMS44OTctMTQuMDk3LTc2Ljc0Ny0yNS4xNTUtMTE5LjQ0NC0xOC41MDVjLTEuODE3LTE1LjAwNi0wLjI5OC0zMy4zNS0zLjM2NS00Ny4xMDRjLTExLjIxLTQuMzc0LTI0LjEzNC0yLjUyNC0zNi4xNjktMi41MjRjLTg2LjU4NSwwLTE3OC4zMzgsMC0yNjUuODA1LDBjMC03LjI5LDAtMTQuNTgsMC0yMS44N0M2Ljk2NCw1OS4xNSw2Ljg5OCw1Ny45NjIsNy44NzcsNTcuODIxeiBNNy4wMzcsMTA0LjkyNmMwLDExNi4wOCwwLDIzMi4xNTcsMCwzNDguMjM4YzguNjkxLDAsMTcuMzg0LDAsMjYuMDc1LDBjMTAuMi00NC4yMDMsNy41NzEtMTAzLjgyOSw3LjU3MS0xNjUuNzA5YzAtMjcuMjkzLDEuNjgyLTU0LjY5NiwxLjY4Mi04NC45NTZjMC0yOC40NDcsMi44MjQtNjIuNDE3LTYuNzI4LTgwLjc1MWMtNC42NDYtOC45MTUtMTYuNDY2LTE3LjE1LTI3Ljc1OS0xOS4zNDdDNi44OTgsMTAyLjU0Myw2Ljk2NCwxMDMuNzMyLDcuMDM3LDEwNC45MjZ6IE0yMTEuNDM3LDEwNy40NDljLTIzLjU3NC0xLjUxOC00OS4wMjYtMy4wNjctNzAuNjU2LTEuNjgyYy02LjU0NSwwLjQxOS0xOC45ODgsMS42OTQtMjUuMjM1LDUuODg5Yy0xNC41MjQsOS43NS0xMS43NzYsNDQuOTMzLTExLjc3Niw2OS44MTVjMCwxNC41MjEtNC4wODEsNTguMTA0LDIuNTIzLDY4LjEzNGM2Ljk2OSwxMC41ODEsMjcuMjc0LDYuNjczLDQ1LjQyMiw3LjU2OWMyNi40NDktNTcuOTQ3LDcwLjYyMi05OC4xNjksMTMzLjc0NS0xMTkuNDQzQzI3Mi43MTcsMTE1LjA2NiwyNDUuMzM4LDEwOS42MzIsMjExLjQzNywxMDcuNDQ5eiBNMTA2LjI5MiwyODkuMTM5Yy03LjEwNCw5Ljc3OS0xLjY4MiwzNi43MDItMS42ODIsNTAuNDY5YzAsMzguNDIxLTUuNjU1LDk3LjQ0MywxNC4yOTksMTEzLjU1N2MxMi4wNTktMC41NiwyNi4zNTMsMS4xMTgsMzcuMDEtMC44NDJjLTIxLjMyMy00Mi4wNjQtMzEuNDI4LTExNS4wNjMtMTQuMjk5LTE2OS4wNzJDMTI5Ljc4NiwyODMuNjU1LDExMS45ODEsMjgxLjMwNywxMDYuMjkyLDI4OS4xMzl6Ii8+PC9zdmc+';

  add_menu_page( $page_title,
                 $menu_title,
                 $capability,
                 $menu_slug,
                 $function,
                 $icon_url,
                 $position );

  // Call update_fcc_open_byline function to update database
  add_action( 'admin_init', 'update_fcc_open_byline' );

}

// Create function to register plugin settings in the database
function update_fcc_open_byline() {
  register_setting( 'fcc-open-byline-admin-settings', 'fcc_open_byline' );
}

// Dashboard Plugin Page Content/Function
function fcc_open_byline_page(){
?>
  <h1>FCC Open Byline Authors Settings and Instructions</h1>
  <hr>
  <h2>All Registered "Open Byline Authors" Currently In Use:</h2>
  <div>
    <?php
    $args = array( 'hide_empty=0' );

    $terms = get_terms( 'open_byline_author', $args );
    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
        $count = count( $terms );
        $i = 0;
        $term_list = '<p class="open_byline_author">';
        foreach ( $terms as $term ) {
            $i++;
        	$term_list .= '<a href="' . get_term_link( $term ) . '" title="' . sprintf( __( 'View all post filed under %s', 'my_localization_domain' ), $term->name ) . '">' . $term->name . '</a>';
        	if ( $count != $i ) {
                $term_list .= ' &middot; ';
            }
            else {
                $term_list .= '</p>';
            }
        }
        echo $term_list;
    }
    ?>
  </div>
  <hr>
  <div class="card pressthis">
    <h3>About<h3>
    <p>This plugin adds options to assign alternate post authors as bylines without creating WordPress user accounts. The selected author name and link will be shown on posts in place of the original post author. If no "Open Byline Author" is assigned to a post, the original post author will be use.</p>
  </div>
  <div class="card pressthis">
    <h3>Features Overview<h3>
    <p>
    Use the sidebar widget to:<br>
    - Select author from the sidebar widget when writing or editing a post.<br>
    - Add a new author without leaving the page.<br>
    - Use the "Most Used" tab to quickly find frequently used authors.
    </p>
    <img src="<?php echo plugins_url( '/images/fcc-oba-edit-post.png', __FILE__ ); ?>" width="520">
    <hr>
      <p>
        - Add or edit new authors, or enter additional (optional) author information including author descriptions in the admin page under "Posts".<br>
        - See the number of articles associated with each author in the "Count" column.
      </p>
    <img src="<?php echo plugins_url( '/images/fcc-oba-authors.png', __FILE__ ); ?>" width="520">
    <hr>
      <p>Easily check post/author association on the "All Posts" page.</p>
    <img src="<?php echo plugins_url( '/images/fcc-oba-posts.png', __FILE__ ); ?>" width="520">
    </div>
<?php
}

/**
 *
 * Plugin "Functions" Code Begins Here
 *
 */

/*************************** REGISTER THE TAXONOMY *****************************
 *******************************************************************************
 * This registers a new "Open Byline Authors" taxonomy. Place in plugin or
 * template functions.php.
 */

add_action( 'init', 'register_oba_tax' );
function register_oba_tax() {

	$labels = array(
		"name" => "Open Byline Authors",
		"label" => "Open Byline Authors",
		"menu_name" => "Open Byline Authors",
		"all_items" => "All Open Byline Authors",
		"edit_item" => "Edit Open Byline Author",
		"view_item" => "View Open Byline Author",
		"update_item" => "Update Open Byline Author",
		"add_new_item" => "Add New Open Byline Author",
		"new_item_name" => "New Open Byline Author Name",
		"parent_item" => "Parent of Open Byline Author",
		"parent_item_colon" => "Parent Open Byline Author:",
		"search_items" => "Search Open Byline Author:",
		"popular_items" => "Popular Open Byline Authors",
		"separate_items_with_commas" => "Separate open byline authors with commas",
		"add_or_remove_items" => "Add or remove open byline author",
		"choose_from_most_used" => "Choose from the most used open byline authors",
		"not_found" => "No open byline authors found",
		);

	$args = array(
		"labels" => $labels,
		"hierarchical" => true,
		"label" => "Open Byline Authors",
		"has_archive" => true,
    "show_ui" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'open_byline_author', 'with_front' => true ),
		"show_admin_column" => true,
	);
	register_taxonomy( "open_byline_author", array( "post" ), $args );

} // End of Taxonomy Registration


/*************************** FILTER FUNCTIONS **********************************
 *******************************************************************************
 * Filter functions begin here.
 */

// Action to call the add_filter(s) function
add_action('wp_loaded', 'byline_function');
function byline_function() {
  if ( ! is_admin() ) {
    add_filter( 'the_author', 'modify_author_name' );
    add_filter( 'author_link', 'modify_author_link', 10, 1 );
  }
}


/**
 * Filter Author Name
 *
 * @author Ryan Veitch <ryan.veitch@forumcomm.com>
 * @since 1.15.07.16
 */
function modify_author_name( $name ) {
  global $post;
  $author_name = get_the_author_meta('display_name');
  $author_ID = get_query_var('author');
  $author_url = get_author_posts_url( get_the_author_meta( $author_ID ) );
  $real_author = get_the_author_meta('display_name');
  $byline_terms = get_the_terms( $post->ID, 'open_byline_author' );
  if( !is_wp_error( $byline_terms ) && ( !empty( $byline_terms ) ) ) {
    $byline_term = array_pop($byline_terms);
    $byline_author = $byline_term->name;
    $name = $byline_author;
    return $name;
  }
  else {
    $name = $real_author;
    return $name;
  }
}

 /**
  * Filter Author Display Name
  *
  * @author Ryan Veitch <ryan.veitch@forumcomm.com>
  * @since 1.16.03.14
  */
function get_the_author_meta_filter( $field = '', $user_id = false ) {
	global $post;
	global $authordata;
	$byline_terms = get_the_terms( $post->ID, 'open_byline_author' );
	if( !is_wp_error( $byline_terms ) && ( !empty( $byline_terms ) ) ) {
		$byline_term = array_pop($byline_terms);
		$display_name = $byline_term->name;
		return $display_name;
	}
	else {
		$display_name = $authordata->data->display_name;
		return $display_name;
	}
}
add_filter( 'get_the_author_display_name', 'get_the_author_meta_filter' );

/**
 * Filter Author Link
 *
 * @author Ryan Veitch <ryan.veitch@forumcomm.com>
 * @since 1.15.07.16
 */
function modify_author_link( $link ) {
  global $post;
  $byline_terms = get_the_terms( $post->ID, 'open_byline_author' );
  if( !is_wp_error( $byline_terms ) && ( !empty( $byline_terms ) ) ) {
    $byline_term = array_pop($byline_terms);
    $byline_author_link = '<a href="'.get_term_link($byline_term->slug, 'open_byline_author').'">'.$byline_term->name.'</a>';
    $link = get_term_link($byline_term->slug, 'open_byline_author');
    return $link;
  }
  else {
    $link = $link;
    return $link;
  }
}

 /**
  * Filter Author Bio (Description)
  *
  * @author Ryan Veitch <ryan.veitch@forumcomm.com>
  * @since 1.16.03.14
  */
function get_the_author_description_filter( $description ) {
		global $post;
	  $byline_terms = get_the_terms( $post->ID, 'open_byline_author' );
	  if( !is_wp_error( $byline_terms ) && ( !empty( $byline_terms ) ) ) {
	    $byline_term = array_pop($byline_terms);
	    $description = $byline_term->description;
	    return $description;
	  }
	  else {
	    $description = $description;
	    return $description;
	  }
}
add_filter( 'get_the_author_description', 'get_the_author_description_filter' );

 /**
	* Filter Author Avatar
	*
	* Reference Args: get_avatar( $avatar = '', $id_or_email, $size = 96, $default = '', $alt = '' )
	* @author Ryan Veitch <ryan.veitch@forumcomm.com>
	* @since 1.16.03.14
	* @todo Enhance sizing functions/arguments
	*/
function get_the_author_avatar_filter( $avatar, $size = 90) {
		global $post;
	  $byline_terms = get_the_terms( $post->ID, 'open_byline_author' );
	  if( !is_wp_error( $byline_terms ) && ( !empty( $byline_terms ) ) ) {
	    $byline_term = array_pop($byline_terms);
			$image = get_term_meta( $byline_term->term_id, 'image', true );
			if ( ! empty( $image ) ) {
				$avatar = wp_get_attachment_image( $image, array(90,90));
			} else {
				if ( empty( $size ) ) { $size = '90'; } else { $size = $size; }
				$host = is_ssl() ? 'https://secure.gravatar.com' : 'http://0.gravatar.com';
				$default = "$host/avatar/ad516503a11cd5ca435acc9bb6523536?s={$size}";
				$avatar = "<img src='" . $default . "' class='avatar avatar-{$size} photo avatar-default' height='{$size}' width='{$size}' />";
			}
	    return $avatar;
	  }
	  else {
	    $avatar = $avatar;
	    return $avatar;
	  }
}
add_filter( 'get_avatar', 'get_the_author_avatar_filter' );

// End Plugin Code //
?>

<?php
/* Adds custom fields to add open byline author */
add_action( 'open_byline_author_add_form_fields', 'add_custom_fields', 10, 2 );
function add_custom_fields($taxonomy) {
    ?>
    <!-- Adds User ID Field -->
    <div class="form-field term-group">
      <label for="user_id">User ID</label>
      <input id="user_id" name="user_id" type="text" size="40"> </input>
    </div>
    <!-- Adds Old ID Field -->
    <div class="form-field term-group">
      <label for="old_id">Old ID</label>
      <input id="old_id" name="old_id" type="text" size="40"> </input>
    </div>
    <!-- Adds Email Field -->
    <div class="form-field term-group">
      <label for="author_email">Email</label>
      <input id="author_email" name="author_email" type="text" size="40"> </input>
    </div>
    <!-- Adds First Name Field -->
    <div class="form-field term-group">
      <label for="author_first_name">First Name</label>
      <input id="author_first_name" name="author_first_name" type="text" size="40"> </input>
    </div>
    <!-- Adds Last Name Field -->
    <div class="form-field term-group">
      <label for="author_last_name">Last Name</label>
      <input id="author_last_name" name="author_last_name" type="text" size="40"> </input>
    </div>
    <!-- Adds Website Field -->
    <div class="form-field term-group">
      <label for="user_url">Website</label>
      <input id="user_url" name="user_url" type="text" size="40"> </input>
    </div>
    <!-- Adds Role Field -->
    <div class="form-field term-group">
      <label for="old_role">Role</label>
      <input id="old_role" name="old_role" type="text" size="40"> </input>
    </div>
    <?php
}
function save_add_fields_meta( $term_id, $tt_id ){

    /* Adds Facebook meta */
    add_term_meta( $term_id, 'facebook', '', true );

    /* Adds twitter meta */
    add_term_meta( $term_id, 'twitter', '', true );

    /* Adds pinterest meta */
    add_term_meta( $term_id, 'pinterest', '', true );

    /* Adds googleplus meta */
    add_term_meta( $term_id, 'googleplus', '', true );

    /* Adds instagram meta */
    add_term_meta( $term_id, 'instagram', '', true );

    /* Adds linkedin meta */
    add_term_meta( $term_id, 'linkedin', '', true );

    /* Adds Image Url meta */
    add_term_meta( $term_id, 'image_url', '', true );

    if( isset( $_POST['user_id'] ) && '' !== $_POST['user_id'] ){
        /* Save User ID */
        $term_meta = sanitize_text_field( $_POST['user_id'] );
        add_term_meta( $term_id, 'user_id', $term_meta, true );
    }else{
        add_term_meta( $term_id, 'user_id', '', true );
    }
    if( isset( $_POST['old_id'] ) && '' !== $_POST['old_id'] ){
        /* Save Old User ID */
        $term_meta = sanitize_text_field( $_POST['old_id'] );
        add_term_meta( $term_id, 'old_id', $term_meta, true );
    }else{
        add_term_meta( $term_id, 'old_id', '', true );
    }
    if( isset( $_POST['nickname'] ) && '' !== $_POST['nickname'] ){
        /* Save Nickname */
        $term_meta = sanitize_text_field( $_POST['nickname'] );
        add_term_meta( $term_id, 'nickname', $term_meta, true );
    }else{
        add_term_meta( $term_id, 'nickname', '', true );
    }
    if( isset( $_POST['author_email'] ) && '' !== $_POST['author_email'] ){
        /* Save Email */
        $term_meta = sanitize_email( $_POST['author_email'] );
        add_term_meta( $term_id, 'author_email', $term_meta, true );
    }else{
        add_term_meta( $term_id, 'author_email', '', true );
    }
    if( isset( $_POST['author_first_name'] ) && '' !== $_POST['author_first_name'] ){
        /* Save First Name */
        $term_meta = sanitize_text_field( $_POST['author_first_name'] );
        add_term_meta( $term_id, 'author_first_name', $term_meta, true );
    }else{
        add_term_meta( $term_id, 'author_first_name', $term_meta, true );
    }
    if( isset( $_POST['author_last_name'] ) && '' !== $_POST['author_last_name'] ){
        /* Save Last Name */
        $term_meta = sanitize_text_field( $_POST['author_last_name'] );
        add_term_meta( $term_id, 'author_last_name', $term_meta, true );
    }else{
        add_term_meta( $term_id, 'author_last_name', '', true );
    }
    if( isset( $_POST['user_url'] ) && '' !== $_POST['user_url'] ){
        /* Save Website */
        $term_meta = esc_url( $_POST['user_url'] );
        add_term_meta( $term_id, 'user_url', $term_meta, true );
    }else{
        add_term_meta( $term_id, 'user_url', '', true );
    }
    if( isset( $_POST['old_role'] ) && '' !== $_POST['old_role'] ){
        /* Save Role */
        $term_meta = sanitize_text_field( $_POST['old_role'] );
        add_term_meta( $term_id, 'old_role', $term_meta, true );
    }else{
        add_term_meta( $term_id, 'old_role', '', true );
    }
}

/* Add fields to edit a byline author */
add_action( 'open_byline_author_edit_form_fields', 'edit_text_field', 10, 2 );

function edit_text_field( $term, $taxonomy ){

    $byline_username = get_term_meta( $term->term_id, 'user_name', true );
    $byline_nicename = get_term_meta( $term->term_id, 'nicename', true );
    $byline_user_id = get_term_meta( $term->term_id, 'user_id', true );
    $byline_old_id = get_term_meta( $term->term_id, 'old_id', true );
    $byline_nickname = get_term_meta( $term->term_id, 'nickname', true );
    $byline_display_name = get_term_meta( $term->term_id, 'name', true );
    $byline_email = get_term_meta( $term->term_id, 'author_email', true );
    $byline_first_name = get_term_meta( $term->term_id, 'author_first_name', true );
    $byline_last_name = get_term_meta( $term->term_id, 'author_last_name', true );
    $byline_website = get_term_meta( $term->term_id, 'user_url', true );
    $byline_role = get_term_meta( $term->term_id, 'old_role', true );
    $byline_facebook = get_term_meta($term->term_id, 'facebook', true);
    $byline_twitter = get_term_meta($term->term_id, 'twitter', true);
    $byline_pinterest = get_term_meta($term->term_id, 'pinterest', true);
    $byline_googleplus = get_term_meta($term->term_id, 'googleplus', true);
    $byline_instagram = get_term_meta($term->term_id, 'instagram', true);
    $byline_linkedin = get_term_meta($term->term_id, 'linkedin', true);
    $byline_image_url = get_term_meta($term->term_id, 'image_url', true);
    ?>
    <!-- Username Field -->
    <tr class="form-field term-group-wrap">
        <th scope="row"><label for="user_name"><h2>Name</h2>Username</label></th>
        <td>
          <h2>&nbsp;</h2>
          <input id="user_name" name="user_name" type="text" size="40" value="" placeholder="<?php echo $term->slug; ?>" readonly="readonly"> </input>
        </td>
    </tr>
    <!-- First Name Field -->
    <tr class="form-field term-group-wrap">
        <th scope="row"><label for="author_first_name">First Name</label></th>
        <td>
          <input id="author_first_name" name="author_first_name" type="text" size="40" value="<?php echo $byline_first_name; ?>"> </input>
        </td>
    </tr>
    <!-- Last Name Field -->
    <tr class="form-field term-group-wrap">
        <th scope="row"><label for="author_last_name">Last Name</label></th>
        <td>
          <input id="author_last_name" name="author_last_name" type="text" size="40" value="<?php echo $byline_last_name; ?>"> </input>
        </td>
    </tr>
    <!-- Nickname Field -->
    <tr class="form-field term-group-wrap">
        <th scope="row"><label for="nickname">Nickname</label></th>
        <td>
          <input id="nickname" name="nickname" type="text" size="40" value="" placeholder="<?php echo $term->name; ?>" readonly="readonly">
        </td>
    </tr>
    <!-- Display Name Field -->
    <tr class="form-field term-group-wrap">
        <th scope="row"><label for="displayname">Display Name</label></th>
        <td>
          <input id="displayname" name="displayname" type="text" size="40" value="" placeholder="<?php echo $term->name; ?>" readonly="readonly"> </input>
        </td>
    </tr>
    <!-- User ID Field -->
    <tr class="form-field term-group-wrap">
        <th scope="row"><label for="user_id">User ID</label></th>
        <td>
          <input id="user_id" name="user_id" type="text" size="40" value="<?php echo $byline_user_id; ?>"> </input>
          <p class="<?php echo $byline_user_id; ?>">
            <p class="description">The User ID of the corresponding real author on the current network (if one exists).</p>
        </td>
    </tr>
    <!-- Email Field -->
    <tr class="form-field term-group-wrap">
        <th scope="row"><label for="author_email"><h2>Contact Info</h2>Email</label></th>
        <td>
          <h2>&nbsp;</h2>
          <input id="author_email" name="author_email" type="text" size="40" value="<?php echo $byline_email; ?>"> </input>
        </td>
    </tr>
    <!-- Website Field -->
    <tr class="form-field term-group-wrap">
        <th scope="row"><label for="user_url">Website</label></th>
        <td>
          <input id="user_url" name="user_url" type="text" size="40" value="<?php echo $byline_website; ?>"> </input>
        </td>
    </tr>
    <!-- Facebook Field -->
    <tr class="form-field term-group-wrap">
        <th scope="row"><label for="facebook">Facebook</label></th>
        <td>
          <input id="facebook" name="facebook" type="text" size="40" value="<?php echo $byline_facebook; ?>"> </input>
        </td>
    </tr>
    <!-- Twitter Field -->
    <tr class="form-field term-group-wrap">
        <th scope="row"><label for="twitter">Twitter</label></th>
        <td>
          <input id="twitter" name="twitter" type="text" size="40" value="<?php echo $byline_twitter; ?>"> </input>
        </td>
    </tr>
    <!-- Pinterest Field -->
    <tr class="form-field term-group-wrap">
        <th scope="row"><label for="pinterest">Pinterest</label></th>
        <td>
          <input id="pinterest" name="pinterest" type="text" size="40" value="<?php echo $byline_pinterest; ?>"> </input>
        </td>
    </tr>
    <!-- Google Plus Field -->
    <tr class="form-field term-group-wrap">
        <th scope="row"><label for="googleplus">Google Plus</label></th>
        <td>
          <input id="googleplus" name="googleplus" type="text" size="40" value="<?php echo $byline_googleplus; ?>"> </input>
        </td>
    </tr>
    <!-- Instagram Field -->
    <tr class="form-field term-group-wrap">
        <th scope="row"><label for="instagram">Instagram</label></th>
        <td>
          <input id="instagram" name="instagram" type="text" size="40" value="<?php echo $byline_instagram; ?>"> </input>
        </td>
    </tr>
    <!-- Linkedin Field -->
    <tr class="form-field term-group-wrap">
        <th scope="row"><label for="linkedin">Linkedin</label></th>
        <td>
          <input id="linkedin" name="linkedin" type="text" size="40" value="<?php echo $byline_linkedin; ?>"> </input>
        </td>
    </tr>
    <!-- User Nicename Field -->
    <tr class="form-field term-group-wrap">
        <th scope="row">
          <label for="nicename">
          <h2>Misc.</h2>
          User Nicename</label>
        </th>
        <td>
          <h2>&nbsp;</h2>
          <input id="nicename" name="nicename" type="text" size="40" value="" placeholder="<?php echo $term->slug; ?>" readonly="readonly"> </input>
        </td>
    </tr>
    <!-- Role Field -->
    <tr class="form-field term-group-wrap">
        <th scope="row"><label for="old_role">Role</label></th>
        <td>
          <input id="old_role" name="old_role" type="text" size="40" value="<?php echo $byline_role; ?>" readonly="readonly"> </input>
          <p class="description">From import. (read-only)</p>
        </td>
    </tr>
    <!-- Old ID Field -->
    <tr class="form-field term-group-wrap">
        <th scope="row"><label for="old_id">User Old ID</label></th>
        <td>
          <input id="old_id" name="old_id" type="text" size="40" value="<?php echo $byline_old_id; ?>" readonly="readonly"> </input>
          <p class="description">From import. (read-only)</p>
        </td>
    </tr>
    <?php
}

/* Update Fields when editing */
add_action( 'edited_open_byline_author', 'update_byline_meta', 10, 2 );

function update_byline_meta( $term_id, $tt_id ){
  if ( isset( $_POST['series_image'] ) ) {
		$t_id = $term_id;
		$term_meta = get_option( "weekend-series_$t_id" );
		$cat_keys = array_keys( $_POST['series_image'] );
		foreach ( $cat_keys as $key ) {
			if ( isset ( $_POST['series_image'][$key] ) ) {
				$term_meta[$key] = $_POST['series_image'][$key];
			}
		}
		// Save the option array.
		update_option( "weekend-series_$t_id", $term_meta );
	}
    /* Update Email */
    if( isset( $_POST['author_email'] ) && '' !== $_POST['author_email'] ){
        $term_meta = sanitize_email( $_POST['author_email'] );
        update_term_meta( $term_id, 'author_email', $term_meta );
    }
    /* Update First Name */
    if( isset( $_POST['author_first_name'] ) && '' !== $_POST['author_first_name'] ){
        $term_meta = sanitize_text_field( $_POST['author_first_name'] );
        update_term_meta( $term_id, 'author_first_name', $term_meta );
    }
    /* Update Last Name */
    if( isset( $_POST['author_last_name'] ) && '' !== $_POST['author_last_name'] ){
        $term_meta = sanitize_text_field( $_POST['author_last_name'] );
        update_term_meta( $term_id, 'author_last_name', $term_meta );
    }
    /* Update Website */
    if( isset( $_POST['user_url'] ) && '' !== $_POST['user_url'] ){
        $term_meta = esc_url( $_POST['user_url'] );
        update_term_meta( $term_id, 'user_url', $term_meta );
    }
    /* Update Role */
    if( isset( $_POST['old_role'] ) && '' !== $_POST['old_role'] ){
        $term_meta = sanitize_text_field( $_POST['old_role'] );
        update_term_meta( $term_id, 'old_role', $term_meta );
    }
    /* Update Facebook */
    if( isset( $_POST['facebook'] ) && '' !== $_POST['facebook'] ){
        $term_meta = sanitize_text_field( $_POST['facebook'] );
        update_term_meta( $term_id, 'facebook', $term_meta );
    }
    /* Update twitter */
    if( isset( $_POST['twitter'] ) && '' !== $_POST['twitter'] ){
        $term_meta = sanitize_text_field( $_POST['twitter'] );
        update_term_meta( $term_id, 'twitter', $term_meta );
    }
    /* Update pinterest */
    if( isset( $_POST['pinterest'] ) && '' !== $_POST['pinterest'] ){
        $term_meta = sanitize_text_field( $_POST['pinterest'] );
        update_term_meta( $term_id, 'pinterest', $term_meta );
    }
    /* Update googleplus */
    if( isset( $_POST['googleplus'] ) && '' !== $_POST['googleplus'] ){
        $term_meta = sanitize_text_field( $_POST['googleplus'] );
        update_term_meta( $term_id, 'googleplus', $term_meta );
    }
    /* Update instagram */
    if( isset( $_POST['instagram'] ) && '' !== $_POST['instagram'] ){
        $term_meta = sanitize_text_field( $_POST['instagram'] );
        update_term_meta( $term_id, 'instagram', $term_meta );
    }
    /* Update linkedin */
    if( isset( $_POST['linkedin'] ) && '' !== $_POST['linkedin'] ){
        $term_meta = sanitize_text_field( $_POST['linkedin'] );
        update_term_meta( $term_id, 'linkedin', $term_meta );
    }


}

<?php

/* Adds custom fields to the "Add New" Open Byline Author screen */
add_action( 'open_byline_author_add_form_fields', 'add_custom_fields', 20, 2 );
function add_custom_fields($taxonomy) {
    global $feature_groups;
    ?>
    <!-- Adds Username Field -->
    <div class="form-field term-group">
      <label for="user_name">Username</label>
      <input id="user_name" name="user_name" type="text" size="40"> </input>
      <p class="description">This will be the slug if field is empty.</p>
    </div>
    <!-- Adds User Nicename Field -->
    <div class="form-field term-group">
      <label for="nicename">User Nice Name</label>
      <input id="nicename" name="nicename" type="text" size="40"> </input>
      <p>This will be the slug if field is empty.</p>
    </div>
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
    <!-- Adds Nickname Field -->
    <div class="form-field term-group">
      <label for="nickname">Nickname</label>
      <input id="nickname" name="nickname" type="text" size="40"> </input>
    </div>
    <!-- Adds Display Name Field -->
    <div class="form-field term-group">
      <label for="name">Display Name</label>
      <input id="name" name="name" type="text" size="40"> </input>
    </div>
    <!-- Adds Email Field -->
    <div class="form-field term-group">
      <label for="user_email">Email</label>
      <input id="user_email" name="user_email" type="text" size="40"> </input>
    </div>
    <!-- Adds First Name Field -->
    <div class="form-field term-group">
      <label for="first_name">First Name</label>
      <input id="first_name" name="first_name" type="text" size="40"> </input>
    </div>
    <!-- Adds Last Name Field -->
    <div class="form-field term-group">
      <label for="last_name">Last Name</label>
      <input id="last_name" name="last_name" type="text" size="40"> </input>
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

/* Save fields when adding a Open Byline Author */
add_action( 'created_open_byline_author', 'save_add_fields_meta', 20, 2 );

function save_add_fields_meta( $term_id, $tt_id ){
    if( isset( $_POST['user_name'] ) && '' !== $_POST['user_name'] ){
        /* Save Username */
        $group = sanitize_title( $_POST['user_name'] );
        add_term_meta( $term_id, 'user_name' , $group, true );
    }else{
        /* save slug if there is no username in it */
        $term = get_term($term_id, 'open_byline_author');
        add_term_meta( $term_id, 'user_name' , $term->slug, true );
    }
    if( isset( $_POST['nicename'] ) && '' !== $_POST['nicename'] ){
        /* Save Nice Name */
        $group = sanitize_title( $_POST['nicename'] );
        add_term_meta( $term_id, 'nicename', $group, true );
    }else{
        /* save slug if there is no nicename in it */
        $term = get_term($term_id, 'open_byline_author');
        add_term_meta( $term_id, 'nicename' , $term->slug, true );
    }
    if( isset( $_POST['user_id'] ) && '' !== $_POST['user_id'] ){
        /* Save User ID */
        $group = sanitize_title( $_POST['user_id'] );
        add_term_meta( $term_id, 'user_id', $group, true );
    }
    if( isset( $_POST['old_id'] ) && '' !== $_POST['old_id'] ){
        /* Save Old User ID */
        $group = sanitize_title( $_POST['old_id'] );
        add_term_meta( $term_id, 'old_id', $group, true );
    }
    if( isset( $_POST['nickname'] ) && '' !== $_POST['nickname'] ){
        /* Save Nickname */
        $group = sanitize_title( $_POST['nickname'] );
        add_term_meta( $term_id, 'nickname', $group, true );
    }
    if( isset( $_POST['name'] ) && '' !== $_POST['name'] ){
        /* Save Display Name */
        $group = sanitize_title( $_POST['name'] );
        add_term_meta( $term_id, 'name', $group, true );
    }
    if( isset( $_POST['user_email'] ) && '' !== $_POST['user_email'] ){
        /* Save Email */
        $group = sanitize_email( $_POST['user_email'] );
        add_term_meta( $term_id, 'user_email', $group, true );
    }
    if( isset( $_POST['first_name'] ) && '' !== $_POST['first_name'] ){
        /* Save First Name */
        $group = sanitize_title( $_POST['first_name'] );
        add_term_meta( $term_id, 'first_name', $group, true );
    }
    if( isset( $_POST['last_name'] ) && '' !== $_POST['last_name'] ){
        /* Save Last Name */
        $group = sanitize_title( $_POST['last_name'] );
        add_term_meta( $term_id, 'last_name', $group, true );
    }
    if( isset( $_POST['user_url'] ) && '' !== $_POST['user_url'] ){
        /* Save Website */
        $group = esc_url( $_POST['user_url'] );
        add_term_meta( $term_id, 'user_url', $group, true );
    }
    if( isset( $_POST['old_role'] ) && '' !== $_POST['old_role'] ){
        /* Save Role */
        $group = sanitize_title( $_POST['old_role'] );
        add_term_meta( $term_id, 'old_role', $group, true );
    }
}

/* Add fields to the "Edit" Open Byline Author screen */
add_action( 'open_byline_author_edit_form_fields', 'edit_text_field', 20, 2 );

function edit_text_field( $term, $taxonomy ){

    global $byline_username;
    global $byline_nicename;
    global $byline_user_id;
    global $byline_old_id;
    global $byline_nickname;
    global $byline_display_name;
    global $byline_email;
    global $byline_first_name;
    global $byline_last_name;
    global $byline_website;
    global $byline_role;

    $real_user = get_user_by('login', $term->slug )->ID;
    //ToDO (if $real_user) import fields from real author, else leave blank to populate?

    //$byline_username = get_term_meta( $term->term_id, 'user_name', true );
    $byline_username = $term->slug;
    //$byline_nicename = get_term_meta( $term->term_id, 'nicename', true );
    $byline_nicename = $term->slug;
    //$byline_user_id = get_term_meta( $term->term_id, 'user_id', true );
    $byline_user_id = $real_user;
    $byline_old_id = get_term_meta( $term->term_id, 'old_id', true );
    //$byline_nickname = get_term_meta( $term->term_id, 'nickname', true );
    $byline_nickname = $term->slug;
    //$byline_display_name = get_term_meta( $term->term_id, 'name', true );
    $byline_display_name = $term->name;
    $byline_email = get_term_meta( $term->term_id, 'user_email', true );
    $byline_first_name = get_term_meta( $term->term_id, 'first_name', true );
    $byline_last_name = get_term_meta( $term->term_id, 'last_name', true );
    $byline_website = get_term_meta( $term->term_id, 'user_url', true );
    $byline_role = get_term_meta( $term->term_id, 'old_role', true );

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
        <th scope="row"><label for="first_name">First Name</label></th>
        <td>
          <input id="first_name" name="first_name" type="text" size="40" value="<?php echo $byline_first_name; ?>"> </input>
        </td>
    </tr>
    <!-- Last Name Field -->
    <tr class="form-field term-group-wrap">
        <th scope="row"><label for="last_name">Last Name</label></th>
        <td>
          <input id="last_name" name="last_name" type="text" size="40" value="<?php echo $byline_last_name; ?>"> </input>
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
        <th scope="row"><label for="name">Display Name</label></th>
        <td>
          <input id="name" name="name" type="text" size="40" value="" placeholder="<?php echo $term->name; ?>" readonly="readonly"> </input>
        </td>
    </tr>
    <!-- User ID Field -->
    <tr class="form-field term-group-wrap">
        <th scope="row"><label for="user_id">User ID</label></th>
        <td>
          <input id="user_id" name="user_id" type="text" size="40" value=""> </input>
          <p class="<?php echo $byline_user_id; ?>">
            <p class="description">The User ID of the corresponding real author on the current network (if one exists).</p>
        </td>
    </tr>
    <!-- Email Field -->
    <tr class="form-field term-group-wrap">
        <th scope="row"><label for="user_email"><h2>Contact Info</h2>Email</label></th>
        <td>
          <h2>&nbsp;</h2>
          <input id="user_email" name="user_email" type="text" size="40" value="<?php echo $byline_email; ?>"> </input>
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
add_action( 'edited_open_byline_author', 'update_username_meta', 20, 2 );

function update_username_meta( $term_id, $tt_id ){
    /* Update Username */
    if( isset( $_POST['user_name'] ) && '' !== $_POST['user_name'] ){
        $group = sanitize_title( $_POST['user_name'] );
        update_term_meta( $term_id, 'user_name', $group );
    }
    /* Update Nicename */
    if( isset( $_POST['nicename'] ) && '' !== $_POST['nicename'] ){
        $group = sanitize_title( $_POST['nicename'] );
        update_term_meta( $term_id, 'nicename', $group );
    }
    /* Update User ID */
    if( isset( $_POST['user_id'] ) && '' !== $_POST['user_id'] ){
        $group = sanitize_title( $_POST['user_id'] );
        update_term_meta( $term_id, 'user_id', $group );
    }
    /* Update Old ID */
    if( isset( $_POST['old_id'] ) && '' !== $_POST['old_id'] ){
        $group = sanitize_title( $_POST['old_id'] );
        update_term_meta( $term_id, 'old_id', $group );
    }
    /* Update Nickname */
    if( isset( $_POST['nickname'] ) && '' !== $_POST['nickname'] ){
        $group = sanitize_title( $_POST['nickname'] );
        update_term_meta( $term_id, 'nickname', $group );
    }
    /* Update Display Name */
    if( isset( $_POST['name'] ) && '' !== $_POST['name'] ){
        $group = sanitize_title( $_POST['name'] );
        update_term_meta( $term_id, 'name', $group );
    }
    /* Update Email */
    if( isset( $_POST['user_email'] ) && '' !== $_POST['user_email'] ){
        $group = sanitize_email( $_POST['user_email'] );
        update_term_meta( $term_id, 'user_email', $group );
    }
    /* Update First Name */
    if( isset( $_POST['first_name'] ) && '' !== $_POST['first_name'] ){
        $group = sanitize_title( $_POST['first_name'] );
        update_term_meta( $term_id, 'first_name', $group );
    }
    /* Update Last Name */
    if( isset( $_POST['last_name'] ) && '' !== $_POST['last_name'] ){
        $group = sanitize_title( $_POST['last_name'] );
        update_term_meta( $term_id, 'last_name', $group );
    }
    /* Update Website */
    if( isset( $_POST['user_url'] ) && '' !== $_POST['user_url'] ){
        $group = esc_url( $_POST['user_url'] );
        update_term_meta( $term_id, 'user_url', $group );
    }
    /* Update Role */
    if( isset( $_POST['old_role'] ) && '' !== $_POST['old_role'] ){
        $group = sanitize_title( $_POST['old_role'] );
        update_term_meta( $term_id, 'old_role', $group );
    }
}

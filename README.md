# Open Byline Authors
This plugin adds options to assign alternate post authors as bylines without creating WordPress user accounts. The selected author name and link will be shown on posts in place of the original post author. If no "Open Byline Author" is assigned to a post, the original post author will be used.


## Roadmap

- **ENHANCEMENTS:** [Extending The Term Form - OBA Edit Page Meta](https://www.smashingmagazine.com/2015/12/how-to-use-term-meta-data-in-wordpress/#extending-the-term-form)
  - [ ] Show all meta as editable fields on the OBA edit page
  - [ ] OBA Meta
    - [ ] Username = slug
    - [ ] old_id (for import remappings)
    - [ ] Social links meta`*`
      - [ ] Auto-post to twitter & Facebook with publicise.
    - [ ] OBA avatar image support`*`
      - [ ] Image uploader on OBA edit page
      - [ ] Avatar image links array`*`
- [ ]**FEATURE - FILTER HOOKS:** Filter hooks mapping matching WordPress core real user/author meta fields and value format.
  - [x] Author Name (the_author)
  - [x] Author Display Name (get_the_author_display_name)
  - [x] Author Archive Permalink (author_link)
  - [x] Author Description/Bio (get_the_author_description)
  - [x] Author Avatar/Profile Picture (get_avatar)
  - [ ] Author Email
  - [ ] Author social links
  - [ ] More/Misc (the goal is to mirror most of the *useful* fields in the User Profile)
- [ ] **FEATURE:** OBA Multi-author support
- [ ] **FEATURE:** Import & remap/convert OBA terms from WP Importer WXR export file.
- [ ] **FEATURE:** Generate OBA term from existing real user/author
- [ ] **FEATURE:** Ability to link OBA term to real user/author
  - [ ] Sync meta between OBA and real user/author
    - [ ] Show Link :link: icon if OBA term linked to real user

`*` *Match the WordPress core user meta value format.*

## OBA/User Value Map

Field         | WP Value             | WRX Value             | OBA Meta
------------- | -------------------- | --------------------- | -------------
User ID       | `ID`                 | `author_id`           | `user_id` (match real current user id)
Old ID        | `author_id`          | `author_id`           | `old_id` (ID from import)
Username      | `user_login  `       | `author_login`        | `slug`
User Nicename | `user_nicename`      | —                     | `slug` (same as username)
Nickname*     | `nickname`           | —                     | `nickname` (if null set to slug)
Display Name  | `display_name `      | —                     | `name`s
Email         | `user_email`         | `author_email`        | `author_email`
First Name    | `first_name`         | `author_first_name`   | `author_first_name`
Last Name     | `last_name`          | `author_last_name`    | `author_last_name`
description   | `description`        | —                     | `description`
Website       | `user_url`           | —                     | `user_url`
Role          |                      | —                     | `old_role` :question:
Avatar        |                      | —                     | `simple_local_avatar` :question:

`*` *User meta.*

**Look Into:**
- user_registered
- primary_blog
- source_domain
- Social Links
- Sites / Owner of Sites / Sites owned/contributed to
- number of posts of posts?
- posts attributed to?

**WXR Post Author and "Guest Author" Custom Taxonomy**
```xml
<item>
  <dc:creator><![CDATA[admin]]></dc:creator>
  <category domain="author" nicename="admin"><![CDATA[admin]]></category>
</item>
```
- domain="open_byline_author"
- nicename="oba-slug"


## Reference

#### Get Term Object

The fields returned are:

- `term_id` (int)
- `name`
- `slug`
- `term_group` (int) :question:
- `term_taxonomy_id` (int)
- `taxonomy`
- `description`
- `parent` (int)
- `count` (int)

#### Get User Data

**users**

- ID
- user_login
- user_pass
- user_nicename
- user_email
- user_url
- user_registered
- display_name

**user_meta**
- first_name
- last_name
- nickname
- description
- wp_capabilities (array)
- admin_color (Theme of your admin page. Default is fresh.)
- closedpostboxes_page
- primary_blog
- rich_editing
- source_domain

#### Reference Links
- `wp_update_term( $term_id, $taxonomy, $args )`
- https://www.smashingmagazine.com/2015/12/how-to-use-term-meta-data-in-wordpress/
- https://codex.wordpress.org/Function_Reference/wp_update_term
- https://codex.wordpress.org/Function_Reference/get_term
- https://codex.wordpress.org/Function_Reference/get_userdata
- https://codex.wordpress.org/Users_Your_Profile_Screen

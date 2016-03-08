# Open Byline authors
This plugin adds options to assign alternate post authors as bylines without creating WordPress user accounts. The selected author name and link will be shown on posts in place of the original post author. If no "Open Byline Author" is assigned to a post, the original post author will be used.


## Roadmap

- [ ] **FEATURE:** Import & remap/convert OBA terms from WP Importer WXR export file.
- [ ] **FEATURE:** Generate OBA term from existing real user/author
- [ ] **FEATURE:** Ability to link OBA term to real user/author
  - [ ] Sync meta between OBA and real user/author
    - [ ] Show Link :link: icon if OBA term linked to real user
- **ENHANCEMENTS:** OBA Meta & Edit Page
  - [ ] Show all meta as editable fields on the OBA edit page
  - [ ] OBA Meta
    - [ ] Username = slug
    - [ ] old_id (for import remappings)
    - [ ] Social links meta*
      - [ ] Auto-post to twitter & Facebook with publicise.
    - [ ] OBA avatar image support*
      - [ ] Image uploader on OBA edit page
      - [ ] Avatar image links array*
- [ ] **FEATURE:** OBA Multi-author support
- [ ] Mapping matching WordPress core real user/author meta fields and  value format.
  - [ ] Filter hooks



Field         | WP Value             | OBA Meta
------------- | -------------------- | -------------
author_id     | author_id            |
Username      | author_login         | slug
User Nicename | user_nicename        | slug (same as username)
Nickname      | nickname             |
Display name  | display_name         | name  :question:
Name          | author_display_name  |
Email         | author_login         |
First Name    | author_first_name    |
Last Name     | author_last_name     |
description   | description          |
Website       | user_url             |
Role          | role                 | old_role?
Avatar        | *                    | simple_local_avatar :question:
Old ID        | author_id            |

**Look Into:**
- Social Links
- Sites / Owner of Sites / Sites owned/contributed to
- number of posts of posts?
- posts attributed to?

#### Reference
- `wp_update_term( $term_id, $taxonomy, $args )`
- https://codex.wordpress.org/Function_Reference/wp_update_term
- https://codex.wordpress.org/Users_Your_Profile_Screen

<?php
/**
* The template for displaying Comments
*
* The area of the page that contains both current comments
* and the comment form. The actual display of comments is
* handled by a callback to twentytwelve_comment() which is
* located in the functions.php file.
*
* @package WordPress
* @subpackage Mfind
* @since Mfind 1.0
*/

/*
* If the current post is protected by a password and
* the visitor has not yet entered the password we will
* return early without loading the comments.
*/
if ( post_password_required() )
  return;
?>

<div id="komentarze" class="comments-area">
  <?php 
    comment_form();
    if ( have_comments() ) : 
  ?>

    <ol class="commentlist">
      <?php wp_list_comments( array( 'callback' => 'twentytwelve_comment', 'type' => 'comment', 'style' => 'ol' ) ); ?>
    </ol><!-- .commentlist -->

    <?php 
      if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
        <nav id="comment-nav-below" class="navigation" role="navigation">
          <h1 class="assistive-text section-heading"><?php _e( 'Comment navigation', 'twentytwelve' ); ?></h1>
          <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'twentytwelve' ) ); ?></div>
          <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'twentytwelve' ) ); ?></div>
        </nav>
    <?php 
      endif; 
      /* If there are no comments and comments are closed, let's leave a note.
      * But we only want the note on posts and pages that had comments in the first place.
      */
      if ( ! comments_open() && get_comments_number() ) : 
    ?>
      <p class="nocomments"><?php _e( 'Comments are closed.' , 'twentytwelve' ); ?></p>
    <?php 
      endif;
    endif; // have_comments() 
  ?>
</div><!-- #comments .comments-area -->

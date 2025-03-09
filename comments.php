<?php
/**
 * The template for displaying comments.
 *
 * @package WordPress
 * @subpackage WordPress-Theme-from-Scratch
 * @since Your Theme Version 1.0.32a
 */

if ( post_password_required() ) {
    echo 'This post is password protected. Enter the password to view comments.';
    return;
}

?>

<div id="comments" class="comments-area">

    <?php if ( have_comments() ) : ?>
        <h2 class="comments-title">
            <?php
            printf(
                _nx( 'One comment', '%1$s comments', get_comments_number(), 'comments title', 'textdomain' ),
                number_format_i18n( get_comments_number() )
            );
            ?>
        </h2>

        <ul class="comment-list">
            <?php
            wp_list_comments( array(
                'style'       => 'ul',
                'short_ping'  => true,
                'avatar_size' => 50,
            ) );
            ?>
        </ul>

        <?php the_comments_navigation(); ?>

    <?php endif; ?>

    <?php
    // Comment form
    comment_form();
    ?>

</div><!-- .comments-area -->

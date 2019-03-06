<?php
/**
 * neder Theme
 *
 * Theme by: AD-Theme
 * Our portfolio: http://themeforest.net/user/ad-theme/portfolio
 */
 
 global $neder_theme;
 if ( post_password_required() )
 return;
?>

<div class="comments comments-template" id="comments">
	<div class="comment-form-title">
		<h3><?php 
		if(get_comments_number() == '1') :
			echo esc_html__( '1 Comment', 'neder' );
		else :
			echo get_comments_number(). ' ' . esc_html__( 'Comments','neder' );
		endif;
		?></h3>
	</div>
	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	<nav id="comment-nav-above" class="comment-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'neder' ); ?></h1>
		<div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'neder' ) ); ?></div>
		<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'neder' ) ); ?></div>
	</nav>
	<?php endif; ?>

	<?php wp_list_comments( array( 'callback' => 'neder_comment', 'end-callback' => 'neder_comment_end' ) ); ?>

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	<nav id="comment-nav-below" class="comment-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'neder' ); ?></h1>
		<div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'neder' ) ); ?></div>
		<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'neder' ) ); ?></div>
	</nav>
	<?php endif; ?>

	<?php if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
        <p class="no-comments comment-closed"><?php esc_html_e( 'Comments are closed.', 'neder' ); ?></p>
    <?php endif; ?>
    <?php comment_form( array(
      'comment_notes_after'	=> '',
      'comment_notes_before' => '',
      'title_reply'       	=> '<span class="title-leave-a-comment">'.esc_html__( 'Leave a Comment', 'neder' ).'</span>'
    )); ?>

</div>
 
 
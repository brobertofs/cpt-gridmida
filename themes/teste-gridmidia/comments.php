<?php

if ( post_password_required() || ! is_singular() ) {
	return;
}
?>

<?php

?>
<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>

	<h4 class="comments-title">
		Comentários
	</h4>

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
		<h5 class="screen-reader-text">Navegação dos comentários</h5>
		<div class="nav-previous"><?php previous_comments_link( 'Comentários mais antigos' ); ?></div>
		<div class="nav-next"><?php next_comments_link(  'Comentários mais recentes'  ); ?></div>
	</nav><!-- -->
	<?php endif; ?>

	<ol class="comment-list">
		<?php
			wp_list_comments( array(
				'style'      => 'ol',
				'short_ping' => true,
				'avatar_size'=> 34,
			) );
		?>
	</ol><!--  -->

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
		<h5 class="screen-reader-text">Navegação dos comentários</h5>
		<div class="nav-previous"><?php previous_comments_link( 'Comentários mais antigos' ); ?></div>
		<div class="nav-next"><?php next_comments_link(  'Comentários mais recentes'  ); ?></div>
	</nav><!--  -->
	<?php endif; . ?>

	<?php if ( ! comments_open() ) : ?>
	<p class="no-comments">Os comentários estão fechados.</p>
	<?php endif; ?>
	
	<?php endif;  ?>

	<?php comment_form(); ?>

</div><!--  -->

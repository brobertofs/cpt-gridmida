<!-- O loop -->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<!-- Container do artigo -->	
	<div class="artigo-container">
		
		<!-- Título do post -->
		<h1>	
			<?php 
			if ( 'gridimidia_noticias' == get_post_type() ) {
				printf(
					'<a href="%s">%s</a>',
					get_post_type_archive_link( get_post_type() ),
					'Notícias: '
				); 
			}
			?>
			
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</h1>
		
		<!-- Categoria -->
		<?php the_category(); ?>
		
		<!-- Autor -->
		<?php the_author(); ?>
		
		<!-- Data -->
		<?php the_date(); ?>
		
		<?php if ( is_single() || is_page() ): ?>
			<!-- Conteúdo do post -->
			<?php the_content(); ?>
		<?php else: ?>
			<!-- Resumo do post -->
			<?php the_excerpt(); ?>
		<?php endif; ?>
		
		<?php comments_template(); ?>
		
	</div>
	
<?php endwhile; ?>
<?php endif; // Loop ?>

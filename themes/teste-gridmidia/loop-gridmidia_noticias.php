<!-- O loop -->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>

	<!-- Container do artigo -->	
	<div class="artigo-container">
		
		<!-- Título do post -->
		<h1>
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</h1>
		
		<!-- Categoria -->
		<?php
		$taxonomy = 'gridmidia_noticias_category';
		$terms = get_terms( $taxonomy, '' );
		
		if ( $terms ) {
				foreach($terms as $term) {
					echo '<a href="' . esc_attr(get_term_link($term, $taxonomy)) . '">' . $term->name.'</a>';
				}
		}
		?>
		
		<!-- Autor -->
		<?php the_author(); ?>
		
		<!-- Data -->
		<?php the_date(); ?>
		
		<?php if ( is_single() || is_page() ): ?>
			<!-- Conteúdo do post -->
			<?php the_content(); ?>
			<?php the_tags(); ?>
		<?php else: ?>
			<!-- Resumo do post -->
			<?php the_excerpt(); ?>
		<?php endif; ?>
		
		<?php comments_template(); ?>
		
		<?php
		// Custom posts mais recentes
		if ( is_single() ) {
			echo '<h4>Notícias mais recentes</h4>';
			
			// A consulta
			$the_query = new WP_Query( array(
				'post_type' => 'gridmidia_noticias',
				'post__not_in' => array( get_the_ID() ),
				'posts_per_page' => 5
			) );

			// O loop
			if ( $the_query->have_posts() ) {
				echo '<ul>';
				while ( $the_query->have_posts() ) {
					$the_query->the_post();
					echo '<li><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></li>';
				}
				echo '</ul>';
			} else {
				// Nada encontrado
			}
			/* Restaura a consulta original */
			wp_reset_postdata();
		} // Custom posts mais recentes - is_single
		?>
		
	</div>
	
<?php endwhile; ?>
<?php endif; // Loop ?>

<!-- Adiciona o cabeçalho (header.php) -->
<?php get_header(); ?>

<main role="main" class="artigos conteudo padding-esquerda-direita">

	<div class="linha clearfix">
	
		<div class="colunas principal">
			<div class="conteudo-ajax conteudo-coluna margem-total">
				<?php get_template_part('loop', 'gridmidia_noticias'); ?>

				<?php
					$paginas = paginacao();
					if ( ! empty( $paginas ) ): 
				?> 
					<div class="paginacao">
						<?php echo $paginas;?>
					</div>
				<?php endif; ?>
				
			</div>			
		</div>
		
		<aside class="colunas lateral">
			<div class="conteudo-coluna margem-total">
				 <?php get_sidebar(); ?> 
			</div>
		</aside>
		
	</div>
	
</main>

<!-- Adiciona o rodapé (footer.php) -->
<?php get_footer(); ?>
<?php
/*
Template Name: Largura máxima
*/
?>
<!-- Adiciona o cabeçalho (header.php) -->
<?php get_header(); ?>

<main role="main" class="artigos conteudo padding-esquerda-direita">

	<div class="linha clearfix">
	
		<div class="pagina-largura-maxima colunas principal">
			<div class="conteudo-ajax conteudo-coluna margem-total">
				<?php get_template_part('loop', 'index'); ?>
	
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
	</div>
	
</main>

<!-- Adiciona o rodapé (footer.php) -->
<?php get_footer(); ?>
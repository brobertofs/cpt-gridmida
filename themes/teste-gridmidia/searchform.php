<div class="conteudo-pesquisa">
	<form role="search" method="get" class="formulario-pesquisa" action="<?php 
		echo home_url( '/' ); ?>">
		
		<!-- Os campos estão invertidos, por conta do nosso CSS, 
		você pode modificar isso se preferir -->
		<input type="submit" class="submit-pesquisa" value="Pesquisar" />
		<input type="search" class="input-pesquisa" placeholder="Pesquisar" value="<?php 
		echo get_search_query() ?>" name="s" required />
		
	</form>
</div>
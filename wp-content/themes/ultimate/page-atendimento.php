<?php
	if(isset($_GET['orcamento'])){
		$orcamento = $_GET['orcamento'];

		$rows = get_field('servicos',129);
		$specific_row = $rows[$orcamento];
		$servico = $specific_row['titulo']; 
	}else{
		$orcamento = '';
	}
?>

<?php get_header(); ?>

	<?php
	// Start the loop.
	while ( have_posts() ) : the_post();

		// Include the page content template.
		get_template_part( 'content-atendimento', 'page' );

	// End the loop.
	endwhile;
	?>

<?php get_footer(); ?>

<section class="box-content box-page box-page-servico">
	<div class="container">
		
		<div class="row">
			<div class="col-text">

				<div class="col-12">
					<div class="text-detalhe">
						<?php the_content(); ?>
					</div>
				</div>

			</div>
			<div class="col-text">

				<?php if( have_rows('servicos') ):
					$num_galera = 0;
					while ( have_rows('servicos') ) : the_row(); $num_galera = $num_galera+1; $imagem_galeria = get_sub_field('portfolio'); ?>

						<div class="col-4 list-servicos">
							<div class="box-galeria">
								<?php $image = get_sub_field('imagem_principal'); ?>
								<?php if( $imagem_galeria ): ?>
									<a href="<?php echo $image['url']; ?>" class="galeria fancybox" data-fancybox="galeria<?php echo '-'.$num_galera; ?>">Visualizar Galeria</a>
								<?php endif; ?>
								<img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php the_sub_field('titulo'); ?>">
							</div>
							<h4><?php the_sub_field('titulo'); ?></h4>
							<p><?php the_sub_field('texto'); ?></p>
							<a href="<?php echo get_permalink(get_page_by_path('atendimento')); ?>?orcamento=<?php echo (get_row_index()-1); ?>" class="galeria orcamento">Solicitar Orçamento</a>

							<?php if( $imagem_galeria ): ?>
								<?php foreach( $imagem_galeria as $imagem ): ?>
									<a href="<?php echo $imagem['url']; ?>" class="fancybox" data-fancybox="galeria<?php echo '-'.$num_galera; ?>" style="display: none;">
										<img src="<?php echo $imagem['sizes']['thumbnail']; ?>">
									</a>
								<?php endforeach; ?>
							<?php endif; ?>

						</div>

					<?php endwhile;
				endif; ?>
			
			</div>
			</div>
		</div>

	</div>
</section>

<script type="text/javascript">
	jQuery(document).ready(function(){	    

	});

	jQuery(window).resize(function(){

	});
</script>

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/fancybox/fancybox.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function() {		
		jQuery('.fancybox').fancybox();	
	});
</script>
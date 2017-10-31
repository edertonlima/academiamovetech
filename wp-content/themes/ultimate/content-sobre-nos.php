
<section class="box-content box-page box-page-sobre">
	<div class="container">
		
		<div class="row">
			<div class="col-text">
				
				<div class="col-4">
					<?php $imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' ); ?>
					<img src="<?php echo $imagem[0]; ?>" alt="Conheça um pouco sobre nós" class="img-sobre">
				</div>

				<div class="col-8">
					<div class="text-detalhe">
						<?php the_content(); ?>
					</div>
				</div>

			</div>

			<div class="col-text">
				<div class="col-4">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/missao.png" alt="Missão" class="ico">
					<h4>Missão</h4>
					<?php the_field('missao'); ?>
				</div>
				<div class="col-4">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/visao.png" alt="Visão" class="ico">
					<h4>Visão</h4>
					<?php the_field('visao'); ?>
				</div>
				<div class="col-4">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/valores.png" alt="Valores" class="ico">
					<h4>Valores</h4>
					<?php the_field('valores'); ?>
				</div>
			</div>
		</div>

	</div>

</section>

<?php if( have_rows('parceiros') ): ?>
	<section class="box-content box-post parceiros">
		<div class="container">

			<div class="list-post-home">
				<h4>
					<?php the_field('titulo_parceiros'); ?>
					<span><?php the_field('sub_titulo_parceiros'); ?></span>
				</h4>
			</div>
			
			<div class="owl-carousel owl-theme parceiros">
				<?php while ( have_rows('parceiros') ) : the_row(); 

					if(get_sub_field('link')){ ?>
						<a href="<?php the_sub_field('link'); ?>" target="_blank" title="<?php the_sub_field('titulo'); ?>" class="item">
							<img src="<?php the_sub_field('imagem'); ?>" alt="<?php the_sub_field('titulo'); ?>">
							<h5><?php the_sub_field('titulo'); ?></h5>
						</a>
					<?php }else{ ?>
						<div class="item">
							<img src="<?php the_sub_field('imagem'); ?>" alt="<?php the_sub_field('titulo'); ?>">
							<h5><?php the_sub_field('titulo'); ?></h5>
						</div>
					<?php } ?>

				<?php endwhile; ?>
			</div>		

		</div>
	</section>	
<?php endif; ?>

<script type="text/javascript">

</script>

<script src="<?php echo get_template_directory_uri(); ?>/assets/js/owl.carousel.min.js" type="text/javascript"></script>
<script type="text/javascript">
	jQuery('.owl-carousel.parceiros').owlCarousel({
		loop: false,
		center: false,
		nav: true,
		margin: 20,
		navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
		responsive: {
			0: {
				items: 1
			},
			768: {
				items: 6
			}
		}
	}) 
</script>
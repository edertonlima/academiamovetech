<section class="box-content box-page-sobre">
	<div class="container">
		<div class="row">

			<div class="col-6">
				<div class="dest-home">

					<h2><?php the_title(); ?></h2>
					<?php the_field('texto_home'); ?>
					
				</div>
			</div>

			<div class="col-6">
				<?php 
					$imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' );
				?>
				<div class="home-sobre-img">
					<img src="<?php echo $imagem[0]; ?>" alt="">
				</div>
			</div>

		</div>

		<div class="row">

			<div class="col-12">
				<p><br><br></p>

				<?php the_content(); ?>
					
			</div>

		</div>
	</div>
</section>


<?php if( have_rows('equipe') ): ?>
	<section class="box-content azul post">
		<div class="container">
			<div class="row">

				<div class="col-12">
					<h2 class="center"><?php the_field('titulo_equipe'); ?></h2>
					<div class="p center sub-texto"><?php the_field('sub_titulo_equipe'); ?></div>
				</div>

				<div class="owl-carousel list-post">
					<?php
						while ( have_rows('equipe') ) : the_row();

							get_template_part( 'content-list-equipe' );

						endwhile;
					?>

				</div>

			</div>
		</div>
	</section>
<?php endif; ?>


<?php if( have_rows('parceiros') ): ?>
	<section class="box-content">
		<div class="container">
			<div class="row">

				<div class="col-12">
					<h2 class="center"><?php the_field('titulo_parceiros'); ?></h2>
					<div class="p center sub-texto"><?php the_field('sub_titulo_parceiros'); ?></div>
				

					<div class="owl-carousel list-cat-modalidades">

						<?php
							while ( have_rows('parceiros') ) : the_row();

								get_template_part( 'content-list-parceiros' );

							endwhile;
						?>

					</div>

			</div>

		</div>
	</section>
<?php endif; ?>

<script type="text/javascript">

</script>

<script src="<?php echo get_template_directory_uri(); ?>/assets/js/owl.carousel.min.js" type="text/javascript"></script>
<script type="text/javascript">
	jQuery('.list-post').owlCarousel({
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
				items: 3
			}
		}
	}) 

	jQuery('.owl-carousel.list-cat-modalidades').owlCarousel({
		loop: false,
		center: false,
		nav: true,
		margin: 20,
		navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
		responsive: {
			0: {
				items: 1
			},
			600: {
				items: 2
			},
			768: {
				items: 3
			},
			1000: {
				items: 4
			}
		}
	}) 
</script>
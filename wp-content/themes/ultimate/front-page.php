<?php get_header(); ?>


	<!-- slide -->
	<section class="box-content no-padding box-slide">
		<div class="slide">
			<div id="carousel" class="carousel slide" data-ride="carousel" data-interval="6000" id="slide">

				<div class="carousel-inner" role="listbox">

					<?php if( have_rows('slide') ):
						$slide = 0;
						while ( have_rows('slide') ) : the_row();

							if(get_sub_field('imagem')){
								$slide = $slide+1; ?>

								<div class="item <?php if($slide == 1){ echo 'active'; } ?>" style="background-image: url('<?php the_sub_field('imagem'); ?>');">

									<div class="box-height">
										<div class="box-texto">

											<?php if(get_sub_field('texto')){ ?>
												<p class="texto"><?php the_sub_field('texto'); ?></p>
											<?php } ?>

											<?php if(get_sub_field('sub_texto')){ ?>
												<p class="sub-texto"><?php the_sub_field('sub_texto'); ?></p>
											<?php } ?>

										</div>
									</div>
									
								</div>

							<?php }

						endwhile;
					endif; ?>

				</div>

				<div class="carousel-control">
					<a class="left" href="#carousel" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
					<a class="right" href="#carousel" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>
				</div>

				<ol class="carousel-indicators">
					
					<?php for($i=0; $i<$slide; $i++){ ?>
						<li data-target="#slide" data-slide-to="<?php echo $i; ?>" class="<?php if($i == 0){ echo 'active'; } ?>"></li>
					<?php } ?>
					
				</ol>

			</div>
		</div>
	</section>


	<section class="box-content">
		<div class="container">
			<div class="row">

				<div class="col-6">
					<div class="dest-home">

						<h2><?php echo get_the_title(77); ?></h2>
						<?php the_field('texto_home',77); ?>
						
					</div>
				</div>
				<div class="col-6">
					<?php 
						$imagem = wp_get_attachment_image_src( get_post_thumbnail_id(77), '' );
					?>
					<div class="home-sobre-img">
						<img src="<?php echo $imagem[0]; ?>" alt="">
						<a href="<?php echo get_permalink(get_page_by_path('sobre-nos')); ?>" title="Conhecer mais" class="button">Conhecer mais</a>
					</div>
				</div>

			</div>
		</div>
	</section>


	<section class="box-content azul-escuro">
		<div class="container">
			<div class="row">

				<div class="col-12">
					<h2 class="center">Diversas modalidades para alcançar seus sonhos</h2>
					<p class="center sub-texto">Morbi gravida ultricies turpis sed vulputate. Pellentesque commodo scelerisque nibh, ut semper lectus efficitur nec. Maecenas congue velit a ex vulputate faucibus.</p>
				

					<div class="owl-carousel list-cat-modalidades">

						<?php
							$args = array(
							    'taxonomy'      => 'modalidades_taxonomy',
							    'parent'        => 0,
							    'orderby'       => 'name',
							    'order'         => 'ASC',
							    'hierarchical'  => 1,
							    'pad_counts'    => true,
							    'hide_empty'    => 0
							);
							$categories = get_categories( $args );
							foreach ( $categories as $categoria ){ 
								$image = get_field('imagem_categoria',$categoria->taxonomy.'_'.$categoria->term_id); ?>

								<a href="<?php echo get_category_link($categoria->term_id); ?>" class="item" title="<?php echo $categoria->name; ?>" style="background-image: url('<?php echo $image['sizes']['thumbnail']; ?>');">
									<div class="box">
										<h3><?php echo $categoria->name; ?></h3>
										<!--<p><?php echo $categoria->description; ?></p>-->
										<span>Ver Modalidades <i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
									</div>
								</a>
								
							<?php
							}
						?>

					</div>

			</div>

		</div>
	</section>


	<section class="box-content no-padding">
		<div class="row">

			<?php $imagem = wp_get_attachment_image_src( get_post_thumbnail_id(187), '' ); ?>
			<a href="<?php the_permalink(187); ?>" title="<?php echo get_the_title(187); ?>" class="box-page-destaque">
				<div class="col-6 page-destaque convenios" style="background-image: url('<?php echo $imagem[0]; ?>');">
					<span><strong><?php echo get_the_title(187); ?></strong></span>
				</div>
			</a>

			<?php $imagem = wp_get_attachment_image_src( get_post_thumbnail_id(189), '' ); ?>
			<a href="<?php the_permalink(189); ?>" title="<?php echo get_the_title(189); ?>"  class="box-page-destaque">
				<div class="col-6 page-destaque clube-de-vantagens" style="background-image: url('<?php echo $imagem[0]; ?>');">
					<span><strong><?php echo get_the_title(189); ?></strong></span>
				</div>
			</a>

		</div>
	</section>

	<section class="box-content post">
		<div class="container">
			<div class="row">

				<div class="col-12">
					<h2 class="center"><?php echo get_cat_name(1);?></h2>
					<div class="p center sub-texto"><?php echo category_description(1); ?></div>
				</div>

				<div class="list-post">
					<?php
						query_posts(
							array(
								'post_type' => 'post',
								'posts_per_page' => 3
							)
						);

						while ( have_posts() ) : the_post(); 

							get_template_part( 'content-list' );

						endwhile;
						wp_reset_query();
					?>

				</div>

			</div>
		</div>
	</section>

	<?php get_footer(); ?>

</div>

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/fancybox/fancybox.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function() {		
		jQuery('.fancybox').fancybox();	
	});
</script>

<script src="<?php echo get_template_directory_uri(); ?>/assets/js/owl.carousel.min.js" type="text/javascript"></script>
<script type="text/javascript">
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
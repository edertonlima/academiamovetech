<?php get_header(); ?>

	<header class="header-title">
		<div class="container">
			
			<h2>
				Modalidades
				<ul class="breadcrumb">
					<li><a href="<?php echo get_home_url(); ?>" title="Home">Home</a></li>
					<li><span>Modalidades</span></li>
				</ul>
			</h2>

		</div>
	</header>

	<section class="box-content">
		<div class="container">
			<div class="row">

				<div class="col-12">
					<h2 class="center">Diversas modalidades para alcançar seus sonhos</h2>
					<p class="center sub-texto">Morbi gravida ultricies turpis sed vulputate. Pellentesque commodo scelerisque nibh, ut semper lectus efficitur nec. Maecenas congue velit a ex vulputate faucibus.</p>
				</div>

			</div>
			<div class="">

					<div class="list-cat-modalidades page-modalidades">

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

								<div class="col-modalidades">
									<a href="<?php echo get_category_link($categoria->term_id); ?>" class="item" title="<?php echo $categoria->name; ?>" style="background-image: url('<?php echo $image['sizes']['thumbnail']; ?>');">
										<div class="box">
											<h3><?php echo $categoria->name; ?></h3>
											<!--<p><?php echo $categoria->description; ?></p>-->
											<span>Ver Modalidades <i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
										</div>
									</a>
								</div>
								
							<?php
							}
						?>

					</div>

			</div>

		</div>
	</section>

	<?php get_footer(); ?>

</div>
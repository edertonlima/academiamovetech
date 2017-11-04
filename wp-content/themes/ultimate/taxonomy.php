<?php get_header(); ?>

	<?php $terms = wp_get_post_terms( $post->ID, $post->post_type.'_taxonomy' ); ?>
	<?php $post_type = get_post_type_object( $post->post_type ); ?>

	<header class="header-title">
		<div class="container">
			
			<h2>
				<?php echo single_term_title(); ?>
				<ul class="breadcrumb">
					<li><a href="<?php echo get_home_url(); ?>" title="Home">Home</a></li>
					<li><a href="<?php echo get_home_url(); ?>/modalidades" title="Modalidades">Modalidades</a></li>
					<li><span><?php echo single_term_title(); ?></span></li></ul>
			</h2>

		</div>
	</header>

	<section class="box-content post list-categoria">
		<div class="container">
			<div class="row">

				<div class="col-12">
					<div class="p center sub-texto"><?php echo category_description(1); ?></div>
				</div>

				<div class="list-post">
					<?php
						if(have_posts()){
							while ( have_posts() ) : the_post();

								get_template_part( 'content-list', get_post_format() );

							endwhile;

							paginacao(); 
						}else{ ?>

							<div class="col-12">
								<div class="p center sub-texto" style="margin-top: 40px; font-weight: 600;">Nenuma modalidade encontrada.</div>
							</div>

						<?php }
					?>

				</div>

			</div>
		</div>
	</section>

<?php get_footer(); ?>
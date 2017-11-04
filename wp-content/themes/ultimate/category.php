<?php get_header(); ?>

	<header class="header-title">
		<div class="container">
			
			<h2>
				<?php echo get_cat_name(1);?>
				<ul class="breadcrumb"><li><a href="<?php echo get_home_url(); ?>" title="Home">Home</a></li><li><span><?php echo get_cat_name(1);?></span></li></ul>
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
						while ( have_posts() ) : the_post();

							get_template_part( 'content-list', get_post_format() );

						endwhile;

						paginacao(); 
					?>

				</div>

			</div>
		</div>
	</section>

<?php get_footer(); ?>
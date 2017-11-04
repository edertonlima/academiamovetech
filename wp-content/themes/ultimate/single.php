<?php get_header(); ?>

	<header class="header-title">
		<div class="container">
			
			<h2>
				<?php echo get_cat_name(1); ?>
				<ul class="breadcrumb">
					<li><a href="<?php echo get_home_url(); ?>" title="Home">Home</a></li>
					<li><a href="<?php echo get_home_url(); ?>/dicas-e-curiosidades" title="<?php echo get_cat_name(1); ?>"><?php echo get_cat_name(1); ?></a></li>
					<li><span><?php the_title(); ?></span></li>
				</ul>
			</h2>

		</div>
	</header>

	<?php
	// Start the loop.
	while ( have_posts() ) : the_post();

		// Include the page content template.
		get_template_part( 'content', 'page' );

	// End the loop.
	endwhile;
	?>

<?php get_footer(); ?>
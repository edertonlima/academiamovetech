<?php get_header(); ?>

	<?php $terms = wp_get_post_terms( $post->ID, $post->post_type.'_taxonomy' ); ?>
	<?php $post_type = get_post_type_object( $post->post_type ); ?>

	<header class="header-title">
		<div class="container">
			
			<h2>
				<?php echo $terms[0]->name; ?>
				<ul class="breadcrumb">
					<li><a href="<?php echo get_home_url(); ?>" title="Home">Home</a></li>
					<li><a href="<?php echo get_post_type_archive_link($post_type->name); ?>" title="Serviço <?php echo $post_type->labels->singular_name; ?>"><?php echo $post_type->labels->singular_name; ?></a></li>
					<li><a href="<?php echo get_home_url(); ?>/<?php echo $post_type->name; ?>/<?php echo $terms[0]->slug; ?>" title="Serviço <?php echo $post_type->labels->singular_name; ?>"><?php echo $terms[0]->name; ?></a></li>
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
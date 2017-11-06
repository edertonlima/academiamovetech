<?php 
	$imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' ); 
?>

<section class="box-content box-post det-post">
	<div class="container">

		<div class="row">

			<div class="col-12">
				<h2 class="center"><?php the_title(); ?></h2>
				<div class="p center sub-texto"><?php the_excerpt(); ?></div>
			</div>

			<div class="col-12">
				<?php if($imagem[0]){ ?>
					<img src="<?php echo $imagem[0]; ?>" alt="" class="img-det-post">
				<?php } ?>
				<?php the_content(); ?>
			</div>

		</div>

	</div>
</section>
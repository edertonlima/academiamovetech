<?php 
	$imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' );
?>

<section class="box-content box-post det-post">
	<div class="container">

		<div class="row">

			<div class="col-5">
				<img src="<?php echo $imagem[0]; ?>" alt="">
			</div>

			<div class="col-7">
				<?php echo the_content(); ?>
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
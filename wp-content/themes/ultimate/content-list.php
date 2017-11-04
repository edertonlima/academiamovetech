<?php
	$imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' );
?>

<div class="col-4 item-post-list">
	<div class="img-post" style="background-image: url('<?php echo $imagem[0]; ?>');"></div>
	<div class="text_content">
		<h4><?php the_title(); ?></h4>
		<?php the_excerpt(); ?>
		<a href="<?php the_permalink(); ?>" class="button leia-mais" title="Leia Mais"><i class="fa fa-file-text-o"></i> Leia Mais</a>
	</div>
</div>

<script type="text/javascript">
	jQuery(document).ready(function(){


	});

	jQuery(window).resize(function(){

	});
</script>
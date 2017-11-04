<section class="box-content box-page box-page-sobre">
	<div class="container">
		
		<div class="row">
			<div class="col-text">

				<div class="col-12">
					<div class="text-detalhe">
						<?php the_content(); ?>
					</div>
				</div>
			</div>
		</div>
			
		<div class="row">
			<div class="col-text">	
				<div class="col-5 atendimento">
					<?php $imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' ); ?>
					<?php if($imagem){ ?>
						<img src="<?php echo $imagem[0]; ?>" class="img-sobre">
					<?php } ?>



					<div class="fone-top">
						<?php if( have_rows('redes_sociais','option') ): ?>
							<div class="redes">						
								<?php while ( have_rows('redes_sociais','option') ) : the_row(); ?>

									<a href="<?php the_sub_field('url','option'); ?>" title="<?php the_sub_field('nome','option'); ?>" target="_blank">
										<?php the_sub_field('icone','option'); ?>
									</a>
								<?php endwhile; ?>						
							</div>
						<?php endif; ?>

						<span class="fone-footer">
							<strong><?php the_field('telefone_1', 'option'); ?><br></strong>
							<?php the_field('email', 'option'); ?>
						</span>	
					</div>

					<p><?php the_field('endereco', 'option'); ?></p>
				</div>

				<div class="col-7">
					<div class="text-detalhe">
						
						<form>
							<fieldset>
								<input type="text" id="nome" name="nome" placeholder="Nome:">
							</fieldset>

							<fieldset>
								<input type="text" id="email" name="email" placeholder="E-mail:">
							</fieldset>

							<fieldset>
								<input type="text" id="telefone" name="telefone" placeholder="Telefone:">
							</fieldset>

							<fieldset>
								<textarea name="mensagem" id="mensagem" placeholder="Mensagem: "></textarea>
							</fieldset>

							<fieldset>
								<p class="msg-form"></p>
								<button type="button" class="enviar">Enviar <i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
							</fieldset>
						</form>
					</div>
				</div>

			</div>
		</div>

	</div>

</section>

<script type="text/javascript">
	jQuery.noConflict();

	jQuery(document).ready(function(){
		// FORM
		jQuery(".enviar").click(function(){
			jQuery('.enviar').html('Enviando').prop( "disabled", true );
			jQuery('.msg-form').removeClass('erro ok').html('');
			var nome = jQuery('#nome').val();
			var email = jQuery('#email').val();
			var telefone = jQuery('#telefone').val();
			var assunto = jQuery('#assunto').val();
			var mensagem = jQuery('#mensagem').val();
			var para = '<?php get_field('email', 'option'); ?>';
			var nome_site = '<?php get_field('titulo', 'option'); ?>';

			if(email!=''){
				jQuery.getJSON("<?php echo get_template_directory_uri(); ?>/mail.php", { nome:nome, email:email, telefone:telefone, mensagem:mensagem, para:para, nome_site:nome_site }, function(result){		
					if(result=='ok'){
						resultado = 'Enviado com sucesso! Obrigado.';
						classe = 'ok';
					}else{
						resultado = result;
						classe = 'erro';
					}
					jQuery('.msg-form').addClass(classe).html(resultado);
					jQuery('form').trigger("reset");
					jQuery('.enviar').html('Enviando').prop( "disabled", false );
				});
			}else{
				jQuery('.msg-form').addClass('erro').html('Por favor, digite um e-mail válido.');
				jQuery('.enviar').html('Enviar').prop( "disabled", false );
			}
		});
	});
</script>

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/maskedinput.js"></script>
<script type="text/javascript">
	jQuery(function($){
	   $("#telefone").mask("(99) 9999-9999?9");
	});
</script>
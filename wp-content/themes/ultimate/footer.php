
<footer class="box-content azul-escuro footer">
	<div class="container">

		<div class="row">

			<div class="col-4 col-footer">
				<div class="logo">
					<h1>
						<a href="<?php echo get_home_url(); ?>" title="<?php the_field('titulo', 'option'); ?>">
							<img src="<?php the_field('logo_header', 'option'); ?>" alt="<?php the_field('titulo', 'option'); ?>">
						</a>
					</h1>
				
					<p><?php the_field('descricao','option'); ?></p>
				</div>
			</div>

			<div class="col-1 col-footer"></div>

			<div class="col-4 col-footer footer-contato footer-endereco">

				<span class="fone-footer">
					<strong><?php the_field('telefone_1', 'option'); ?><br></strong>
					<?php the_field('email', 'option'); ?>

					<p><?php the_field('endereco', 'option'); ?></p>

					<?php if( have_rows('redes_sociais','option') ): ?>
						<div class="redes">						
							<?php while ( have_rows('redes_sociais','option') ) : the_row(); ?>

								<a href="<?php the_sub_field('url','option'); ?>" title="<?php the_sub_field('nome','option'); ?>" target="_blank">
									<?php the_sub_field('icone','option'); ?>
								</a>
							<?php endwhile; ?>						
						</div>
					<?php endif; ?>
				</span>			  			    
			    
			</div>

			<div class="col-3 col-footer footer-contato footer-redes">
				<?php if( have_rows('redes_sociais','option') ): ?>
					<div class="redes">						
						<?php while ( have_rows('redes_sociais','option') ) : the_row(); ?>

							<a href="<?php the_sub_field('url','option'); ?>" title="<?php the_sub_field('nome','option'); ?>" target="_blank">
								<?php the_sub_field('icone','option'); ?>
							</a>
						<?php endwhile; ?>						
					</div>
				<?php endif; ?>
			</div>

		</div>
	</div>

	<div class="copy">
		<div class="container">
			<div class="row">

				<div class="col-12 ultimate">
					<h5>©Copyright <?php echo date('Y'); ?> - <?php the_field('titulo', 'option'); ?>. Todos os direitos reservados.</h5>

					<a href="http://www.ultimate.com.br" target="_blank" title="ULTIMATE">ULTIMATE! tecnologia e design</a>
				</div>

			</div>
		</div>
	</div>
</footer>






























	<footer class="footer" style="display: none;">
		<div class="msg">
			<div class="container">
				<h3>Venha nos conhecer, ficaremos feliz em te receber!</h3>
			</div>
		</div>
		<div class="container">
			<div class="row">

				<div class="col-4">
					<h3><?php the_field('titulo_footer','option'); ?></h3>
					<?php the_field('texto_footer','option'); ?>
				</div>

				<div class="col-5">
					<div class="item">
						<i class="fa fa-envelope-o" aria-hidden="true"></i>
						<span>
							Quer falar conosco?
							<strong><?php the_field('email','option'); ?></strong>
						</span>
					</div>

					<div class="item">
						<i class="fa fa-comment-o" aria-hidden="true"></i>
						<span>
							Ligue para nós
							<strong><?php the_field('telefone_1','option'); ?></strong>
						</span>
					</div>

					<div class="item endereco">
						<p><?php the_field('endereco','option'); ?></p>
					</div>
				</div>

				<div class="col-3">
					<?php if( get_field('facebook_rodape','option') ): ?>
						<div class="fb-page" 
						data-href="<?php the_field('facebook_rodape','option'); ?>"
						data-width="380" 
						data-hide-cover="false"
						data-show-facepile="false"></div>
					<?php endif; ?>
				</div>
				
			</div>
		</div>

		<div class="copy">

			<?php if( have_rows('redes_sociais','option') ): ?>
				<div class="redes">						
					<?php while ( have_rows('redes_sociais','option') ) : the_row(); ?>

						<a href="<?php the_sub_field('url','option'); ?>" title="<?php the_sub_field('nome','option'); ?>" target="_blank">
							<?php the_sub_field('icone','option'); ?>
						</a>
					<?php endwhile; ?>

					<a href="javascript:" class="item_bar" id="gotop"><i class="fa fa-chevron-up" aria-hidden="true"></i></a>
					
				</div>
			<?php endif; ?>

			<p><i class="fa fa-copyright" aria-hidden="true"></i> <?php echo date('Y') ?> <?php the_field('titulo','option'); ?></p>
		</div>
		
	</footer>

	<script type="text/javascript">
		
		jQuery.noConflict();

		jQuery(document).ready(function(){
			jQuery(".scroll").click(function(event){
				event.preventDefault();
				jQuery('.menu-mobile').removeClass('active');
				jQuery('.header').removeClass('active');
				jQuery('.nav').css('top','-110vh');
				jQuery('html,body').animate( { scrollTop:jQuery(this.hash).offset().top } , 1000);
			});

			jQuery("#gotop").click(function(event){
				event.preventDefault();
				jQuery('html,body').animate( { scrollTop: 0 } , 1000);
			});
		});

	</script>

</body>
</html>
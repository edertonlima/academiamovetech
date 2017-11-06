<section class="box-content box-page-sobre">
	<div class="container">
		<div class="row">

			<div class="col-12">
				<h2 class="center"><?php the_title(); ?></h2>
				<div class="p center sub-texto"><?php the_content(); ?></div>

				<div class="table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Horário</th>
								<th>Segunda</th>
								<th>Terça</th>
								<th>Quarta</th>
								<th>Quinta</th>
								<th>Sexta</th>
								<th>Sábado</th>
								<th>Domingo</th>
							</tr>
						</thead>
						<tbody>

							<?php
								while ( have_rows('horarios-da-semana') ) : the_row(); ?>

									<tr>
										<td class="horario"><strong><?php the_sub_field('horario'); ?></strong></td>

										<?php $dia_semana = get_sub_field('segunda'); ?>
										<td>
											<?php if( $dia_semana ):
												foreach ($dia_semana as $item) {
													if(count($item) != 0){ ?>
														<a href="<?php the_permalink($item->ID); ?>" title="<?php echo $item->post_title; ?>"><?php echo $item->post_title; ?></a>
													<?php }
												}
											endif; ?>
										</td>								

										<?php $dia_semana = get_sub_field('terca'); ?>
										<td>
											<?php if( $dia_semana ):
												foreach ($dia_semana as $item) {
													if(count($item) != 0){ ?>
														<a href="<?php the_permalink($item->ID); ?>" title="<?php echo $item->post_title; ?>"><?php echo $item->post_title; ?></a>
													<?php }
												}
											endif; ?>
										</td>							

										<?php $dia_semana = get_sub_field('quarta'); ?>
										<td>
											<?php if( $dia_semana ):
												foreach ($dia_semana as $item) {
													if(count($item) != 0){ ?>
														<a href="<?php the_permalink($item->ID); ?>" title="<?php echo $item->post_title; ?>"><?php echo $item->post_title; ?></a>
													<?php }
												}
											endif; ?>
										</td>								

										<?php $dia_semana = get_sub_field('quinta'); ?>
										<td>
											<?php if( $dia_semana ):
												foreach ($dia_semana as $item) {
													if(count($item) != 0){ ?>
														<a href="<?php the_permalink($item->ID); ?>" title="<?php echo $item->post_title; ?>"><?php echo $item->post_title; ?></a>
													<?php }
												}
											endif; ?>
										</td>								

										<?php $dia_semana = get_sub_field('sexta'); ?>
										<td>
											<?php if( $dia_semana ):
												foreach ($dia_semana as $item) {
													if(count($item) != 0){ ?>
														<a href="<?php the_permalink($item->ID); ?>" title="<?php echo $item->post_title; ?>"><?php echo $item->post_title; ?></a>
													<?php }
												}
											endif; ?>
										</td>

										<?php $dia_semana = get_sub_field('sabado'); ?>
										<td>
											<?php if( $dia_semana ):
												foreach ($dia_semana as $item) {
													if(count($item) != 0){ ?>
														<a href="<?php the_permalink($item->ID); ?>" title="<?php echo $item->post_title; ?>"><?php echo $item->post_title; ?></a>
													<?php }
												}
											endif; ?>
										</td>	

										<?php $dia_semana = get_sub_field('domingo'); ?>
										<td>
											<?php if( $dia_semana ):
												foreach ($dia_semana as $item) {
													if(count($item) != 0){ ?>
														<a href="<?php the_permalink($item->ID); ?>" title="<?php echo $item->post_title; ?>"><?php echo $item->post_title; ?></a>
													<?php }
												}
											endif; ?>
										</td>	

									</tr>	

								<?php endwhile;
							?>

						</tbody>
					</table>
				</div>

			</div>

		</div>
	</div>
</section>

<?php //var_dump($item); ?>
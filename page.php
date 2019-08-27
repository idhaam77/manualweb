<?php get_header(); ?>
			<div class="row m-0">
				<article class="col-md-9">
					<div class="card border-primary mt-3">
						<div class="card-body">
						<?php while(have_posts()) : the_post(); ?>
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<div class="border border-primary border-right-0 border-bottom-0 border-left-0 my-3"></div>
							<?php // load Content
							the_content();
							$btpm_pages = array(
								'before'			=>	'<ul class="pagination pagination-sm"><li class="page-item disabled"><span class="page-link">Lanjut lembar ke : </span></li><li class="page-item"><span class="page-link">',
								'after'				=>	'</span></li></ul>',
								'separator'			=>	'<span class="mr-3"></span>',
								'next_or_number'	=>	'number',
								'pagelink'			=>	'%',
								'echo'				=>	1
							);
							wp_link_pages($btpm_pages); ?>
							<div class="border border-primary border-right-0 border-bottom-0 border-left-0 my-3"></div>
								<div class="mb-4">
									<?php echo get_avatar( 
										get_the_author_meta( 'user_email' ), '60', $default, $alt, array( 
											'class' => array('rounded-circle', 'float-left') 
										) ); ?>
									<h5 style="margin-left: 70px;margin-bottom: 3px;"><a href="<?php the_author_url(); ?>"><?php the_author(); ?></a></h5>
									<p style="margin-left: 70px; margin-bottom: 0;">On <?php the_time('d/m/Y'); ?></p>
								</div>
							<div class="border border-primary border-right-0 border-bottom-0 border-left-0 my-3"></div>
						<?php // end of looping wordpress
						endwhile; wp_reset_query(); ?>
						</div>
					</div>
				</article>
				<?php get_sidebar(); ?>
			</div>
<?php get_footer(); ?>
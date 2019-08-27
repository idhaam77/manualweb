<?php get_header(); ?>
			<div class="row m-0">
				<article class="col-md-9">
					<div class="card border-primary mt-3">
						<div class="card-body">
						<?php while(have_posts()) : the_post(); ?>
							<div class="mb-4">
								<a class="breadcrumb-item" href="<?php echo home_url(); ?>">Home</a>
								<span class="breadcrumb-item"><?php the_category(', '); ?></span>
								<span class="breadcrumb-item active"><?php single_post_title(); ?></span>
							</div>
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
							wp_link_pages($btpm_pages);
							the_tags('<span class="badge badge-primary">', '</span> <span class="badge badge-primary">', '</span>'); ?>
							<div class="border border-primary border-right-0 border-bottom-0 border-left-0 my-3"></div>
							<div class="row">
								<div class="col">
									<?php echo get_avatar( 
										get_the_author_meta( 'user_email' ), '60', $default, $alt, array( 
											'class' => array('rounded-circle', 'float-left') 
										) ); ?>
									<h5 style="margin-left: 70px;margin-bottom: 3px;"><a href="<?php the_author_url(); ?>"><?php the_author(); ?></a></h5>
									<p style="margin-left: 70px; margin-bottom: 0;">On <?php the_time('d/m/Y'); ?></p>
								</div>
								<div class="col">
									Bagikan :<div class="mb-1"></div>
									<a href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>&t=<?php the_title(); ?>" onclick="window.open('', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true" target="popupwindow" style="text-decoration: none;">
										<img src="<?php bloginfo('template_directory'); ?>/images/facebook-with-circle.svg" widht="32" height="32" />
									</a>
									<span class="mr-3"></span>
									<a href="http://twitter.com/intent/tweet?text=<?php the_title(); ?>&url=<?php the_permalink(); ?>" onclick="window.open('', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true" target="popupwindow" style="text-decoration: none;">
										<img src="<?php bloginfo('template_directory'); ?>/images/twitter-with-circle.svg" widht="32" height="32" />
									</a>
									<span class="mr-3"></span>
									<a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" onclick="window.open('', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true" target="popupwindow" style="text-decoration: none;">
										<img src="<?php bloginfo('template_directory'); ?>/images/google+-with-circle.svg" widht="32" height="32" />
									</a>
								</div>
							</div>
							<div class="row mt-4">
								<div class="col">
									<div class="figure-caption">Posting Sebelumnya</div>
									<?php next_post_link('%link') ?>		
								</div>
								<div class="col text-right">
									<div class="figure-caption">Posting Selanjutnya</div>
									<?php previous_post_link('%link') ?>
								</div>
							</div>
							<div class="border border-primary border-right-0 border-bottom-0 border-left-0 my-3"></div>
						<?php // end of looping wordpress
						comments_template();
						endwhile; wp_reset_query(); ?>
						</div>
					</div>
				</article>
				<?php get_sidebar(); ?>
			</div>
<?php get_footer(); ?>
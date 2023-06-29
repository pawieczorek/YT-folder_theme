<?php

get_header();
?>

<main id="primary" class="site-main">
		<!--container-->
		<div class="container">
			<!--row-->
			<div class="row">
				<!--col-lg-7-->
				<div class="col-lg-7">
					<?php
					$param = get_search_query();

					$args = array(
						'author'         => get_current_user_id(),
						'post_type'      => 'post',
						'search_title'   => $param,

						'posts_per_page' => -1,
						'post_status'    => 'publish',
						'orderby'        => 'title',
						'order'          => 'ASC',
					);

					$wp_query = new WP_Query( $args );

					if ( $wp_query->have_posts() ) :
						?>

						<header class="page-header">
							<h1 class="search-title">
								
								Search Results for: 
									<?php echo $param; ?> 
								
							</h1>
						</header><!-- .page-header -->

						<?php
						/* Start the Loop */
						while ( $wp_query->have_posts() ) :
							$wp_query->the_post();
							echo '<div class="col-md-12">';
							get_template_part( 'template-parts/content', get_post_type() );
							echo '</div>';

						endwhile;

						the_posts_navigation();

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;
					?>
				</div>
				<!--/col-lg-7-->
				
				<!--col-lg-5-->
				<!-- sidebar -->       
				<?php
				get_sidebar();
				?>
				<!-- /sidebar -->
				<!--/col-lg-5-->
			</div><!--/row-->
		</div><!--/container-->
</main><!-- #main -->

<?php

get_footer();

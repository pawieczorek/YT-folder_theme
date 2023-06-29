<?php

// author======================================================

if ( is_user_logged_in() ) {
	$author_id = strval( get_current_user_id() );
} else {
	$author_id = ADMIN_ID;
}

// query for videos of the current folder 

		$current_term = get_term( get_queried_object()->term_id );
		
		$the_query = new WP_Query(
			array(
				'post_type'   => 'post',
				'author'      => $author_id,
				'post_status' => array( 'publish' ),
				'tax_query'   => array(
					array(
						'taxonomy'         => TAXONOMY_T,
						'field'            => 'id',
						'terms'            => array( $current_term->term_id ),
						'include_children' => false,
					),
				),
			)
		);
		
		$url_folders = get_term_meta( $current_term->term_id, 'folder_path', true );

// template

get_header();
?>

	<main id="primary" class="site-main">
		<!--container-->
		<div class="container">
			<!--row-->
			<div class="row">

				<!--col-lg-7-->
				<div class="col-lg-7">
					<p class="folder-font folder-path">FOLDER: <?php echo $url_folders; ?></p>
					
					<?php
						// folders
						get_template_part( 'template-parts/content', 'folders' );
						// /folders
						echo '<p class="videos-font">VIDEOS</p>';
						if ( $the_query->have_posts() ) :
							
							while ( $the_query->have_posts() ) :
								$the_query->the_post();
								// videos
								echo '<div class="col-md-12">';
								get_template_part( 'template-parts/content', get_post_type() );
								echo '</div>';
								// /videos
							endwhile;

							the_posts_navigation();
						else :
							get_template_part( 'template-parts/content', 'none' );
						endif;
						wp_reset_postdata();
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

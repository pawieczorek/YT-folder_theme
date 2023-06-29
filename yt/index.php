<?php

// author

if ( is_user_logged_in() ) {
	$author_id = strval( get_current_user_id() );
} else {	
	$author_id = ADMIN_ID;
}

// query for current folder videos
		$the_query = new WP_Query(
			array(
				'post_type'      => 'post',
				'post_status'    => array( 'publish' ),
				'posts_per_page' => '-1',
				'tax_query'      => array(
					array(
						'taxonomy'         => TAXONOMY_T,
						'field'            => 'id',
						'terms'            => array( get_root_folder_id( $author_id ) ),
						'include_children' => false,


					),
				),
			)
		);

		
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
					<p class="folder-font">FOLDER: home</p>				
					<?php
					// folders
					get_template_part(
						'template-parts/content',
						'folders',
						array(
							'author' => $author_id,
						)
					);
					// videos
					echo '<p class="videos-font">VIDEOS</p>';

					if ( $the_query->have_posts() ) :

						
						while ( $the_query->have_posts() ) :
							$the_query->the_post();/* Iterate the post index in the loop. */
							// video
							echo '<div class="col-md-12">';
							get_template_part( 'template-parts/content', get_post_type() );
							echo '</div>';
						endwhile;

						the_posts_navigation();

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;

					wp_reset_postdata();
					?>
				</div>      
				<?php
				get_sidebar();
				?>
			</div><!--/row-->
		</div><!--/container-->
	</main><!-- #main -->

<?php
get_footer();

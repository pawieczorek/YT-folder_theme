<?php
	


if ( is_home() ) {
				$sub_terms = get_term_children( get_root_folder_id( $args['author'] ), TAXONOMY_T );

				

				$current_term = get_term( get_root_folder_id( $args['author'] ) );
}

if ( is_tax( TAXONOMY_T ) ) {
	$sub_terms = get_term_children( get_queried_object()->term_id, TAXONOMY_T );

	$current_term = get_term( get_queried_object()->term_id );
}




		$sub_terms = array_filter(
			$sub_terms,
			function( $term ) use ( &$current_term ) {
				$term = get_term( $term );

				if ( $term->parent == $current_term->term_id ) {
					return 1;
				} else {
					return 0;
				}
			}
		);

		if ( count( $sub_terms ) == 0 ) {
			$title_folders = '';

		} else {
			$title_folders = 'FOLDERS';
		}


		?>
<?php
echo '<p class="videos-font">' . $title_folders . ' </p>
		<!-- folders -->
		<div class="col-md-12">
			<div class="container-cards">';

foreach ( $sub_terms as $term ) {

	// folder link
	$term_link = get_term_link( $term );
	
	if ( is_wp_error( $term_link ) ) {
		continue;
	}
	// folder name
	$term_name = get_term( $term )->name;


	// folder image path
	// media image in set in DB as the post

	if ( ! function_exists( 'get_folder_image_by_title' ) ) {
		function get_folder_image_by_title( $image_title ) {
			global $wpdb;

			$query = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $wpdb->posts WHERE post_title = %s;", $image_title ) );

			return $query;
		}
	}


		$image_title = 'thumbnail-' . get_term( $term )->term_id;
		$query       = get_folder_image_by_title( $image_title );



		// folder image_path with attached image
	if ( $query != empty( array( 0 ) ) ) {
		$image_path = $query[0]->guid;

		// folder image_path with defalut image
	} else {

		$image_title = 'thumbnail-0';
		$query       = get_folder_image_by_title( $image_title );

		$image_path = $query[0]->guid;


	}
	
	echo '<div class="card">
								<img class="card-img-top" src="' . $image_path . '" alt="Card image cap">
								<div class="card-body">
									<h5 class="card-title typography-title">' . $term_name . '</h5>

										<a class="btn btn-primary card-t" href="' . esc_url( $term_link ) . '">open</a>
								</div>
							</div>';




}

		echo '
			</div>
		</div>
<!-- /folders -->';

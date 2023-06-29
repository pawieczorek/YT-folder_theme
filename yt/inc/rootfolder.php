<?php

/*
każdy user ma swoje oddzielne drzewo folderów z root folderem
tworzonym przy register taxonomy w plugin
 */
if ( ! function_exists( 'get_root_folder_name' ) ) :

	function get_root_folder_name( $user_id ) {

		// $user_login = wp_get_current_user()->user_login;

		$user_login = get_user_by( 'id', 1 )->user_login;

		$term_name = 'root_folder_' . $user_login;

		return $term_name;
	}

endif;

if ( ! function_exists( 'get_root_folder_id' ) ) :

	function get_root_folder_id( $user_id ) {

		// $user_login = wp_get_current_user()->user_login;

		$user_login = get_user_by( 'id', $user_id )->user_login;

		$term_name = 'root_folder_' . $user_login;
		

		$term_id = get_term_by( 'name', $term_name, TAXONOMY_T )->term_id;

		

		return $term_id;
	}

endif;

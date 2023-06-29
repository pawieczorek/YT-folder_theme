<?php


if ( get_current_user_id() == 0 ) {
	$display_user = '';
} else {
	$display_user = 'user: ' . wp_get_current_user()->display_name;
}

$query = new WP_Query( array( 'pagename' => 'contact' ) );
$contact_page_permalink = get_permalink( $query->queried_object_id );


$query = new WP_Query( array( 'pagename' => 'about' ) );
$contact_about_permalink = get_permalink( $query->queried_object_id );


?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	

	<!-- icons -->
	<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_stylesheet_directory_uri(); ?>/img/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_stylesheet_directory_uri(); ?>/img/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_stylesheet_directory_uri(); ?>/img/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_stylesheet_directory_uri(); ?>/img/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_stylesheet_directory_uri(); ?>/img/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_stylesheet_directory_uri(); ?>/img/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_stylesheet_directory_uri(); ?>/img/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_stylesheet_directory_uri(); ?>/img/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_stylesheet_directory_uri(); ?>/img/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri(); ?>/img/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo get_stylesheet_directory_uri(); ?>/img/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon-16x16.png">
	<link rel="manifest" href="<?php echo get_stylesheet_directory_uri(); ?>/img/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="<?php echo get_stylesheet_directory_uri(); ?>/img/ms-icon-144x144.png">
	

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
wp_body_open();

?>
<div id="page" class="site">
	<div class="wrapper">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'YTfolders' ); ?></a>

	<header id="masthead" class="site-header">
		
	<div>
					<div class="container">
						<div class="row single">
							<!-- bootstrap navbar -->
							<nav style="background-color:blue; color:white; "
								class="navbar navbar-expand-lg navbar-light bg-light">
								<button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse"
									data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
									aria-label="Toggle navigation">
									<span class="navbar-toggler-icon"></span>
								</button>
								<div style="justify-content: center" class="collapse navbar-collapse" id="navbarNav">
									<ul class="navbar-nav">
										<li class="nav-item">
											<a class="nav-link single" href="<?php echo home_url(); ?>">Home</a>
										</li>
										<li class="nav-item">
											<a class="nav-link single" href="<?php echo $contact_about_permalink; ?>">About</a>
										</li>
										<li class="nav-item">
											<a class="nav-link single" href="<?php echo $contact_page_permalink; ?>">Contact</a>
										</li>
									</ul>
									<p class="user-in-navbar"><?php echo $display_user; ?></p>
								</div>
							</nav>
							<!-- bootstrap navbar  end-->
						</div>
					</div>
				</div>

	</header><!-- #masthead -->

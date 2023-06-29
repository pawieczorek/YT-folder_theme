<?php

get_header();

$yt_image            = get_the_post_thumbnail_url();
$video_url           = get_post_meta( get_the_ID(), 'video_url' )[0];
$video_posted_on     = get_the_date();

?>

<div id="page" class="site">

	<!--wrapper-->
	<div class="wrapper">
		<!--main------------------------------------------------>
		<main id="content">
			<div class="container single">
				<div class="row">
					<div class="col-lg-12">
						<div class="row single">
							<div class="col-lg-12">
								<div class="bs-blog-post single">
									<!-- category, title, thumbnail -->
									<div class="bs-header">
											<!-- category -->
											<div class="bs-blog-category justify-content-start">
												<p class="category"
													href="http://localhost/YT-folder/index.php/category/bez-kategorii/"
													alt="View all posts in Bez kategorii">
													V i d e o
												</p>
											</div>
											<!-- title -->
											<h1 class="title">
												<?php echo the_title(); ?>
											</h1>
											<!-- thumbnail -->
											<img class="bs-blog-thumb" src="<?php echo $yt_image?>" class="" alt=""
												decoding="async" />
									</div>
									<!-- author -->
									<div class="meta-container single">
											<div class="bs-blog-meta single">
												<span class="bs-author"><p class="auth">
														<img alt=''
															src='http://2.gravatar.com/avatar/20ed214274abc40b8a881545a93b525b?s=150&#038;d=mm&#038;r=g'
															srcset='http://2.gravatar.com/avatar/20ed214274abc40b8a881545a93b525b?s=300&#038;d=mm&#038;r=g 2x'
															class='avatar avatar-150 photo' height='150' width='150'
															loading='lazy' decoding='async' />piotr</p> </span>
												<span><p>| <?php echo $video_posted_on?></p></span>
											</div>
											<div>
												<a class="yt-link" href="<?php echo $video_url?>" target="_blank" >watch on youTube</a>
											</div>
									</div>
									<!-- article -->
									<article class="typography-title single">
										<!-- <textarea> -->
										<?php echo wpautop(get_the_content()); ?>
										<!-- </textarea> -->
									</article>
								</div>
							</div>
						</div>
					</div>
				</div><!--/row-->
			</div><!--/container-->
		</main>
		<!--/main------------------------------------------------>



		
		
	</div>

<?php
// get_sidebar();
get_footer();

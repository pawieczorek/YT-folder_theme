<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package YTfolders
 */



// $source              = get_stylesheet_directory_uri() . '/img/city.jpg';
$yt_image            = get_the_post_thumbnail_url();
$video_url           = get_post_meta( get_the_ID(), 'video_url' )[0];
$link_to_single_page = esc_url( get_permalink() );
$video_posted_on     = get_the_date();
$author              = get_the_author();
?>


<div class="bs-blog-post in-list">
											<!-- thumbnail -->
											<div class="bs-blog-thumb lg back-img"
												style="background-color: black;">
												<a href="#" class="link-div"></a>

												<img src='<?php echo $yt_image; ?>' alt=''/>
											</div>
											<!-- article -->
											<article class="">
												<!-- category -->
												<div class="bs-blog-category">

													<p class="category">
														video
													</p>
												</div>
												<!-- title -->
												<a class="typography-title" href="<?php echo $link_to_single_page; ?>"><?php echo the_title(); ?></a>
												<!-- meta-container -->
												<div class="meta-container">
													<!-- author -->
													<div class="bs-blog-meta">
														<span class="bs-author"><p class="auth">
																<img alt=''
																	src='http://2.gravatar.com/avatar/20ed214274abc40b8a881545a93b525b?s=150&#038;d=mm&#038;r=g'
																	srcset='http://2.gravatar.com/avatar/20ed214274abc40b8a881545a93b525b?s=300&#038;d=mm&#038;r=g 2x'
																	class='avatar avatar-150 photo' height='150'
																	width='150' loading='lazy'
																	decoding='async' /><?php echo $author; ?></p></span> </span>
														<span><p>| <?php echo $video_posted_on; ?></password_get_info></span>
													</div>
													<!-- yt-link -->
													<div>
														<a class="yt-link" href="<?php echo $video_url; ?>" target="_blank"  >watch on youTube</a>
													</div>
												</div>
											</article>
</div>

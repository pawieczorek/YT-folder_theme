<?php

// 3 latest posts by current user

$args = array(
	'author'         => get_current_user_id(),
	'post_type'      => 'post',
	'posts_per_page' => 3,
	'post_status'    => 'publish'
);


$the_query = new WP_Query( $args );

?>
<aside class="col-lg-5">
<div class="bs-sidebar sticky-top">
	<div id="block-2" class="bs-widget widget_block widget_search">
		<form role="search" method="get" action="http://localhost/YT-folder/"
			class="search-button">
			<label for="search-label" class="search-label">Search</label>
			<div class=""><input type="search" id="" class="search-t" name="s" value=""
					placeholder="" required /><button type="submit"
					class="search-t">Search</button>
			</div>
		</form>
	</div>
	<div id="block-3" class="bs-widget">
		<div class="">
			<div class="">
				<?php
				if ( $the_query->have_posts() ) {
					echo '<h2>latest videos</h2>';
				}
				?>
				<ul>
					<?php
					while ( $the_query->have_posts() ) :
						$the_query->the_post();
						// Display the Post Title with Hyperlink
						?>
						<li><a class="typography-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
						<?php	
					endwhile;
					wp_reset_postdata();
					?>
				</ul>
			</div>
		</div>
	</div>
</div>
</aside>

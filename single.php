<?php get_header(); ?>
  <!-- main start -->
  <div id="main" class="clearfix">
    <div class="inner clearfix">
      <div id="content" class="clearfix">
        <?php include('parts/breadcrumbs.php'); ?>
        <?php $author_id=$post->post_author; ?>
        <div class="ct_article_detail clearfix">
	        <?php
				if ( have_posts() ) :
				  	while ( have_posts() ) : the_post();

				    	$my_excerpt = get_the_excerpt();
						
						
						$firstname = get_the_author_meta( 'user_firstname' );
                		$lastname = get_the_author_meta( 'user_lastname' );
                		$profile_fullname = get_field('profile_fullname', 'user_'. $author_id);
                		$title_work = get_field('title_of_work', 'user_'. $author_id);

                		//editor information
              			$editor_gallery = get_field('profile_picture', 'user_'. $author_id);
						$editor_avatar_url = $editor_gallery[0]['sizes']['img_avatar'];

            			//post thumbnail
			            $thumb = get_post_thumbnail_id();
			            $img_blog = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'img_blog_thumbnail');
			            $img_blog_src = $img_blog[0];
			            $img_blog_w = $img_blog[1];
			            $img_blog_h = $img_blog[2];
			            $img_caption = get_post(get_post_thumbnail_id($post->ID))->post_excerpt;
			            $img_refer_url = get_post(get_post_thumbnail_id($post->ID))->post_content;
			?>
			<p class="article_detail_date">
          		<?php the_time('Y年n月j日'); ?>更新<?php echo do_shortcode('[post-views]'); ?>
          		<span class="like_heart"><?php if( function_exists('zilla_likes') ) zilla_likes(); ?></span>
          	</p>
         	<p class="article_detail_title"><?php the_title(); ?></p>
         	<?php include('parts/social-top.php') ?>
          		<div class="article_detail_box_cm clearfix">
          			
		            <div class="article_detail_cm_pop clearfix">
		               <?php if ( ! has_excerpt() ) {
						      echo '';
						} else { 
						      the_excerpt();
						} ?>
		            </div>
		            <div class="article_detail_cm_au clearfix">
		              <p class="cm_img">
		                <?php if($editor_avatar_url!='') { ?>
					  		<a href="<?php echo get_author_posts_url( $author_id); ?>"><img src="<?php echo $editor_avatar_url; ?>" width="96" height="96" alt="<?php echo $profile_fullname; ?>"></a>
						<?php } else { ?>
							<a href="<?php echo get_author_posts_url( $author_id); ?>"><img src="<?php bloginfo('template_url'); ?>/images/dummy96x96.jpg" width="96" height="96" alt="<?php echo $profile_fullname; ?>"></a>
						<?php } ?>
		              </p>
		              <p class="cm_aname"><?php echo $profile_fullname; ?></p>
		              <p class="cm_pos"><?php echo $title_work; ?></p>
		            </div>
		         </div>
           

			<?php
			// ---------------- Show Video if it was uploaded / Show thumbnail ------------------------
				$self_video = get_field( "self_video");
				$youtube_url = get_field( "youtube_url");
				$vimeo_url = get_field( "vimeo_url");

				$choose_video_to_display = get_field( "choose_video_to_display");

				if($self_video=="" && $youtube_url=="" && $vimeo_url=="") {
					if(has_post_thumbnail()) { ?>
			            <div class="center">
			             	<div class="featured_picture" style="width: <?php echo $img_blog_w; ?>px;">
			             		<img src="<?php echo $img_blog_src; ?>" alt="<?php echo get_the_title(); ?>" data-width="<?php echo $img_blog_w; ?>" data-height="<?php echo $img_blog_h; ?>" >
			             		<?php if(isset($img_refer_url) && $img_refer_url!=''){ ?>
			             			<div class="desc" style="width: <?php echo $img_blog_w; ?>px;">
			             				<span>写真引用元： <a href="<?php echo $img_refer_url; ?>"><?php echo $img_refer_url; ?></a></span>
			             			</div>
			             		<?php } ?>
			             		<?php if(isset($img_caption) && $img_caption!='') { ?>
			             		<p class="pic_description" style="width: <?php echo $img_blog_w; ?>px;">
			             			▲<?php echo $img_caption; ?></p>
			             		<?php } ?>
			             	</div>
			            </div>
            <?php   } // end check post thumbnail
				} else {  // else: check has video or not ?>
					<div class="video_section">
				<?php if($choose_video_to_display == "your-video") {
						// 1.0 Self Hosted Video
						if($self_video!="") { ?>
							<video width="100%" height="auto" controls>
							  	<source src="<?php echo $self_video; ?>" type="video/mp4">
							  	Your browser does not support the video tag.
							</video>		
						<?php } 
					}
					
					if($choose_video_to_display == "vimeo") {
						// 1.1 Vimeo
		                if(preg_match('/https:\/\/(www\.)*vimeo\.com\/.*/',$vimeo_url)){ ?>
		            		<iframe src="https://player.vimeo.com/video/57399324" width="100%" height="auto" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
		            	<?php } 
		            }

		            if($choose_video_to_display == "youtube") {
		            	// 1.2 Youtube 
		            	if(preg_match('/https:\/\/(www\.)*youtube\.com\/.*/',$youtube_url)){ ?>
		            		<iframe width="100%" src="https://www.youtube.com/embed/jovTHH9yrHY" frameborder="0" allowfullscreen></iframe>
		           		 <?php } 
		            } ?>
	            	</div> 
	            <?php }  // end: check has video or not ?>
			
	        <?php the_content(); ?>

			<?php

				$post_objects = get_post_meta( $post->ID, '_traijing_post_multicheckbox', true );

				if( $post_objects ): ?>

				    <?php foreach( $post_objects as $post):
				    	setup_postdata($post);
				     		$time = get_the_date('Y.m.d', $post->ID);
							$img_other_blogs = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'img_other_blogs');
							$img_other_blogs_src = $img_other_blogs[0];
							setup_postdata($post); ?>
							<div class="other_articles">
								<div class="list_latestpost_sb_img">
									<p>
										<a href="<?php echo get_permalink($post->ID); ?>">
											<?php //get featured image
											if ( has_post_thumbnail($post->ID) ) { ?>
												<img src="<?php echo $img_other_blogs_src; ?>" alt="<?php echo get_the_title($post->ID); ?>"  />
											<?php } else { ?>
												<img src="<?php echo get_bloginfo('template_url'); ?>/images/dummy92x70.jpg">
											<?php } ?>
										</a>
									</p>
								</div>
								<div class="list_latestpost_sb_ct">
									<p class="list_latestpost_sb_title">
									<a href="<?php echo get_permalink($post->ID); ?>">
										<?php echo get_the_title($post->ID); ?></a>
									</p>
									<p class="list_latestpost_sb_date"><?php echo $time; ?></p>
								</div>
							</div>
				    <?php endforeach; ?>

				    <?php wp_reset_postdata(); ?>
				<?php endif; ?>



        <?php endwhile;
		  		else :
		  endif;
		?>
        <!-- end ct_article_detail --></div>
		<?php include('parts/social-bottom.php') ?>
        <?php include('parts/related-posts.php'); ?>

        <!-- start : adsense_area_box -->
        <div class="adsense_area_box clearfix">
          <div class="adsense_box clearfix"> 1 </div>
          <div class="adsense_box clearfix"> 2 </div>
        </div>
        <!-- end : adsense_area_box -->

        <!-- start : related_author-->
        <?php include('parts/other-authors.php'); ?>
        <!-- end : related_author-->

      </div>
      <!-- start : #navi -->
      <?php get_sidebar(); ?>
      <!-- end : #navi -->
    </div>
  </div>

  <!-- main end -->
<?php get_footer();?>

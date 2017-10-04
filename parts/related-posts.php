<?php 
  /**
   * Load Related posts of current post
  */
?>
<!-- start : related_box_out -->
<div class="related_box_out clearfix">
  <p class="ptitle_01">おすすめ記事</p>
  <div class="list_c01 clearfix">
      <?php 

        $id = get_the_ID();
        $query_args = array(
            'post_type' => 'post',
            'post__not_in' => array($id),
            'posts_per_page' => 6,
            'orderby' => date,
            'order' => desc,
            'ignore_sticky_posts' => 1
          );
        $the_query = new WP_Query( $query_args ); 
        if ( $the_query->have_posts() ) : 
          while ( $the_query->have_posts() ) : $the_query->the_post();
            $time = get_the_date('Y.m.d', $post->ID);
            $title = get_the_title($post->ID);
            $nd = get_the_content();
            $id = get_the_ID();
            $img_blog = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'img_blog_index');
            $img_blog_src = $img_blog[0];

            $author_id = $post->post_author;
            $profile_fullname = get_field('profile_fullname', 'user_'. $author_id);
            $editor_gallery = get_field('profile_picture', 'user_'. $author_id);
            $editor_avatar_url = $editor_gallery[0]['sizes']['img_author_tiny'];

            $d1 = new DateTime( get_the_date('Y-m-d', $post->ID));
            $d2 = new DateTime(date('Y-m-d'));

            $interval = $d1->diff($d2);
            $diff = $interval->format('%a');
          ?>
          <div class="col3 col clearfix">
            <div class="col_inner clearfix">
              <div class="plist_info clearfix">
                <p class="pimg01">
                  <a href="<?php echo get_permalink($id); ?>">
                    <?php if(has_post_thumbnail()) { ?>
                      <img src="<?php echo $img_blog_src; ?>" alt="<?php the_title(); ?>">
                    <?php } else { ?>
                      <img src="<?php bloginfo('template_url'); ?>/images/dummy323x200.jpg" alt="<?php the_title(); ?>">
                    <?php } ?>
                  </a>
                  <?php if($diff<3){ ?>
                    <span><img src="<?php bloginfo('template_url'); ?>/images/icon_new01.png" alt="<?php the_title(); ?>"></span>
                  <?php } ?>
                </p>
                <div class="pl_bottom">
                  <p class="pl_auther">
                    <span>
                      <?php if($editor_avatar_url =="") { ?>
                          <img src="<?php bloginfo('template_url'); ?>/images/dummy28x28.jpg" width="28" height="28" alt="<?php echo $profile_fullname; ?>">
                        <?php } else { ?>
                          <img src="<?php echo $editor_avatar_url; ?>" width="28" height="28" alt="<?php echo $profile_fullname; ?>">
                        <?php } ?>
                      </span>
                    <?php echo $profile_fullname; ?>
                  </p>
                  <p class="pl_date"><?php echo $time; ?></p>
                </div>
              </div>
              <p class="pl_title"><a href="<?php echo get_permalink($post->ID); ?>"><?php  echo $title; ?></a></p>
            </div>
          </div>
          <?php endwhile; ?>
          <!-- end of the loop -->
        <?php wp_reset_postdata(); ?>

        <?php else:  ?>
          <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
        <?php endif; ?>
      
  </div>
</div>
<!-- end : related_box_out --> 



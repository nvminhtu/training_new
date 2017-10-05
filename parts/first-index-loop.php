<div id="idx_ct01" class="clearfix">
  <div class="inner clearfix">
  <div class="content">
    <div class="content01 clearfix">
      <!-- 01.banner management -->
      <?php
        $banner_top_title = get_field( 'banner_top_title','option');
        $banner_picture_upload = get_field( 'banner_picture_upload','option');
        $banner_picture_url = get_field( 'homepage_banner_link','option');

        if( $banner_top_title ) { ?>
          <div class="topic_path clearfix">
            <ul>
              <li><?php echo $banner_top_title; ?></li>
            </ul>
          </div>
        <?php }
        if( $banner_picture_upload ) { ?>
          <div class="ct_bnr01">
            <p><a href="<?php echo $banner_picture_url; ?>"><img src="<?php echo $banner_picture_upload; ?>" alt=""></a></p>
          </div>
        <?php }
      ?>
      <!-- end 01.banner management -->

      <!-- 02.loop posts -->
      <div class="list_c01 clearfix">
        <?php
          global $post;
          global $wp_query;
          global $numposts;

          $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

          $args = array(
            'post_type' => 'post',
            'posts_per_page' => 6,
            'orderby' => date,
            'order' => desc,
            'paged' => $paged
          );

          $the_query = new WP_Query( $args );
          $number_blogs = $wp_query->found_posts;

          $blog_posts = get_posts($args);
          if($blog_posts) {

          $i=1;
          foreach($blog_posts as $post) : setup_postdata($post);

            $thumb = get_post_thumbnail_id();
            $img_blog = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'img_blog_index');
            $img_blog_src = $img_blog[0];
            $img_archive_blog_src = $img_archive_blog[0];

            $time = get_the_date('Y.m.d', $post->ID);
            $nd = get_the_content();
            $id = get_the_ID();

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
                    <a href="<?php the_permalink(); ?>"><?php if ( has_post_thumbnail() ) { ?>
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
                      </span><?php echo $profile_fullname; ?>
                    </p>
                    <p class="pl_date"><?php echo $time; ?></p>
                  </div>
                </div>
              <p class="pl_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
            </div>
          </div>
          <?php $i++;
               endforeach;

              wp_reset_query();
            wp_reset_postdata();
          }
        ?>
      </div>
      <!-- 02.end loop posts -->
    </div>
    
    <div class="content02 clearfix">
      <!-- 01. categories list here -->
      <div class="col_cate01 clearfix">
        <dl>
          <dt>カテゴリー</dt>
          <dd>
            <ul>
              <li class="c01"><a href="<?php bloginfo('url'); ?>">
                <span><img src="<?php bloginfo('template_url'); ?>/images/icon_cate01.png"></span>
                ホーム</a>
              </li>
              <?php
                $categories = get_categories( array(
                    'orderby' => 'name',
                    'order'   => 'ASC',
                    'exclude' =>array(1), //don't load uncategorized 
                    'hide_empty' =>  FALSE
                ) );
                foreach( $categories as $category ) { ?>
                  <li>
                    <span>
                      <?php $img_arr = get_field('category_image',  'category_'.$category->term_id); ?>
                      <img src="<?php echo $img_arr['url']; ?>">
                    </span>
                    <a href="<?php echo get_category_link( $category->term_id ); ?>"><?php echo $category->name; ?></a>
                  </li>
                <?php 
              }
            ?>
            </ul>
          </dd>
        </dl>
      </div>
      <!-- end 01.categories list here -->

      <!-- 02.list all posts here -->
      <div class="col_pickup clearfix">
        <p class="title_pickup"><span>Pick Up</span>ピックアップ</p>
        <div class="list_pickup clearfix">
          <?php 
            $paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
            $query_args = array(
                'post_type' => 'post',
                'posts_per_page' => 10,
                'paged' => $paged,
                'page' => $paged
              );
            $the_query = new WP_Query( $query_args ); 
            if ( $the_query->have_posts() ) : 
              while ( $the_query->have_posts() ) : $the_query->the_post();
                $time = get_the_date('Y.m.d', $post->ID);
                $nd = get_the_content();
                $id = get_the_ID();
                $img_blog = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'img_blog_index_second');
                $img_blog_src = $img_blog[0];

                $author_id = $post->post_author;
                $profile_fullname = get_field('profile_fullname', 'user_'. $author_id);
                $editor_gallery = get_field('profile_picture', 'user_'. $author_id);
                $editor_avatar_url = $editor_gallery[0]['sizes']['img_author_tiny'];
              ?>
              <div class="pickup_box clearfix">
                <div class="pickup_box_sb_img">
                  <p>
                    <a href="<?php the_permalink(); ?>">
                      <?php if(has_post_thumbnail()) { ?> 
                         <img src="<?php echo $img_blog_src; ?>" alt="<?php the_title(); ?>">
                      <?php } else { ?>
                          <img src="<?php bloginfo('template_url'); ?>/images/dummy100x100.jpg" alt="">
                      <?php } ?>
                      <?php echo do_shortcode('[post-views]'); ?>
                    </a>
                  </p>
                </div>
                <div class="pickup_box_sb_ct">
                  <p class="pickup_box_sb_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                  <div class="pickup_box_sb_info">
                    <p class="pl_auther">
                      <span>
                        <?php if($editor_avatar_url =="") { ?>
                          <img src="<?php bloginfo('template_url'); ?>/images/dummy28x28.jpg" width="28" height="28" alt="<?php echo $profile_fullname; ?>">
                        <?php } else { ?>
                          <img src="<?php echo $editor_avatar_url; ?>" width="28" height="28" alt="<?php echo $profile_fullname; ?>">
                        <?php } ?>
                      </span><?php echo $profile_fullname; ?>
                    </p>
                    <p class="pl_date"><?php echo $time; ?></p>
                  </div>
                </div>
              </div>
              <?php endwhile; ?>
              <!-- end of the loop -->

              <!-- mt: pagination here -->
              <?php
                if (function_exists(custom_index_pagination)) {
                  custom_index_pagination($the_query->max_num_pages,"",$paged);
                }
              ?>
              <!-- mt: end pagination here -->

            <?php wp_reset_postdata(); ?>

            <?php else:  ?>
              <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
            <?php endif; ?>
        </div>
      </div>
      <!-- 02.end list all posts here -->
  
    </div>
   </div>
     <div class="navi clearfix">
                <!-- Sidebar FrontPage Top -->
                <div class="navi01 clearfix">
                  <?php dynamic_sidebar( 'Homepage Widget Top' ); ?>
                  
                  
                </div>
                <!-- End Sidebar FrontPage Top -->
                
                  <!-- Sidebar FrontPage Bottom -->
                <div class="navi02 clearfix">
                  <?php dynamic_sidebar( 'Homepage Widget Bottom' ); ?>
                </div>
                <!-- Sidebar FrontPage Bottom -->
     </div>
    

  </div>
</div>

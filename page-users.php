<?php
/**
 * Template Name: User List
 * @package WordPress
 * @subpackage Traijing
 * @since Traijing
 * Content will be gotten from admin editor
 */ ?>
 <?php get_header(); ?>

  <!-- main start -->
  <div id="main" class="clearfix">
    <div class="inner clearfix">
      <div id="content" class="clearfix">
        <h2 class="ttl_h201">アウトシーカーズ 一覧</h2>
    		  <div class="ct_article_box clearfix">
              <div class="ct_article_list_out clearfix"> 
              	<div class="list_author01 clearfix">
                  <?php 
                    $no=8;// total no of author to display
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    if($paged==1){
                          $offset=0;  
                    } else {
                       $offset= ($paged-1)*$no;
                    }
                    $users = array('Editor','Author');
                    $args = array(
                        'role' => '',
                        'number' => $no, 
                        'offset' => $offset
                     );
                    $user_query = new WP_User_Query( $args );
                    if ( !empty( $user_query->results ) ) {
                        foreach ( $user_query->results as $user ) { 
                            //get information of user
                            $author_id = $user->ID;
                            $firstname = get_the_author_meta( 'user_firstname',$author_id );
                            $lastname = get_the_author_meta( 'user_lastname', $author_id );
                            $fullname = $lastname.' '.$firstname;
                            $nicename = get_the_author_meta( 'user_nicename', $author_id );
                            $profile_fullname = get_field( 'profile_fullname', 'user_'. $author_id );
                            $description = get_field('description', 'user_'. $author_id);
                            $focus_topic = get_field('focus_topic', 'user_'. $author_id);
                            $title_of_work = get_field('title_of_work', 'user_'. $author_id);
                            $company = get_field('company', 'user_'. $author_id);
                            $editor_gallery = get_field('profile_picture', 'user_'. $author_id);
                            $editor_avatar_url = $editor_gallery[0]['sizes']['img_avatar'];
                           ?>
                            <div class="list_author01_ct clearfix">
                            <a href="<?php echo get_author_posts_url($author_id); ?>">
                                <p class="list_author01_img">
                                  <?php if($editor_avatar_url!='') { ?>
                                    <img src="<?php echo $editor_avatar_url; ?>" width="250" height="250" alt="<?php echo $profile_fullname; ?>">
                                  <?php } else { ?>
                                  <img src="<?php bloginfo('template_url'); ?>/images/dummy250x250.jpg" width="250" height="250" alt="<?php echo $profile_fullname; ?>">
                                  <?php } ?>
                                </p>
                              <p class="list_author01_name"><?php echo $profile_fullname; ?></p>
                               <p class="list_author01_pos"><?php echo $title_of_work; ?><br><?php echo $company; ?></p>
                            </a>
                          </div>
                        <?php }
                    }
                    else {
                      //No user found
                    } 
                    
                  ?>
                
                </div>
    			
                <?php 
                  // Pagination go here
                  $total_user = $user_query->total_users;  
                  $total_pages = ceil($total_user/$no);
                  custom_pagination($total_pages);
                ?>
    			</div>
        </div>
      </div>
     <?php get_sidebar(); ?>
    </div>
  </div>
  
  <!-- main end -->

 <?php get_footer(); ?>
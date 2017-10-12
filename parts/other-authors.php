<?php 
  /***
   ** Load other Authors
  ***/
?>
<div class="related_auther clearfix mt30">
  <p class="ptitle_02">アウトシーカーズ</p>
  <?php 
    // Create the WP_User_Query object
    $author_id = $post->post_author;

    $wp_user_query = new WP_User_Query(array (
        'role' => '',
        'order' => 'ASC',
        'orderby' => 'display_name'
    ));

    // Get the results
    $user_data = $wp_user_query->get_results();

    // Looping managers
    if (!empty($user_data)) {
        echo '<div id="slide_torejin">';
        foreach ($user_data as $user) {
            // get all the user's data
            $user_info = get_userdata($user->ID);
            $user_id = $user->ID;
            $firstname = $user_info->first_name;
            $lastname = $user_info->last_name;
            $fullname = $lastname.' '.$firstname;
            $profile_fullname = get_field( 'profile_fullname', 'user_'. $user->ID);

            //editor information
            $editor_avatar = get_field('profile_avatar', 'user_'. $user->ID);
            $editor_avatar_url = $editor_avatar[sizes]['img_avatar'];

            echo '<div class="torejin_bx01">';
         ?>
            <p class="torejin_img">
              <a href="<?php echo get_author_posts_url( $user_id); ?>">
                <?php if($editor_avatar_url!='') { ?>
                  <img src="<?php echo $editor_avatar_url; ?>" alt="<?php echo $profile_fullname; ?>" />
                <?php } else { ?>
                  <img src="<?php bloginfo('template_url'); ?>/images/dummy130x130.jpg" />
                <?php } ?>
              </a>
            </p>
            <p class="torejin_name"><?php echo $profile_fullname; ?></p>
         <?php   
            echo '</div>';
        }
        echo '</div>';
    } else {
        echo 'No other users found';
    }
?>
  <p class="btn03 btn"><a href="<?php bloginfo('url'); ?>/user-list/">メンバー 一覧</a></p>
</div>
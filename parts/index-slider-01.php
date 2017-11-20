<div id="main_visual" class="clearfix">
    <div class="inner clearfix">
        <?php 
           $pc_slider = get_field( 'homepage_pc_slider','option');
           $sp_slider = get_field( 'homepage_sp_slider','option');
 		 	if ( wp_is_mobile() ) {
				echo do_shortcode($sp_slider);
			} else {
				echo do_shortcode($pc_slider);
			}
        ?>
      </div>
  </div>
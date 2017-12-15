  <div id="main_visual" class="clearfix">
	<?php 
       $pc_slider = get_field( 'homepage_pc_slider','option');
       $sp_slider = get_field( 'homepage_sp_slider','option');
		/* sidebar will show in desktop/tablet but not mobile device */
		if( my_wp_is_mobile() ) { 
			echo do_shortcode($sp_slider);
		} else { ?>
			<div class="inner clearfix">
				<?php echo do_shortcode($pc_slider); ?>
			</div>
	<?php } ?>
  </div>
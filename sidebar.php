<?php 
  /*****
  ***** Sidebar for all sub and under pages
  *****/ 
?>
<div id="navi" class="navi clearfix">
    <?php dynamic_sidebar( 'Sidebar Widget' ); 
	echo '<div id="sidebar-widget-sticky">';
	 dynamic_sidebar( 'Sidebar Widget Sticky' );
	 echo '</div>';
	 ?>
    
    
    
<!-- end : #navi --> </div>
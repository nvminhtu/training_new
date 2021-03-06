<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja" xml:lang="ja">
<head>
<title><?php wp_title(' - ', true, 'right'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/favicon.ico" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<meta name="format-detection" content="telephone=no">
<link href="<?php bloginfo('template_url'); ?>/css/fonts.css" rel="stylesheet" type="text/css" />
<link  href="<?php bloginfo('template_url'); ?>/css/font-awesome.css" rel="stylesheet" type="text/css" />
<link href="<?php bloginfo('template_url'); ?>/style.css" rel="stylesheet" type="text/css" />
<link href="<?php bloginfo('template_url'); ?>/css/styles.css" rel="stylesheet" type="text/css" />
<link href="<?php bloginfo('template_url'); ?>/css/menu.css" rel="stylesheet" type="text/css" />

<?php if(!(is_front_page()||is_home())) { ?>
<link href="<?php bloginfo('template_url'); ?>/css/under.css" rel="stylesheet" type="text/css" />
<?php } ?>
<link href="<?php bloginfo('template_url'); ?>/css/responsive.css" rel="stylesheet" type="text/css" />

<?php if(!(is_front_page()||is_home())) { ?>
<link href="<?php bloginfo('template_url'); ?>/css/under_responsive.css" rel="stylesheet" type="text/css" />
<?php } ?>


<script src="<?php bloginfo('template_url'); ?>/js/jquery.js" type="text/javascript"></script>

        <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/ResizeSensor.js"></script>
        <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/theia-sticky-sidebar.js"></script>
        
        
<script src="<?php bloginfo('template_url'); ?>/js/custom_slider.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_url'); ?>/js/jquery.scroll.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_url'); ?>/js/common.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_url'); ?>/js/jquery.fitvids.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/jquery.bxslider.js"></script>
<link href="<?php bloginfo('template_url'); ?>/css/jquery.bxslider.css" rel="stylesheet" />
<script src="<?php bloginfo('template_url'); ?>/js/jquery.easing.min.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_url'); ?>/js/scroll_navi.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_url'); ?>/js/heightLine.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_url'); ?>/js/top.js" type="text/javascript"></script>



        
        

<?php //if is article detail
	if(is_singular()||is_author()) { ?>
<script src="<?php bloginfo('template_url'); ?>/js/slide_editor.js" type="text/javascript"></script>
<link href="<?php bloginfo('template_url'); ?>/css/owl.carousel.css" rel="stylesheet" type="text/css" />
<script src="<?php bloginfo('template_url'); ?>/js/owl.carousel.js" type="text/javascript"></script>
<?php } ?>

<?php if(!(is_front_page()||is_home())) { ?>
	<script src="<?php bloginfo('template_url'); ?>/js/user-gallery.js" type="text/javascript"></script>
<?php } ?>
<?php wp_head(); ?>
<link rel="SHORTCUT ICON" href="<?php bloginfo('template_url'); ?>/images/favicon.ico" />
</head>
<?php
	//check is page under
	$custom_class = "";
	$custom_id = "";
	
	if(is_front_page()||is_home()) {
		$custom_id = "index";
	} else {
		$custom_class = "under traijing_article_list";
	}
?>
<body id="<?php echo $custom_id; ?>" class="<?php echo $custom_class; ?>">
<div id="wrapper">
  	<div id="header" class="clearfix">
    	<div class="inner clearfix">
	      <p id="logo"><a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt=""></a></p>
	      <?php if(!(is_front_page()||is_home())) { ?>
	      <!-- Gnavi start -->
	      <div id="gnavi" class="clearfix">
	        <?php 
	        	$defaults = array(
					'theme_location'  => 'top-menu'
				);

				wp_nav_menu( $defaults );
	        ?>
	        
	      </div>
	      <!-- Gnavi end -->
	      <?php } ?>
	       <div class="head_search">
				 <div class="icon-search-container" data-ic-class="search-trigger"><span class="fa fa-search"></span>
		        	<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
						<input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" class="search-input" data-ic-class="search-input" placeholder="Search"/>
						<span class="fa fa-times-circle" data-ic-class="search-clear"></span>
					</form>
		        </div>
	      </div>
	      <!-- SP -->
	      <div id="btn_menu"><a href="javascript:void(0)">
	        <div id="nav-icon" class=""> <span></span> <span></span> <span></span> <span></span></div>
	        </a></div>
	    </div>
    
	    <!-- nav for SP -->
	     <div id="nav_gmenu_sp">
	     	<?php 
	        	$defaults = array(
					'theme_location'  => 'top-menu',
					'menu_class'      => 'nav_menu_sp'
				);

				wp_nav_menu( $defaults );
	        ?>
	        <div class="search_nav clearfix">
		        <div class="search_nav_inner">
		        	<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
		          		<input type="text" value="<?php echo get_search_query(); ?>" name="s" class="" placeholder="Search" />
		          		<input type="submit" id="btn_search_nav" value="Search">
		          	</form>
		        </div>
		     </div>
	    </div>
	    <!-- nav for SP -->
  	</div>
<style type="text/css">
<?php $body = ot_get_option('bodycolor', array()); $navigationfont = ot_get_option('navigation_font', array()); $secondnavfont = ot_get_option('second_navigation'); $accentcolor = ot_get_option('accent_color'); $page_title = ot_get_option('page_title'); $h1 = ot_get_option('h1');$h2 = ot_get_option('h2');$h3 = ot_get_option('h3');$h4 = ot_get_option('h4');$h5 = ot_get_option('h5');?>
<?php if($body) { ?>body {<?php if($body['background-image'] != '') { ?>background: url(<?php echo $body['background-image'] ?>); <?php } ?>  <?php if($body['background-color'] != '') { ?>background-color: <?php echo $body['background-color'].";"; ?> <?php } ?><?php if($body['background-repeat'] != '') { ?>background-repeat: <?php echo $body['background-repeat'].";"; ?><?php } ?>}<?php } ?>
<?php if(ot_get_option('headeropacity') != 'enabled') { ?>.sub-menu, .header-opacity {opacity: 1;background: #1f0c05;} <?php } ?>
<?php if(ot_get_option('headercolor') != '') { ?>.sub-menu, .header-opacity {background-color: <?php echo ot_get_option('headercolor').";"; ?>} <?php } ?>
<?php if(ot_get_option('sliderposition') != 'yes') { ?>.slider {margin-top: 0;} <?php } ?>
<?php if(ot_get_option('food_filter') != 'enabled') { ?>.menu-title {font-size: 12px;} <?php } ?>
<?php if(ot_get_option('navigationcolor') != '') { ?>header nav {background-color: <?php echo ot_get_option('navigationcolor').";"; ?>}<?php } ?>
<?php if(ot_get_option('navigationhover') != '') { ?>header nav ul li ul li:hover, header nav ul li:hover {background-color: <?php echo ot_get_option('navigationhover').";"; ?>}header nav ul li ul li:hover{border-color: <?php echo ot_get_option('navigationhover').";"; ?>}<?php } ?>
<?php if(ot_get_option('navactive') != '') { ?>header nav ul li.current-menu-item {background-color: <?php echo ot_get_option('navactive').";"; ?>}<?php } ?>
<?php if($navigationfont) { ?>header nav ul li a {<?php if($navigationfont['font-family'] != '') { ?> font-family: <?php echo $navigationfont['font-family'].";"; } ?><?php if($navigationfont['font-size'] != '') { ?> font-size: <?php echo $navigationfont['font-size'].";"; } ?><?php if($navigationfont['font-style'] != '') { ?> font-style: <?php echo $navigationfont['font-style'].";"; } ?><?php if($navigationfont['font-weight'] != '') { ?> font-weight: <?php echo $navigationfont['font-weight'].";"; } ?><?php if($navigationfont['line-height'] != '') { ?> line-height: <?php echo $navigationfont['line-height'].";"; } ?><?php if($navigationfont['font-color'] != '') { ?> color: <?php echo $navigationfont['font-color'].";"; } ?> } <?php } ?>
<?php if($secondnavfont != '') { ?>header nav ul li ul li a { <?php if($secondnavfont['font-family'] != '') { ?> font-family: <?php echo $secondnavfont['font-family'].";"; } ?><?php if($secondnavfont['font-size'] != '') { ?> font-size: <?php echo $secondnavfont['font-size'].";"; } ?><?php if($secondnavfont['font-style'] != '') { ?> font-style: <?php echo $secondnavfont['font-style'].";"; } ?><?php if($secondnavfont['font-weight'] != '') { ?> font-weight: <?php echo $secondnavfont['font-weight'].";"; } ?><?php if($secondnavfont['line-height'] != '') { ?> line-height: <?php echo $secondnavfont['line-height'].";"; } ?><?php if($secondnavfont['font-color'] != '') { ?> color: <?php echo $secondnavfont['font-color'].";"; } ?> } <?php } else { } ?>
<?php if($accentcolor != '') { ?>.title h2, .sidebar-widget h5, .blog-post-featured-image img, .title h4, .work-post-preview:hover>.work-post-meta {border-bottom-color: <?php echo $accentcolor.";";?> } header nav ul li.current-menu-item, header nav ul li ul, header nav ul li a:hover, .nav-tabs li.ui-state-active, .arrowDown { border-top-color: <?php echo $accentcolor.";";?> } {border-color: <?php echo $accentcolor.";";?> } .pagination .current, .pagination a:hover, #wp-calendar caption, .category-nav .carousel-nav a.prev:hover, .category-nav .carousel-nav a.next:hover, .shortcode .carousel-nav a.prev:hover, .shortcode .carousel-nav a.next:hover, .arrow-pagination-prev:hover, .arrow-pagination-next:hover, .arrow-pagination-squares:hover, .sign-up-btn, .tagcloud a:hover, .flex-next:hover, .flex-prev:hover, .footer-top-line, .read-more:hover { background-color: <?php echo $accentcolor.";";?> } #search-form input[type="text"] { border-left-color: <?php echo $accentcolor.";";?>} <?php } ?>
<?php if(ot_get_option('links_color') != '') { ?> a, .food-menu-categories li a:hover, .food-menu-categories li a:focus, .food-menu-categories li a.selected, .latest-blog-title, .sidebar-widget .blog-posts-widget .blog-post-widget-meta a, .sidebar-widget .blog-posts-widget .blog-post-widget-meta, .blog-post-meta h5, span a, #twitter_update_list li span a, .sidebar-widget li span a { color: <?php echo ot_get_option('links_color').";";?> } <?php } ?>
<?php if(ot_get_option('links_hover') != '') { ?> a:hover, h3.title:hover, .posted-by a:hover, .comment-count:hover, .primary-footer a:hover, .sidebar-widget ul li a:hover, .sidebar-widget a:hover, .blog-posts-widget p a:hover { color: <?php echo ot_get_option('links_hover').";";?> } <?php } ?>
<?php if(ot_get_option('title_background') != '') { ?>.tagline {background-color: <?php echo ot_get_option('title_background').";";?>} <?php } ?>
<?php if(ot_get_option('footer_color') != '') { ?>.footer-full {background-color: <?php echo ot_get_option('footer_color').";";?>} <?php } ?>
<?php if(ot_get_option('copyright_color') != '') { ?>.copyright-full {background-color: <?php echo ot_get_option('copyright_color').";";?>} <?php } ?>
<?php if($page_title != '') { ?>.tagline h3 { <?php if($page_title['font-family'] != '') { ?> font-family: <?php echo $page_title['font-family'].";"; } ?><?php if($page_title['font-size'] != '') { ?> font-size: <?php echo $page_title['font-size'].";"; } ?><?php if($page_title['font-style'] != '') { ?> font-style: <?php echo $page_title['font-style'].";"; } ?><?php if($page_title['font-weight'] != '') { ?> font-weight: <?php echo $page_title['font-weight'].";"; } ?><?php if($page_title['line-height'] != '') { ?> line-height: <?php echo $page_title['line-height'].";"; } ?><?php if($page_title['font-color'] != '') { ?> color: <?php echo $page_title['font-color'].";"; } ?> } <?php } else { } ?>
<?php if($h1 != '') { ?>h1 { <?php if($h1['font-family'] != '') { ?> font-family: <?php echo $h1['font-family'].";"; } ?><?php if($h1['font-size'] != '') { ?> font-size: <?php echo $h1['font-size'].";"; } ?><?php if($h1['font-style'] != '') { ?> font-style: <?php echo $h1['font-style'].";"; } ?><?php if($h1['font-weight'] != '') { ?> font-weight: <?php echo $h1['font-weight'].";"; } ?><?php if($h1['line-height'] != '') { ?> line-height: <?php echo $h1['line-height'].";"; } ?><?php if($h1['font-color'] != '') { ?> color: <?php echo $h1['font-color'].";"; } ?> } <?php } else { } ?>
<?php if($h2 != '') { ?>h2, .title h2, .title h4 { <?php if($h2['font-family'] != '') { ?> font-family: <?php echo $h2['font-family'].";"; } ?><?php if($h2['font-size'] != '') { ?> font-size: <?php echo $h2['font-size'].";"; } ?><?php if($h2['font-style'] != '') { ?> font-style: <?php echo $h2['font-style'].";"; } ?><?php if($h2['font-weight'] != '') { ?> font-weight: <?php echo $h2['font-weight'].";"; } ?><?php if($h2['line-height'] != '') { ?> line-height: <?php echo $h2['line-height'].";"; } ?><?php if($h2['font-color'] != '') { ?> color: <?php echo $h2['font-color'].";"; } ?> } <?php } else { } ?>
<?php if($h3 != '') { ?>h3, .work-post-meta h3 { <?php if($h3['font-family'] != '') { ?> font-family: <?php echo $h3['font-family'].";"; } ?><?php if($h3['font-size'] != '') { ?> font-size: <?php echo $h3['font-size'].";"; } ?><?php if($h3['font-style'] != '') { ?> font-style: <?php echo $h3['font-style'].";"; } ?><?php if($h3['font-weight'] != '') { ?> font-weight: <?php echo $h3['font-weight'].";"; } ?><?php if($h3['line-height'] != '') { ?> line-height: <?php echo $h3['line-height'].";"; } ?><?php if($h3['font-color'] != '') { ?> color: <?php echo $h3['font-color'].";"; } ?> } <?php } else { } ?>
<?php if($h4 != '') { ?>h4 { <?php if($h4['font-family'] != '') { ?> font-family: <?php echo $h4['font-family'].";"; } ?><?php if($h4['font-size'] != '') { ?> font-size: <?php echo $h4['font-size'].";"; } ?><?php if($h4['font-style'] != '') { ?> font-style: <?php echo $h4['font-style'].";"; } ?><?php if($h4['font-weight'] != '') { ?> font-weight: <?php echo $h4['font-weight'].";"; } ?><?php if($h4['line-height'] != '') { ?> line-height: <?php echo $h4['line-height'].";"; } ?><?php if($h4['font-color'] != '') { ?> color: <?php echo $h4['font-color'].";"; } ?> } <?php } else { } ?>
<?php if($h5 != '') { ?>h5 { <?php if($h5['font-family'] != '') { ?> font-family: <?php echo $h5['font-family'].";"; } ?><?php if($h5['font-size'] != '') { ?> font-size: <?php echo $h5['font-size'].";"; } ?><?php if($h5['font-style'] != '') { ?> font-style: <?php echo $h5['font-style'].";"; } ?><?php if($h5['font-weight'] != '') { ?> font-weight: <?php echo $h5['font-weight'].";"; } ?><?php if($h5['line-height'] != '') { ?> line-height: <?php echo $h5['line-height'].";"; } ?><?php if($h5['font-color'] != '') { ?> color: <?php echo $h5['font-color'].";"; } ?> } <?php } else { } ?>
<?php if(ot_get_option('hover_color') != '') { ?>.hover-card:hover {opacity: 0.4;background: <?php echo ot_get_option('hover_color').";";?>} <?php } ?>
<?php if(ot_get_option('lightbox_background_color') != '') { ?>.mfp-bg {background: <?php echo ot_get_option('lightbox_background_color').";";?>} <?php } ?>
<?php if(ot_get_option('accordion_text_title_color') != '') { ?>.accordion h3.accordion-trigger a, .accordion .accordion-trigger.ui-state-active a {color: <?php echo ot_get_option('accordion_text_title_color').";";?>} <?php } ?>
<?php if(ot_get_option('accordion_active') != '') { ?>.accordion .accordion-trigger.ui-state-active, .accordion .accordion-trigger.ui-state-active:hover {background-color: <?php echo ot_get_option('accordion_active').";";?>border-color: <?php echo ot_get_option('accordion_active').";";?>} <?php } ?>
<?php if(ot_get_option('accordion_inactive') != '') { ?>.accordion h3.accordion-trigger, .accordion h3.accordion-trigger:hover {background-color: <?php echo ot_get_option('accordion_inactive').";";?>border-color: <?php echo ot_get_option('accordion_inactive').";";?>} <?php } ?>
<?php if(ot_get_option('tabs_text_title_color') != '') { ?>.tabs ul.ui-tabs-nav .ui-state-active a, .tabs ul.ui-tabs-nav li a:hover, .tabs ul.ui-tabs-nav .ui-state-active a:hover, .tabs ul.ui-tabs-nav .ui-state-active a, .tabs ul.ui-tabs-nav li a, .tabs ul.ui-tabs-nav li a:hover {color: <?php echo ot_get_option('tabs_text_title_color').";";?>} <?php } ?>
<?php if(ot_get_option('tabs_active') != '') { ?>.tabs ul.ui-tabs-nav .ui-state-active a, .tabs ul.ui-tabs-nav li a:hover, .tabs ul.ui-tabs-nav .ui-state-active a:hover {background-color: <?php echo ot_get_option('tabs_active').";";?>border-color: <?php echo ot_get_option('tabs_active').";";?>} <?php } ?>
<?php if(ot_get_option('tabs_inactive') != '') { ?>.tabs ul.ui-tabs-nav li a, .tabs ul.ui-tabs-nav li a:hover {background-color: <?php echo ot_get_option('tabs_inactive').";";?>border-color: <?php echo ot_get_option('tabs_inactive').";";?>} <?php } ?>
<?php if(ot_get_option('toggle_text_title_color') != '') { ?>h3.toggle-trigger {color: <?php echo ot_get_option('toggle_text_title_color')."!important;";?>} <?php } ?>
<?php if(ot_get_option('toggle_active') != '') { ?>.toggle .toggle-trigger, .toggle .toggle-trigger:hover {background-color: <?php echo ot_get_option('toggle_active').";";?>border-color: <?php echo ot_get_option('toggle_active').";";?>} <?php } ?>
<?php if(ot_get_option('toggle_inactive') != '') { ?>.toggle .toggle-trigger.active, .toggle .toggle-trigger.active:hover {background-color: <?php echo ot_get_option('toggle_inactive').";";?>border-color: <?php echo ot_get_option('toggle_inactive').";";?>} <?php } ?>
<?php if(ot_get_option('title_color') != '') { ?>.titles.text-align-right, .titles.text-align-left, .titles.text-align-center {color: <?php echo ot_get_option('title_color').";";?>} <?php } ?>
<?php if(ot_get_option('title_border_color') != '') { ?>.titles.text-align-right span:before, .titles.text-align-left span:after, .titles.text-align-center span:before, .titles.text-align-center span:after {border-bottom: 1px solid <?php echo ot_get_option('title_border_color').";";?>; border-top: 1px solid <?php echo ot_get_option('title_border_color').";";?>;} <?php } ?>

</style>
<?php if(!empty($h1['font-family']) || !empty($h2['font-family']) || !empty($h3['font-family']) || !empty($h4['font-family']) || !empty($h5['font-family']) || !empty($page_title['font-family']) || !empty($navigationfont['font-family']) || !empty($secondnavfont['font-family'])) { ?>
		<link rel='stylesheet' href='http://fonts.googleapis.com/css?family=<?php if($h1['font-family'] != '') {echo $h1['font-family']; echo "|"; } ?><?php if($h2['font-family'] != '') {echo $h2['font-family']; echo "|"; } ?><?php if($h3['font-family'] != '') {echo $h3['font-family']; echo "|"; } ?><?php if($h4['font-family'] != '') {echo $h4['font-family']; echo "|"; } ?><?php if($h5['font-family'] != '') {echo $h5['font-family']; echo "|"; } ?><?php if($page_title['font-family'] != '') {echo $page_title['font-family']; echo "|"; } ?><?php if($navigationfont['font-family'] != '') {echo $navigationfont['font-family']; echo "|"; } ?><?php if($secondnavfont['font-family'] != '') {echo $secondnavfont['font-family']; echo "|"; } ?>' type='text/css' />
<?php } else { } ?>
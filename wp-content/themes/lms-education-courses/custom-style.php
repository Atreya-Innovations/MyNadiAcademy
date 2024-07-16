<?php

	$lms_education_courses_custom_css= "";

	/*-------------------- First Highlight Color -------------------*/

	$lms_education_courses_first_color = get_theme_mod('lms_education_courses_first_color');

	if($lms_education_courses_first_color != false){
		$lms_education_courses_custom_css .='.principle-box:hover .principle-box-inner-img, .more-btn a, #comments input[type="submit"],#comments a.comment-reply-link,input[type="submit"],.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,.pro-button a, .woocommerce a.added_to_cart.wc-forward, #footer input[type="submit"], #footer-2, #footer .wp-block-search .wp-block-search__button, #sidebar .wp-block-search .wp-block-search__button, .scrollup i:hover, #sidebar .custom-social-icons a,#footer .custom-social-icons a, #sidebar h3,  #sidebar .widget_block h3, #sidebar h2, .pagination span, .pagination a, .woocommerce span.onsale, nav.woocommerce-MyAccount-navigation ul li, .scrollup i, .pagination a:hover, .pagination .current, #sidebar .tagcloud a:hover, #main-product button.tablinks.active, .main-product-section .pro-button, .main-product-section:hover .the_timer, nav.woocommerce-MyAccount-navigation ul li:hover, #preloader, .event-btn-1 a, .event-btn-2 a:hover,.wp-block-tag-cloud a:hover,#sidebar h3, #sidebar .widget_block h3, #sidebar h2, #sidebar label.wp-block-search__label, #sidebar .wp-block-heading,.bradcrumbs a, .post-categories li a,.bradcrumbs span,.wp-block-button__link,#sidebar .wp-block-tag-cloud a:hover,#footer .wp-block-tag-cloud a:hover,#footer-2,.read-more a,#banner .slider-nav .slick-slide.slick-current.slick-active,.compare-btn a, .compare-btn-banner a, .topbar-btn a, .list-item-button a, .tutor-course-list-btn a, #slider .more-btn a,#slider .carousel-control-next i, #slider .carousel-control-prev i,.toggle-nav i{';
			$lms_education_courses_custom_css .='background: '.esc_attr($lms_education_courses_first_color).';';
		$lms_education_courses_custom_css .='}';
	}

	if($lms_education_courses_first_color != false){
		$lms_education_courses_custom_css .='#sidebar ul li::before,#footer-2,.wp-block-woocommerce-cart .wc-block-cart__submit-button, .wc-block-components-checkout-place-order-button, .wc-block-components-totals-coupon__button,.wc-block-components-order-summary-item__quantity,.wc-block-grid__product-onsale{';
			$lms_education_courses_custom_css .='background: '.esc_attr($lms_education_courses_first_color).'!important;';
		$lms_education_courses_custom_css .='}';
	}

	if($lms_education_courses_first_color != false){
		$lms_education_courses_custom_css .='a, .main-header span.donate a:hover, .main-header span.volunteer a:hover, .main-header span.donate i:hover, .main-header span.volunteer i:hover, .box-content h3, .box-content h3 a, .woocommerce-message::before,.woocommerce-info::before,.post-main-box:hover h2 a, .post-main-box:hover .post-info span a, .single-post .post-info:hover a, .middle-bar h6, .main-navigation ul li.current_page_item, .main-navigation li a:hover,.main-navigation ul li.current_page_item a, .main-navigation li a:hover, .main-navigation ul ul li a:hover, .main-navigation li a:focus, .main-navigation ul ul a:focus, .main-navigation ul ul a:hover,p.site-title a:hover, .logo h1 a:hover,.post-main-box:hover h2 a, .post-main-box:hover .post-info span a, .single-post .post-info:hover a, .middle-bar h6, .grid-post-main-box:hover h2 a, .grid-post-main-box:hover .post-info span a,#best-product-section .product-box:hover .product-box-content h3 a, #degree-courses .small-text, .small-text2,.sticky .post-main-box h2:before{';
			$lms_education_courses_custom_css .='color: '.esc_attr($lms_education_courses_first_color).';';
		$lms_education_courses_custom_css .='}';
	}

	if($lms_education_courses_first_color != false){
		$lms_education_courses_custom_css .='.home-page-header,.main-navigation ul ul{';
			$lms_education_courses_custom_css .='border-color: '.esc_attr($lms_education_courses_first_color).';';
		$lms_education_courses_custom_css .='}';
	}

	if($lms_education_courses_first_color != false){
		$lms_education_courses_custom_css .='.main-navigation ul ul{';
			$lms_education_courses_custom_css .='border-bottom:2px solid '.esc_attr($lms_education_courses_first_color).';';
		$lms_education_courses_custom_css .='}';
	}

	/*---------------------------Width Layout -------------------*/

	$lms_education_courses_theme_lay = get_theme_mod( 'lms_education_courses_width_option','Full Width');
    if($lms_education_courses_theme_lay == 'Boxed'){
		$lms_education_courses_custom_css .='body{';
			$lms_education_courses_custom_css .='max-width: 1140px; width: 100%; margin-right: auto; margin-left: auto;';
		$lms_education_courses_custom_css .='}';
		$lms_education_courses_custom_css .='.scrollup i{';
			$lms_education_courses_custom_css .='right: 100px;';
		$lms_education_courses_custom_css .='}';
		$lms_education_courses_custom_css .='.row.outer-logo{';
			$lms_education_courses_custom_css .='margin-left: 0px;';
		$lms_education_courses_custom_css .='}';
	}else if($lms_education_courses_theme_lay == 'Wide Width'){
		$lms_education_courses_custom_css .='body{';
			$lms_education_courses_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$lms_education_courses_custom_css .='}';
		$lms_education_courses_custom_css .='.scrollup i{';
			$lms_education_courses_custom_css .='right: 30px;';
		$lms_education_courses_custom_css .='}';
		$lms_education_courses_custom_css .='.row.outer-logo{';
			$lms_education_courses_custom_css .='margin-left: 0px;';
		$lms_education_courses_custom_css .='}';
	}else if($lms_education_courses_theme_lay == 'Full Width'){
		$lms_education_courses_custom_css .='body{';
			$lms_education_courses_custom_css .='max-width: 100%;';
		$lms_education_courses_custom_css .='}';
	}

	/*----------------Responsive Media -----------------------*/

	$lms_education_courses_resp_slider = get_theme_mod( 'lms_education_courses_resp_slider_hide_show',true);
	if($lms_education_courses_resp_slider == true && get_theme_mod( 'lms_education_courses_slider_hide_show', false) == false){
    	$lms_education_courses_custom_css .='#slider{';
			$lms_education_courses_custom_css .='display:none;';
		$lms_education_courses_custom_css .='} ';
	}
    if($lms_education_courses_resp_slider == true){
    	$lms_education_courses_custom_css .='@media screen and (max-width:575px) {';
		$lms_education_courses_custom_css .='#slider{';
			$lms_education_courses_custom_css .='display:block;';
		$lms_education_courses_custom_css .='} }';
	}else if($lms_education_courses_resp_slider == false){
		$lms_education_courses_custom_css .='@media screen and (max-width:575px) {';
		$lms_education_courses_custom_css .='#slider{';
			$lms_education_courses_custom_css .='display:none;';
		$lms_education_courses_custom_css .='} }';
		$lms_education_courses_custom_css .='@media screen and (max-width:575px){';
		$lms_education_courses_custom_css .='.page-template-custom-home-page.admin-bar .homepageheader{';
			$lms_education_courses_custom_css .='margin-top: 45px;';
		$lms_education_courses_custom_css .='} }';
	}

	$lms_education_courses_resp_sidebar = get_theme_mod( 'lms_education_courses_sidebar_hide_show',true);
    if($lms_education_courses_resp_sidebar == true){
    	$lms_education_courses_custom_css .='@media screen and (max-width:575px) {';
		$lms_education_courses_custom_css .='#sidebar{';
			$lms_education_courses_custom_css .='display:block;';
		$lms_education_courses_custom_css .='} }';
	}else if($lms_education_courses_resp_sidebar == false){
		$lms_education_courses_custom_css .='@media screen and (max-width:575px) {';
		$lms_education_courses_custom_css .='#sidebar{';
			$lms_education_courses_custom_css .='display:none;';
		$lms_education_courses_custom_css .='} }';
	}

	$lms_education_courses_responsive_preloader_hide = get_theme_mod('lms_education_courses_responsive_preloader_hide',false);
	if($lms_education_courses_responsive_preloader_hide == true && get_theme_mod('lms_education_courses_loader_enable',false) == false){
		$lms_education_courses_custom_css .='@media screen and (min-width:575px){
			#preloader{';
			$lms_education_courses_custom_css .='display:none !important;';
		$lms_education_courses_custom_css .='} }';
	}

	if($lms_education_courses_responsive_preloader_hide == false){
		$lms_education_courses_custom_css .='@media screen and (max-width:575px){
			#preloader{';
			$lms_education_courses_custom_css .='display:none !important;';
		$lms_education_courses_custom_css .='} }';
	}

	$lms_education_courses_resp_scroll_top = get_theme_mod( 'lms_education_courses_resp_scroll_top_hide_show',true);
	if($lms_education_courses_resp_scroll_top == true && get_theme_mod( 'lms_education_courses_hide_show_scroll',true) == false){
    	$lms_education_courses_custom_css .='.scrollup i{';
			$lms_education_courses_custom_css .='visibility:hidden !important;';
		$lms_education_courses_custom_css .='} ';
	}
    if($lms_education_courses_resp_scroll_top == true){
    	$lms_education_courses_custom_css .='@media screen and (max-width:575px) {';
		$lms_education_courses_custom_css .='.scrollup i{';
			$lms_education_courses_custom_css .='visibility:visible !important;';
		$lms_education_courses_custom_css .='} }';
	}else if($lms_education_courses_resp_scroll_top == false){
		$lms_education_courses_custom_css .='@media screen and (max-width:575px){';
		$lms_education_courses_custom_css .='.scrollup i{';
			$lms_education_courses_custom_css .='visibility:hidden !important;';
		$lms_education_courses_custom_css .='} }';
	}

	/*---------------------------Slider Height ------------*/

	$lms_education_courses_slider_height = get_theme_mod('lms_education_courses_slider_height');
	if($lms_education_courses_slider_height != false){
		$lms_education_courses_custom_css .='#slider img{';
			$lms_education_courses_custom_css .='height: '.esc_attr($lms_education_courses_slider_height).';';
		$lms_education_courses_custom_css .='}';
	}

/*------------------ Slider Opacity -------------------*/

	$lms_education_courses_theme_lay = get_theme_mod( 'lms_education_courses_slider_opacity_color','');
	if($lms_education_courses_theme_lay == '0'){
		$lms_education_courses_custom_css .='#slider img{';
			$lms_education_courses_custom_css .='opacity:0';
		$lms_education_courses_custom_css .='}';
		}else if($lms_education_courses_theme_lay == '0.1'){
		$lms_education_courses_custom_css .='#slider img{';
			$lms_education_courses_custom_css .='opacity:0.1';
		$lms_education_courses_custom_css .='}';
		}else if($lms_education_courses_theme_lay == '0.2'){
		$lms_education_courses_custom_css .='#slider img{';
			$lms_education_courses_custom_css .='opacity:0.2';
		$lms_education_courses_custom_css .='}';
		}else if($lms_education_courses_theme_lay == '0.3'){
		$lms_education_courses_custom_css .='#slider img{';
			$lms_education_courses_custom_css .='opacity:0.3';
		$lms_education_courses_custom_css .='}';
		}else if($lms_education_courses_theme_lay == '0.4'){
		$lms_education_courses_custom_css .='#slider img{';
			$lms_education_courses_custom_css .='opacity:0.4';
		$lms_education_courses_custom_css .='}';
		}else if($lms_education_courses_theme_lay == '0.5'){
		$lms_education_courses_custom_css .='#slider img{';
			$lms_education_courses_custom_css .='opacity:0.5';
		$lms_education_courses_custom_css .='}';
		}else if($lms_education_courses_theme_lay == '0.6'){
		$lms_education_courses_custom_css .='#slider img{';
			$lms_education_courses_custom_css .='opacity:0.6';
		$lms_education_courses_custom_css .='}';
		}else if($lms_education_courses_theme_lay == '0.7'){
		$lms_education_courses_custom_css .='#slider img{';
			$lms_education_courses_custom_css .='opacity:0.7';
		$lms_education_courses_custom_css .='}';
		}else if($lms_education_courses_theme_lay == '0.8'){
		$lms_education_courses_custom_css .='#slider img{';
			$lms_education_courses_custom_css .='opacity:0.8';
		$lms_education_courses_custom_css .='}';
		}else if($lms_education_courses_theme_lay == '0.9'){
		$lms_education_courses_custom_css .='#slider img{';
			$lms_education_courses_custom_css .='opacity:0.9';
		$lms_education_courses_custom_css .='}';
		}

	/*---------------------- Slider Image Overlay ------------------------*/

	$lms_education_courses_slider_image_overlay = get_theme_mod('lms_education_courses_slider_image_overlay', true);
	if($lms_education_courses_slider_image_overlay == false){
		$lms_education_courses_custom_css .='#slider img{';
			$lms_education_courses_custom_css .='opacity:1;';
		$lms_education_courses_custom_css .='}';
	}

	$lms_education_courses_slider_image_overlay_color = get_theme_mod('lms_education_courses_slider_image_overlay_color', true);
	if($lms_education_courses_slider_image_overlay_color != false){
		$lms_education_courses_custom_css .='#slider{';
			$lms_education_courses_custom_css .='background-color: '.esc_attr($lms_education_courses_slider_image_overlay_color).';';
		$lms_education_courses_custom_css .='}';
	}

	/*------------- Slider Content Padding Settings ------------------*/

	$lms_education_courses_slider_content_padding_top_bottom = get_theme_mod('lms_education_courses_slider_content_padding_top_bottom');
	$lms_education_courses_slider_content_padding_left_right = get_theme_mod('lms_education_courses_slider_content_padding_left_right');
	if($lms_education_courses_slider_content_padding_top_bottom != false || $lms_education_courses_slider_content_padding_left_right != false){
		$lms_education_courses_custom_css .='#slider .carousel-caption{';
			$lms_education_courses_custom_css .='top: '.esc_attr($lms_education_courses_slider_content_padding_top_bottom).'; bottom: '.esc_attr($lms_education_courses_slider_content_padding_top_bottom).';left: '.esc_attr($lms_education_courses_slider_content_padding_left_right).';right: '.esc_attr($lms_education_courses_slider_content_padding_left_right).';';
		$lms_education_courses_custom_css .='}';
	}

	/*-------------- Copyright Alignment ----------------*/

	$lms_education_courses_copyright_alingment = get_theme_mod('lms_education_courses_copyright_alingment');
	if($lms_education_courses_copyright_alingment != false){
		$lms_education_courses_custom_css .='.copyright p{';
			$lms_education_courses_custom_css .='text-align: '.esc_attr($lms_education_courses_copyright_alingment).';';
		$lms_education_courses_custom_css .='}';
	}

	/*------------- Preloader Background Color  -------------------*/

	$lms_education_courses_preloader_bg_color = get_theme_mod('lms_education_courses_preloader_bg_color');
	if($lms_education_courses_preloader_bg_color != false){
		$lms_education_courses_custom_css .='#preloader{';
			$lms_education_courses_custom_css .='background-color: '.esc_attr($lms_education_courses_preloader_bg_color).';';
		$lms_education_courses_custom_css .='}';
	}

	$lms_education_courses_preloader_border_color = get_theme_mod('lms_education_courses_preloader_border_color');
	if($lms_education_courses_preloader_border_color != false){
		$lms_education_courses_custom_css .='.loader-line{';
			$lms_education_courses_custom_css .='border-color: '.esc_attr($lms_education_courses_preloader_border_color).'!important;';
		$lms_education_courses_custom_css .='}';
	}

	$lms_education_courses_preloader_bg_img = get_theme_mod('lms_education_courses_preloader_bg_img');
	if($lms_education_courses_preloader_bg_img != false){
		$lms_education_courses_custom_css .='#preloader{';
			$lms_education_courses_custom_css .='background: url('.esc_attr($lms_education_courses_preloader_bg_img).');-webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;';
		$lms_education_courses_custom_css .='}';
	}

	// banner background img

	$lms_education_courses_banner_image = get_theme_mod('lms_education_courses_banner_image');
	if($lms_education_courses_banner_image != false){
		$lms_education_courses_custom_css .='#banner{';
			$lms_education_courses_custom_css .='background: url('.esc_url($lms_education_courses_banner_image).');';
		$lms_education_courses_custom_css .='}';
	}

	/*-------------- Copyright Alignment ----------------*/

	$lms_education_courses_copyright_alingment = get_theme_mod('lms_education_courses_copyright_alingment');
	if($lms_education_courses_copyright_alingment != false){
		$lms_education_courses_custom_css .='.copyright p{';
			$lms_education_courses_custom_css .='text-align: '.esc_attr($lms_education_courses_copyright_alingment).';';
		$lms_education_courses_custom_css .='}';
	}

	$lms_education_courses_copyright_background_color = get_theme_mod('lms_education_courses_copyright_background_color');
	if($lms_education_courses_copyright_background_color != false){
		$lms_education_courses_custom_css .='#footer-2{';
			$lms_education_courses_custom_css .='background-color: '.esc_attr($lms_education_courses_copyright_background_color).';';
		$lms_education_courses_custom_css .='}';
	}

	$lms_education_courses_footer_background_color = get_theme_mod('lms_education_courses_footer_background_color');
	if($lms_education_courses_footer_background_color != false){
		$lms_education_courses_custom_css .='#footer{';
			$lms_education_courses_custom_css .='background-color: '.esc_attr($lms_education_courses_footer_background_color).';';
		$lms_education_courses_custom_css .='}';
	}

	$lms_education_courses_footer_widgets_heading = get_theme_mod( 'lms_education_courses_footer_widgets_heading','Left');
    if($lms_education_courses_footer_widgets_heading == 'Left'){
		$lms_education_courses_custom_css .='#footer h3, #footer .wp-block-search .wp-block-search__label{';
		$lms_education_courses_custom_css .='text-align: left;';
		$lms_education_courses_custom_css .='}';
	}else if($lms_education_courses_footer_widgets_heading == 'Center'){
		$lms_education_courses_custom_css .='#footer h3, #footer .wp-block-search .wp-block-search__label{';
			$lms_education_courses_custom_css .='text-align: center;';
		$lms_education_courses_custom_css .='}';
	}else if($lms_education_courses_footer_widgets_heading == 'Right'){
		$lms_education_courses_custom_css .='#footer h3, #footer .wp-block-search .wp-block-search__label{';
			$lms_education_courses_custom_css .='text-align: right;';
		$lms_education_courses_custom_css .='}';
	}

	$lms_education_courses_footer_widgets_content = get_theme_mod( 'lms_education_courses_footer_widgets_content','Left');
    if($lms_education_courses_footer_widgets_content == 'Left'){
		$lms_education_courses_custom_css .='#footer .widget{';
		$lms_education_courses_custom_css .='text-align: left;';
		$lms_education_courses_custom_css .='}';
	}else if($lms_education_courses_footer_widgets_content == 'Center'){
		$lms_education_courses_custom_css .='#footer .widget{';
			$lms_education_courses_custom_css .='text-align: center;';
		$lms_education_courses_custom_css .='}';
	}else if($lms_education_courses_footer_widgets_content == 'Right'){
		$lms_education_courses_custom_css .='#footer .widget{';
			$lms_education_courses_custom_css .='text-align: right;';
		$lms_education_courses_custom_css .='}';
	}

	$lms_education_courses_copyright_font_size = get_theme_mod('lms_education_courses_copyright_font_size');
	if($lms_education_courses_copyright_font_size != false){
		$lms_education_courses_custom_css .='#footer-2 a, #footer-2 p{';
			$lms_education_courses_custom_css .='font-size: '.esc_attr($lms_education_courses_copyright_font_size).';';
		$lms_education_courses_custom_css .='}';
	}

	$lms_education_courses_copyright_alingment = get_theme_mod('lms_education_courses_copyright_alingment');
	if($lms_education_courses_copyright_alingment != false){
		$lms_education_courses_custom_css .='#footer-2 p{';
			$lms_education_courses_custom_css .='text-align: '.esc_attr($lms_education_courses_copyright_alingment).';';
		$lms_education_courses_custom_css .='}';
	}
	$lms_education_courses_copyright_padding_top_bottom = get_theme_mod('lms_education_courses_copyright_padding_top_bottom');
	if($lms_education_courses_copyright_padding_top_bottom != false){
		$lms_education_courses_custom_css .='#footer-2{';
			$lms_education_courses_custom_css .='padding-top: '.esc_attr($lms_education_courses_copyright_padding_top_bottom).'; padding-bottom: '.esc_attr($lms_education_courses_copyright_padding_top_bottom).';';
		$lms_education_courses_custom_css .='}';
	}

	$lms_education_courses_footer_padding = get_theme_mod('lms_education_courses_footer_padding');
	if($lms_education_courses_footer_padding != false){
		$lms_education_courses_custom_css .='#footer{';
			$lms_education_courses_custom_css .='padding: '.esc_attr($lms_education_courses_footer_padding).' 0;';
		$lms_education_courses_custom_css .='}';
	}

	/*----------------Scroll to top Settings ------------------*/

	$lms_education_courses_scroll_to_top_font_size = get_theme_mod('lms_education_courses_scroll_to_top_font_size');
	if($lms_education_courses_scroll_to_top_font_size != false){
		$lms_education_courses_custom_css .='.scrollup i{';
			$lms_education_courses_custom_css .='font-size: '.esc_attr($lms_education_courses_scroll_to_top_font_size).';';
		$lms_education_courses_custom_css .='}';
	}

	$lms_education_courses_scroll_to_top_padding = get_theme_mod('lms_education_courses_scroll_to_top_padding');
	$lms_education_courses_scroll_to_top_padding = get_theme_mod('lms_education_courses_scroll_to_top_padding');
	if($lms_education_courses_scroll_to_top_padding != false){
		$lms_education_courses_custom_css .='.scrollup i{';
			$lms_education_courses_custom_css .='padding-top: '.esc_attr($lms_education_courses_scroll_to_top_padding).';padding-bottom: '.esc_attr($lms_education_courses_scroll_to_top_padding).';';
		$lms_education_courses_custom_css .='}';
	}

	$lms_education_courses_scroll_to_top_width = get_theme_mod('lms_education_courses_scroll_to_top_width');
	if($lms_education_courses_scroll_to_top_width != false){
		$lms_education_courses_custom_css .='.scrollup i{';
			$lms_education_courses_custom_css .='width: '.esc_attr($lms_education_courses_scroll_to_top_width).';';
		$lms_education_courses_custom_css .='}';
	}

	$lms_education_courses_scroll_to_top_height = get_theme_mod('lms_education_courses_scroll_to_top_height');
	if($lms_education_courses_scroll_to_top_height != false){
		$lms_education_courses_custom_css .='.scrollup i{';
			$lms_education_courses_custom_css .='height: '.esc_attr($lms_education_courses_scroll_to_top_height).';';
		$lms_education_courses_custom_css .='}';
	}

	$lms_education_courses_scroll_to_top_border_radius = get_theme_mod('lms_education_courses_scroll_to_top_border_radius');
	if($lms_education_courses_scroll_to_top_border_radius != false){
		$lms_education_courses_custom_css .='.scrollup i{';
			$lms_education_courses_custom_css .='border-radius: '.esc_attr($lms_education_courses_scroll_to_top_border_radius).'px;';
		$lms_education_courses_custom_css .='}';
	}

	/*------------------ Logo  -------------------*/

	$lms_education_courses_logo_padding = get_theme_mod('lms_education_courses_logo_padding');
	if($lms_education_courses_logo_padding != false){
		$lms_education_courses_custom_css .='.logo{';
			$lms_education_courses_custom_css .='padding: '.esc_attr($lms_education_courses_logo_padding).' !important;';
		$lms_education_courses_custom_css .='}';
	}

	$lms_education_courses_logo_margin = get_theme_mod('lms_education_courses_logo_margin');
	if($lms_education_courses_logo_margin != false){
		$lms_education_courses_custom_css .='.logo{';
			$lms_education_courses_custom_css .='margin: '.esc_attr($lms_education_courses_logo_margin).';';
		$lms_education_courses_custom_css .='}';
	}

	// Site title Font Size
	$lms_education_courses_site_title_font_size = get_theme_mod('lms_education_courses_site_title_font_size');
	if($lms_education_courses_site_title_font_size != false){
		$lms_education_courses_custom_css .='.logo p.site-title, .logo h1{';
			$lms_education_courses_custom_css .='font-size: '.esc_attr($lms_education_courses_site_title_font_size).';';
		$lms_education_courses_custom_css .='}';
	}

	// Site tagline Font Size
	$lms_education_courses_site_tagline_font_size = get_theme_mod('lms_education_courses_site_tagline_font_size');
	if($lms_education_courses_site_tagline_font_size != false){
		$lms_education_courses_custom_css .='.logo p.site-description{';
			$lms_education_courses_custom_css .='font-size: '.esc_attr($lms_education_courses_site_tagline_font_size).';';
		$lms_education_courses_custom_css .='}';
	}

	$lms_education_courses_site_title_color = get_theme_mod('lms_education_courses_site_title_color');
	if($lms_education_courses_site_title_color != false){
		$lms_education_courses_custom_css .='p.site-title a, .logo h1 a{';
			$lms_education_courses_custom_css .='color: '.esc_attr($lms_education_courses_site_title_color).'!important;';
		$lms_education_courses_custom_css .='}';
	}

	$lms_education_courses_site_tagline_color = get_theme_mod('lms_education_courses_site_tagline_color');
	if($lms_education_courses_site_tagline_color != false){
		$lms_education_courses_custom_css .='.logo p.site-description{';
			$lms_education_courses_custom_css .='color: '.esc_attr($lms_education_courses_site_tagline_color).';';
		$lms_education_courses_custom_css .='}';
	}

	$lms_education_courses_logo_width = get_theme_mod('lms_education_courses_logo_width');
	if($lms_education_courses_logo_width != false){
		$lms_education_courses_custom_css .='.logo img{';
			$lms_education_courses_custom_css .='width: '.esc_attr($lms_education_courses_logo_width).';';
		$lms_education_courses_custom_css .='}';
	}

	$lms_education_courses_logo_height = get_theme_mod('lms_education_courses_logo_height');
	if($lms_education_courses_logo_height != false){
		$lms_education_courses_custom_css .='.logo img{';
			$lms_education_courses_custom_css .='height: '.esc_attr($lms_education_courses_logo_height).';';
		$lms_education_courses_custom_css .='}';
	}

	// Header Background Color
	$lms_education_courses_header_background_color = get_theme_mod('lms_education_courses_header_background_color');
	if($lms_education_courses_header_background_color != false){
		$lms_education_courses_custom_css .='.page-template-custom-home-page .home-page-header, .home-page-header{';
			$lms_education_courses_custom_css .='background-color: '.esc_attr($lms_education_courses_header_background_color).';';
		$lms_education_courses_custom_css .='}';
	}

	$lms_education_courses_header_img_position = get_theme_mod('lms_education_courses_header_img_position','center top');
	if($lms_education_courses_header_img_position != false){
		$lms_education_courses_custom_css .='.page-template-custom-home-page .home-page-header, .home-page-header{';
			$lms_education_courses_custom_css .='background-position: '.esc_attr($lms_education_courses_header_img_position).'!important;';
		$lms_education_courses_custom_css .='}';
	}

	/*---------------------------Blog Layout -------------------*/

	$lms_education_courses_theme_lay = get_theme_mod( 'lms_education_courses_blog_layout_option','Default');
    if($lms_education_courses_theme_lay == 'Default'){
		$lms_education_courses_custom_css .='.post-main-box{';
			$lms_education_courses_custom_css .='';
		$lms_education_courses_custom_css .='}';
	}else if($lms_education_courses_theme_lay == 'Center'){
		$lms_education_courses_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn{';
			$lms_education_courses_custom_css .='text-align:center;';
		$lms_education_courses_custom_css .='}';
		$lms_education_courses_custom_css .='.post-info{';
			$lms_education_courses_custom_css .='margin-top:10px;';
		$lms_education_courses_custom_css .='}';
		$lms_education_courses_custom_css .='.post-info hr{';
			$lms_education_courses_custom_css .='margin:15px auto;';
		$lms_education_courses_custom_css .='}';
	}else if($lms_education_courses_theme_lay == 'Left'){
		$lms_education_courses_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn, #our-services p{';
			$lms_education_courses_custom_css .='text-align:Left;';
		$lms_education_courses_custom_css .='}';
		$lms_education_courses_custom_css .='.post-info hr{';
			$lms_education_courses_custom_css .='margin-bottom:10px;';
		$lms_education_courses_custom_css .='}';
		$lms_education_courses_custom_css .='.post-main-box h2{';
			$lms_education_courses_custom_css .='margin-top:10px;';
		$lms_education_courses_custom_css .='}';
		$lms_education_courses_custom_css .='.service-text .more-btn{';
			$lms_education_courses_custom_css .='display:inline-block;';
		$lms_education_courses_custom_css .='}';
	}

	/*--------------------- Blog Page Posts -------------------*/

	$lms_education_courses_blog_page_posts_settings = get_theme_mod( 'lms_education_courses_blog_page_posts_settings','Into Blocks');
    if($lms_education_courses_blog_page_posts_settings == 'Without Blocks'){
		$lms_education_courses_custom_css .='.post-main-box{';
			$lms_education_courses_custom_css .='box-shadow: none; border: none; margin:30px 0;';
		$lms_education_courses_custom_css .='}';
	}

	// featured image dimention
	$lms_education_courses_blog_post_featured_image_dimension = get_theme_mod('lms_education_courses_blog_post_featured_image_dimension', 'default');
	$lms_education_courses_blog_post_featured_image_custom_width = get_theme_mod('lms_education_courses_blog_post_featured_image_custom_width',250);
	$lms_education_courses_blog_post_featured_image_custom_height = get_theme_mod('lms_education_courses_blog_post_featured_image_custom_height',250);
	if($lms_education_courses_blog_post_featured_image_dimension == 'custom'){
		$lms_education_courses_custom_css .='.post-main-box img{';
			$lms_education_courses_custom_css .='width: '.esc_attr($lms_education_courses_blog_post_featured_image_custom_width).'!important; height: '.esc_attr($lms_education_courses_blog_post_featured_image_custom_height).';';
		$lms_education_courses_custom_css .='}';
	}

	/*---------------- Posts Settings ------------------*/

	$lms_education_courses_featured_image_border_radius = get_theme_mod('lms_education_courses_featured_image_border_radius', 0);
	if($lms_education_courses_featured_image_border_radius != false){
		$lms_education_courses_custom_css .='.box-image img, .feature-box img{';
			$lms_education_courses_custom_css .='border-radius: '.esc_attr($lms_education_courses_featured_image_border_radius).'px;';
		$lms_education_courses_custom_css .='}';
	}

	$lms_education_courses_featured_image_box_shadow = get_theme_mod('lms_education_courses_featured_image_box_shadow',0);
	if($lms_education_courses_featured_image_box_shadow != false){
		$lms_education_courses_custom_css .='.box-image img, .feature-box img, #content-vw img{';
			$lms_education_courses_custom_css .='box-shadow: '.esc_attr($lms_education_courses_featured_image_box_shadow).'px '.esc_attr($lms_education_courses_featured_image_box_shadow).'px '.esc_attr($lms_education_courses_featured_image_box_shadow).'px #cccccc;';
		$lms_education_courses_custom_css .='}';
	}

	/*---------------- Button Settings ------------------*/

	$lms_education_courses_button_letter_spacing = get_theme_mod('lms_education_courses_button_letter_spacing',14);
	$lms_education_courses_custom_css .='.post-main-box .more-btn{';
		$lms_education_courses_custom_css .='letter-spacing: '.esc_attr($lms_education_courses_button_letter_spacing).';';
	$lms_education_courses_custom_css .='}';

	$lms_education_courses_button_border_radius = get_theme_mod('lms_education_courses_button_border_radius');
	if($lms_education_courses_button_border_radius != false){
		$lms_education_courses_custom_css .='.post-main-box .more-btn a{';
			$lms_education_courses_custom_css .='border-radius: '.esc_attr($lms_education_courses_button_border_radius).'px !important;';
		$lms_education_courses_custom_css .='}';
	}

	$lms_education_courses_button_top_bottom_padding = get_theme_mod('lms_education_courses_button_top_bottom_padding');
	$lms_education_courses_button_left_right_padding = get_theme_mod('lms_education_courses_button_left_right_padding');
	if($lms_education_courses_button_top_bottom_padding != false || $lms_education_courses_button_left_right_padding != false){
		$lms_education_courses_custom_css .='.post-main-box .more-btn{';
			$lms_education_courses_custom_css .='padding-top: '.esc_attr($lms_education_courses_button_top_bottom_padding).'!important; padding-bottom: '.esc_attr($lms_education_courses_button_top_bottom_padding).'!important;padding-left: '.esc_attr($lms_education_courses_button_left_right_padding).'!important;padding-right: '.esc_attr($lms_education_courses_button_left_right_padding).'!important;';
		$lms_education_courses_custom_css .='}';
	}

	$lms_education_courses_button_font_size = get_theme_mod('lms_education_courses_button_font_size',14);
	$lms_education_courses_custom_css .='.post-main-box .more-btn a{';
		$lms_education_courses_custom_css .='font-size: '.esc_attr($lms_education_courses_button_font_size).';';
	$lms_education_courses_custom_css .='}';

	$lms_education_courses_theme_lay = get_theme_mod( 'lms_education_courses_button_text_transform','Capitalize');
	if($lms_education_courses_theme_lay == 'Capitalize'){
		$lms_education_courses_custom_css .='.post-main-box .more-btn a{';
			$lms_education_courses_custom_css .='text-transform:Capitalize;';
		$lms_education_courses_custom_css .='}';
	}
	if($lms_education_courses_theme_lay == 'Lowercase'){
		$lms_education_courses_custom_css .='.post-main-box .more-btn a{';
			$lms_education_courses_custom_css .='text-transform:Lowercase;';
		$lms_education_courses_custom_css .='}';
	}
	if($lms_education_courses_theme_lay == 'Uppercase'){
		$lms_education_courses_custom_css .='.post-main-box .more-btn a{';
			$lms_education_courses_custom_css .='text-transform:Uppercase;';
		$lms_education_courses_custom_css .='}';
	}

	/*---------------- Single Blog Page Settings ------------------*/

	$lms_education_courses_single_blog_comment_button_text = get_theme_mod('lms_education_courses_single_blog_comment_button_text', 'Post Comment');
	if($lms_education_courses_single_blog_comment_button_text == ''){
		$lms_education_courses_custom_css .='#comments p.form-submit {';
			$lms_education_courses_custom_css .='display: none;';
		$lms_education_courses_custom_css .='}';
	}

	$lms_education_courses_comment_width = get_theme_mod('lms_education_courses_single_blog_comment_width');
	if($lms_education_courses_comment_width != false){
		$lms_education_courses_custom_css .='#comments textarea{';
			$lms_education_courses_custom_css .='width: '.esc_attr($lms_education_courses_comment_width).';';
		$lms_education_courses_custom_css .='}';
	}

	$lms_education_courses_single_blog_post_navigation_show_hide = get_theme_mod('lms_education_courses_single_blog_post_navigation_show_hide',true);
	if($lms_education_courses_single_blog_post_navigation_show_hide != true){
		$lms_education_courses_custom_css .='.post-navigation{';
			$lms_education_courses_custom_css .='display: none;';
		$lms_education_courses_custom_css .='}';
	}

	/*--------------------- Grid Posts Posts -------------------*/

	$lms_education_courses_display_grid_posts_settings = get_theme_mod( 'lms_education_courses_display_grid_posts_settings','Into Blocks');
    if($lms_education_courses_display_grid_posts_settings == 'Without Blocks'){
		$lms_education_courses_custom_css .='.grid-post-main-box{';
			$lms_education_courses_custom_css .='box-shadow: none; border: none; margin:30px 0;';
		$lms_education_courses_custom_css .='}';
	}

	/*----------------Woocommerce Products Settings ------------------*/

	$lms_education_courses_related_product_show_hide = get_theme_mod('lms_education_courses_related_product_show_hide',true);
	if($lms_education_courses_related_product_show_hide != true){
		$lms_education_courses_custom_css .='.related.products{';
			$lms_education_courses_custom_css .='display: none;';
		$lms_education_courses_custom_css .='}';
	}

	/*----------------Woocommerce Products Settings ------------------*/

	$lms_education_courses_products_padding_top_bottom = get_theme_mod('lms_education_courses_products_padding_top_bottom');
	if($lms_education_courses_products_padding_top_bottom != false){
		$lms_education_courses_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$lms_education_courses_custom_css .='padding-top: '.esc_attr($lms_education_courses_products_padding_top_bottom).'!important; padding-bottom: '.esc_attr($lms_education_courses_products_padding_top_bottom).'!important;';
		$lms_education_courses_custom_css .='}';
	}

	$lms_education_courses_products_padding_left_right = get_theme_mod('lms_education_courses_products_padding_left_right');
	if($lms_education_courses_products_padding_left_right != false){
		$lms_education_courses_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$lms_education_courses_custom_css .='padding-left: '.esc_attr($lms_education_courses_products_padding_left_right).'!important; padding-right: '.esc_attr($lms_education_courses_products_padding_left_right).'!important;';
		$lms_education_courses_custom_css .='}';
	}

	$lms_education_courses_products_box_shadow = get_theme_mod('lms_education_courses_products_box_shadow');
	if($lms_education_courses_products_box_shadow != false){
		$lms_education_courses_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
				$lms_education_courses_custom_css .='box-shadow: '.esc_attr($lms_education_courses_products_box_shadow).'px '.esc_attr($lms_education_courses_products_box_shadow).'px '.esc_attr($lms_education_courses_products_box_shadow).'px #ddd;';
		$lms_education_courses_custom_css .='}';
	}

	$lms_education_courses_products_border_radius = get_theme_mod('lms_education_courses_products_border_radius');
	if($lms_education_courses_products_border_radius != false){
		$lms_education_courses_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$lms_education_courses_custom_css .='border-radius: '.esc_attr($lms_education_courses_products_border_radius).'px;';
		$lms_education_courses_custom_css .='}';
	}

	$lms_education_courses_products_btn_padding_top_bottom = get_theme_mod('lms_education_courses_products_btn_padding_top_bottom');
	if($lms_education_courses_products_btn_padding_top_bottom != false){
		$lms_education_courses_custom_css .='.woocommerce a.button{';
			$lms_education_courses_custom_css .='padding-top: '.esc_attr($lms_education_courses_products_btn_padding_top_bottom).' !important; padding-bottom: '.esc_attr($lms_education_courses_products_btn_padding_top_bottom).' !important;';
		$lms_education_courses_custom_css .='}';
	}

	$lms_education_courses_products_btn_padding_left_right = get_theme_mod('lms_education_courses_products_btn_padding_left_right');
	if($lms_education_courses_products_btn_padding_left_right != false){
		$lms_education_courses_custom_css .='.woocommerce a.button{';
			$lms_education_courses_custom_css .='padding-left: '.esc_attr($lms_education_courses_products_btn_padding_left_right).' !important; padding-right: '.esc_attr($lms_education_courses_products_btn_padding_left_right).' !important;';
		$lms_education_courses_custom_css .='}';
	}

	$lms_education_courses_products_button_border_radius = get_theme_mod('lms_education_courses_products_button_border_radius', 0);
	if($lms_education_courses_products_button_border_radius != false){
		$lms_education_courses_custom_css .='.woocommerce ul.products li.product .button, a.checkout-button.button.alt.wc-forward,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,.woocommerce a.button{';
			$lms_education_courses_custom_css .='border-radius: '.esc_attr($lms_education_courses_products_button_border_radius).'px !important;';
		$lms_education_courses_custom_css .='}';
	}

	$lms_education_courses_woocommerce_sale_position = get_theme_mod( 'lms_education_courses_woocommerce_sale_position','right');
    if($lms_education_courses_woocommerce_sale_position == 'left'){
		$lms_education_courses_custom_css .='.woocommerce ul.products li.product .onsale{';
			$lms_education_courses_custom_css .='left: 12px !important; right: auto !important;';
		$lms_education_courses_custom_css .='}';
	}else if($lms_education_courses_woocommerce_sale_position == 'right'){
		$lms_education_courses_custom_css .='.woocommerce ul.products li.product .onsale{';
			$lms_education_courses_custom_css .='left: auto!important; right: 0 !important;';
		$lms_education_courses_custom_css .='}';
	}

	$lms_education_courses_woocommerce_sale_font_size = get_theme_mod('lms_education_courses_woocommerce_sale_font_size');
	if($lms_education_courses_woocommerce_sale_font_size != false){
		$lms_education_courses_custom_css .='.woocommerce span.onsale{';
			$lms_education_courses_custom_css .='font-size: '.esc_attr($lms_education_courses_woocommerce_sale_font_size).';';
		$lms_education_courses_custom_css .='}';
	}

	$lms_education_courses_woocommerce_sale_padding_top_bottom = get_theme_mod('lms_education_courses_woocommerce_sale_padding_top_bottom');
	if($lms_education_courses_woocommerce_sale_padding_top_bottom != false){
		$lms_education_courses_custom_css .='.woocommerce span.onsale{';
			$lms_education_courses_custom_css .='padding-top: '.esc_attr($lms_education_courses_woocommerce_sale_padding_top_bottom).'; padding-bottom: '.esc_attr($lms_education_courses_woocommerce_sale_padding_top_bottom).';';
		$lms_education_courses_custom_css .='}';
	}

	$lms_education_courses_woocommerce_sale_padding_left_right = get_theme_mod('lms_education_courses_woocommerce_sale_padding_left_right');
	if($lms_education_courses_woocommerce_sale_padding_left_right != false){
		$lms_education_courses_custom_css .='.woocommerce span.onsale{';
			$lms_education_courses_custom_css .='padding-left: '.esc_attr($lms_education_courses_woocommerce_sale_padding_left_right).'; padding-right: '.esc_attr($lms_education_courses_woocommerce_sale_padding_left_right).';';
		$lms_education_courses_custom_css .='}';
	}

	$lms_education_courses_woocommerce_sale_border_radius = get_theme_mod('lms_education_courses_woocommerce_sale_border_radius', 0);
	if($lms_education_courses_woocommerce_sale_border_radius != false){
		$lms_education_courses_custom_css .='.woocommerce span.onsale{';
			$lms_education_courses_custom_css .='border-radius: '.esc_attr($lms_education_courses_woocommerce_sale_border_radius).'px;';
		$lms_education_courses_custom_css .='}';
	}

	/*----------------Social Icons Settings ------------------*/

	$lms_education_courses_social_icon_font_size = get_theme_mod('lms_education_courses_social_icon_font_size');
	if($lms_education_courses_social_icon_font_size != false){
		$lms_education_courses_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$lms_education_courses_custom_css .='font-size: '.esc_attr($lms_education_courses_social_icon_font_size).';';
		$lms_education_courses_custom_css .='}';
	}

	$lms_education_courses_social_icon_padding = get_theme_mod('lms_education_courses_social_icon_padding');
	if($lms_education_courses_social_icon_padding != false){
		$lms_education_courses_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$lms_education_courses_custom_css .='padding: '.esc_attr($lms_education_courses_social_icon_padding).';';
		$lms_education_courses_custom_css .='}';
	}

	$lms_education_courses_social_icon_width = get_theme_mod('lms_education_courses_social_icon_width');
	if($lms_education_courses_social_icon_width != false){
		$lms_education_courses_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$lms_education_courses_custom_css .='width: '.esc_attr($lms_education_courses_social_icon_width).';';
		$lms_education_courses_custom_css .='}';
	}

	$lms_education_courses_social_icon_height = get_theme_mod('lms_education_courses_social_icon_height');
	if($lms_education_courses_social_icon_height != false){
		$lms_education_courses_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$lms_education_courses_custom_css .='height: '.esc_attr($lms_education_courses_social_icon_height).';';
		$lms_education_courses_custom_css .='}';
	}

	$lms_education_courses_social_icon_border_radius = get_theme_mod('lms_education_courses_social_icon_border_radius');
	if($lms_education_courses_social_icon_border_radius != false){
		$lms_education_courses_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$lms_education_courses_custom_css .='border-radius: '.esc_attr($lms_education_courses_social_icon_border_radius).'px;';
		$lms_education_courses_custom_css .='}';
	}

	$lms_education_courses_resp_menu_toggle_btn_bg_color = get_theme_mod('lms_education_courses_resp_menu_toggle_btn_bg_color');
	if($lms_education_courses_resp_menu_toggle_btn_bg_color != false){
		$lms_education_courses_custom_css .='.toggle-nav i{';
			$lms_education_courses_custom_css .='background: '.esc_attr($lms_education_courses_resp_menu_toggle_btn_bg_color).';';
		$lms_education_courses_custom_css .='}';
	}

	$lms_education_courses_grid_featured_image_box_shadow = get_theme_mod('lms_education_courses_grid_featured_image_box_shadow',0);
	if($lms_education_courses_grid_featured_image_box_shadow != false){
		$lms_education_courses_custom_css .='.grid-post-main-box .box-image img, .grid-post-main-box .feature-box img, #content-vw img{';
			$lms_education_courses_custom_css .='box-shadow: '.esc_attr($lms_education_courses_grid_featured_image_box_shadow).'px '.esc_attr($lms_education_courses_grid_featured_image_box_shadow).'px '.esc_attr($lms_education_courses_grid_featured_image_box_shadow).'px #cccccc;';
		$lms_education_courses_custom_css .='}';
	}

	/*---------------------------Footer Style -------------------*/

	$lms_education_courses_theme_lay = get_theme_mod( 'lms_education_courses_footer_template','lms_education_courses-footer-one');
    if($lms_education_courses_theme_lay == 'lms_education_courses-footer-one'){
		$lms_education_courses_custom_css .='#footer{';
			$lms_education_courses_custom_css .='';
		$lms_education_courses_custom_css .='}';

	}else if($lms_education_courses_theme_lay == 'lms_education_courses-footer-two'){
		$lms_education_courses_custom_css .='#footer{';
			$lms_education_courses_custom_css .='background: linear-gradient(to right, #f9f8ff, #dedafa);';
		$lms_education_courses_custom_css .='}';
		$lms_education_courses_custom_css .='#footer p, #footer li a, #footer, #footer h3, #footer a.rsswidget, #footer #wp-calendar a, .copyright a, #footer .custom_details, #footer ins span, #footer .tagcloud a, .main-inner-box span.entry-date a, nav.woocommerce-MyAccount-navigation ul li:hover a, #footer ul li a, #footer table, #footer th, #footer td, #footer caption, #sidebar caption,#footer nav.wp-calendar-nav a,#footer .search-form .search-field{';
			$lms_education_courses_custom_css .='color:#000;';
		$lms_education_courses_custom_css .='}';
		$lms_education_courses_custom_css .='#footer ul li::before{';
			$lms_education_courses_custom_css .='background:#000;';
		$lms_education_courses_custom_css .='}';
		$lms_education_courses_custom_css .='#footer table, #footer th, #footer td,#footer .search-form .search-field,#footer .tagcloud a{';
			$lms_education_courses_custom_css .='border: 1px solid #000;';
		$lms_education_courses_custom_css .='}';

	}else if($lms_education_courses_theme_lay == 'lms_education_courses-footer-three'){
		$lms_education_courses_custom_css .='#footer{';
			$lms_education_courses_custom_css .='background: #232524;';
		$lms_education_courses_custom_css .='}';
	}
	else if($lms_education_courses_theme_lay == 'lms_education_courses-footer-four'){
		$lms_education_courses_custom_css .='#footer{';
			$lms_education_courses_custom_css .='background: #f7f7f7;';
		$lms_education_courses_custom_css .='}';
		$lms_education_courses_custom_css .='#footer p, #footer li a, #footer, #footer h3, #footer a.rsswidget, #footer #wp-calendar a, .copyright a, #footer .custom_details, #footer ins span, #footer .tagcloud a, .main-inner-box span.entry-date a, nav.woocommerce-MyAccount-navigation ul li:hover a, #footer ul li a, #footer table, #footer th, #footer td, #footer caption, #sidebar caption,#footer nav.wp-calendar-nav a,#footer .search-form .search-field{';
			$lms_education_courses_custom_css .='color:#000;';
		$lms_education_courses_custom_css .='}';
		$lms_education_courses_custom_css .='#footer ul li::before{';
			$lms_education_courses_custom_css .='background:#000;';
		$lms_education_courses_custom_css .='}';
		$lms_education_courses_custom_css .='#footer table, #footer th, #footer td,#footer .search-form .search-field,#footer .tagcloud a{';
			$lms_education_courses_custom_css .='border: 1px solid #000;';
		$lms_education_courses_custom_css .='}';
	}
	else if($lms_education_courses_theme_lay == 'lms_education_courses-footer-five'){
		$lms_education_courses_custom_css .='#footer{';
			$lms_education_courses_custom_css .='background: linear-gradient(to right, #01093a, #2d0b00);';
		$lms_education_courses_custom_css .='}';
	}

	/*---------------- Footer Settings ------------------*/

	$lms_education_courses_button_footer_heading_letter_spacing = get_theme_mod('lms_education_courses_button_footer_heading_letter_spacing',1);
	$lms_education_courses_custom_css .='#footer h3,a.rsswidget.rss-widget-title{';
		$lms_education_courses_custom_css .='letter-spacing: '.esc_attr($lms_education_courses_button_footer_heading_letter_spacing).'px;';
	$lms_education_courses_custom_css .='}';

	$lms_education_courses_button_footer_font_size = get_theme_mod('lms_education_courses_button_footer_font_size','30');
	$lms_education_courses_custom_css .='#footer h3,a.rsswidget.rss-widget-title{';
		$lms_education_courses_custom_css .='font-size: '.esc_attr($lms_education_courses_button_footer_font_size).'px;';
	$lms_education_courses_custom_css .='}';

	$lms_education_courses_theme_lay = get_theme_mod( 'lms_education_courses_button_footer_text_transform','Capitalize');
	if($lms_education_courses_theme_lay == 'Capitalize'){
		$lms_education_courses_custom_css .='#footer h3{';
			$lms_education_courses_custom_css .='text-transform:Capitalize;';
		$lms_education_courses_custom_css .='}';
	}
	if($lms_education_courses_theme_lay == 'Lowercase'){
		$lms_education_courses_custom_css .='#footer h3,a.rsswidget.rss-widget-title{';
			$lms_education_courses_custom_css .='text-transform:Lowercase;';
		$lms_education_courses_custom_css .='}';
	}
	if($lms_education_courses_theme_lay == 'Uppercase'){
		$lms_education_courses_custom_css .='#footer h3,a.rsswidget.rss-widget-title{';
			$lms_education_courses_custom_css .='text-transform:Uppercase;';
		$lms_education_courses_custom_css .='}';
	}

	$lms_education_courses_footer_heading_weight = get_theme_mod('lms_education_courses_footer_heading_weight','600');
	if($lms_education_courses_footer_heading_weight != false){
		$lms_education_courses_custom_css .='#footer h3,a.rsswidget.rss-widget-title{';
			$lms_education_courses_custom_css .='font-weight: '.esc_attr($lms_education_courses_footer_heading_weight).';';
		$lms_education_courses_custom_css .='}';
	}

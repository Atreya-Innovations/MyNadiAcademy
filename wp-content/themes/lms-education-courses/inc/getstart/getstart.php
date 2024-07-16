<?php
//about theme info
add_action( 'admin_menu', 'lms_education_courses_gettingstarted' );
function lms_education_courses_gettingstarted() {
	add_theme_page( esc_html__('About LMS Education Courses ', 'lms-education-courses'), esc_html__('About LMS Education Courses ', 'lms-education-courses'), 'edit_theme_options', 'lms_education_courses_guide', 'lms_education_courses_mostrar_guide');
}

// Add a Custom CSS file to WP Admin Area
function lms_education_courses_admin_theme_style() {
	wp_enqueue_style('lms-education-courses-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/getstart/getstart.css');
	wp_enqueue_script('lms-education-courses-tabs', esc_url(get_template_directory_uri()) . '/inc/getstart/js/tab.js');
}
add_action('admin_enqueue_scripts', 'lms_education_courses_admin_theme_style');

//guidline for about theme
function lms_education_courses_mostrar_guide() { 
	//custom function about theme customizer
	$lms_education_courses_return = add_query_arg( array()) ;
	$lms_education_courses_theme = wp_get_theme( 'lms-education-courses' );
?>

<div class="wrapper-info">
    <div class="col-left">
    	<h2><?php esc_html_e( 'Welcome to LMS Education Courses ', 'lms-education-courses' ); ?> <span class="version"><?php esc_html_e( 'Version', 'lms-education-courses' ); ?>: <?php echo esc_html($lms_education_courses_theme['Version']);?></span></h2>
    	<p><?php esc_html_e('All our WordPress themes are modern, minimalist, 100% responsive, seo-friendly,feature-rich, and multipurpose that best suit designers, bloggers and other professionals who are working in the creative fields.','lms-education-courses'); ?></p>
    </div>
    <div class="col-right">
    	<div class="logo">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/final-logo.png" alt="" />
		</div>
		<div class="update-now">
			<h4><?php esc_html_e('Buy LMS Education Courses at 20% Discount','lms-education-courses'); ?></h4>
			<h4><?php esc_html_e('Use Coupon','lms-education-courses'); ?> ( <span><?php esc_html_e('vwpro20','lms-education-courses'); ?></span> ) </h4>
			<div class="info-link">
				<a href="<?php echo esc_url(LMS_EDUCATION_COURSES_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Upgrade to Pro', 'lms-education-courses' ); ?></a>
			</div>
		</div>
	</div>

    <div class="tab-sec">
    	<div class="tab">
			<button class="tablinks" onclick="lms_education_courses_open_tab(event, 'lite_theme')"><?php esc_html_e( 'Setup With Customizer', 'lms-education-courses' ); ?></button>
			<button class="tablinks" onclick="lms_education_courses_open_tab(event, 'block_pattern')"><?php esc_html_e( 'Setup With Block Pattern', 'lms-education-courses' ); ?></button>
			<button class="tablinks" onclick="lms_education_courses_open_tab(event, 'gutenberg_editor')"><?php esc_html_e( 'Setup With Gutunberg Block', 'lms-education-courses' ); ?></button>
			<button class="tablinks" onclick="lms_education_courses_open_tab(event, 'product_addons_editor')"><?php esc_html_e( 'Woocommerce Product Addons', 'lms-education-courses' ); ?></button>
			<button class="tablinks" onclick="lms_education_courses_open_tab(event, 'theme_pro')"><?php esc_html_e( 'Get Premium', 'lms-education-courses' ); ?></button>
  			<button class="tablinks" onclick="lms_education_courses_open_tab(event, 'free_pro')"><?php esc_html_e( 'Support', 'lms-education-courses' ); ?></button>
		</div>

		<?php
			$lms_education_courses_plugin_custom_css = '';
			if(class_exists('Ibtana_Visual_Editor_Menu_Class')){
				$lms_education_courses_plugin_custom_css ='display: block';
			}
		?>
		<div id="lite_theme" class="tabcontent open">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
				$plugin_ins = LMS_Education_Courses_Plugin_Activation_Settings::get_instance();
				$lms_education_courses_actions = $plugin_ins->recommended_actions;
				?>
				<div class="lms-education-courses-recommended-plugins">
				    <div class="lms-education-courses-action-list">
				        <?php if ($lms_education_courses_actions): foreach ($lms_education_courses_actions as $key => $lms_education_courses_actionValue): ?>
				                <div class="lms-education-courses-action" id="<?php echo esc_attr($lms_education_courses_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($lms_education_courses_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($lms_education_courses_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($lms_education_courses_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" get-start-tab-id="lite-theme-tab" href="javascript:void(0);"><?php esc_html_e('Skip','lms-education-courses'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="lite-theme-tab" style="<?php echo esc_attr($lms_education_courses_plugin_custom_css); ?>">
				<h3><?php esc_html_e( 'Lite Theme Information', 'lms-education-courses' ); ?></h3>
				<hr class="h3hr">
				<p><?php esc_html_e('LMS Education Courses is a website template designed especially for schools and education related websites. Its a special design that helps you create an online space for learning, just like a classroom but on the internet. Imagine it as a tool that turns your website into an interactive and organized learning hub. With this theme, you can easily offer different courses, like you would in a real school, making it perfect for teachers, tutors, or anyone who wants to share knowledge. This theme is compatible with Tutor LMS Plugin and Woocommerce plugin. This theme can be used by university, high school, school management system,learning management system,  e-learning, online lessons,lms dashboard ,moodle, online classes, Online Learning Platform, training, academy ,udemy. Whether you are a teacher, instructor, trainer, tutor or mentor, this theme works well for everyone. This is online student portal that provides excellent working with advance online courses sell feature. The theme provides a user-friendly setup, so you dont need to be a tech expert to use it. Its designed to be as easy as possible, even if youre not familiar with complicated website stuff. The coolest part is that your students can access the courses from anywhere, anytime. Its like carrying a school in your pocket! The theme also helps you keep things organized – you can have different sections for various subjects, assignments, and even a way for students to interact with each other. This theme is a fantastic way to bring education to the digital world, making it accessible and enjoyable for everyone interested in expanding their knowledge. So, if you want to create an online learning space hassle-free, this theme is your go-to tool. Demo: https://www.vwthemes.net/vw-lms-education-courses/','lms-education-courses'); ?></p>
			  	<div class="col-left-inner">
			  		<h4><?php esc_html_e( 'Theme Documentation', 'lms-education-courses' ); ?></h4>
					<p><?php esc_html_e( 'If you need any assistance regarding setting up and configuring the Theme, our documentation is there.', 'lms-education-courses' ); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( LMS_EDUCATION_COURSES_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'lms-education-courses' ); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Theme Customizer', 'lms-education-courses'); ?></h4>
					<p> <?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'lms-education-courses'); ?></p>
					<div class="info-link">
						<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'lms-education-courses'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Having Trouble, Need Support?', 'lms-education-courses'); ?></h4>
					<p> <?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'lms-education-courses'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( LMS_EDUCATION_COURSES_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'lms-education-courses'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Reviews & Testimonials', 'lms-education-courses'); ?></h4>
					<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'lms-education-courses'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( LMS_EDUCATION_COURSES_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'lms-education-courses'); ?></a>
					</div>

					<div class="link-customizer">
						<h3><?php esc_html_e( 'Link to customizer', 'lms-education-courses' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','lms-education-courses'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=lms_education_courses_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','lms-education-courses'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-slides"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=lms_education_courses_slidersettings') ); ?>" target="_blank"><?php esc_html_e('Slider Settings','lms-education-courses'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-category"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=lms_education_courses_degree_courses_section') ); ?>" target="_blank"><?php esc_html_e('Degree and Courses Section','lms-education-courses'); ?></a>
								</div>
							</div>
						
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','lms-education-courses'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','lms-education-courses'); ?></a>
								</div>
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=lms_education_courses_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','lms-education-courses'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=lms_education_courses_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','lms-education-courses'); ?></a>
								</div>
							</div>
						</div>
					</div>
			  	</div>
				<div class="col-right-inner">
					<h3 class="page-template"><?php esc_html_e('How to set up Home Page Template','lms-education-courses'); ?></h3>
				  	<hr class="h3hr">
					<p><?php esc_html_e('Follow these instructions to setup Home page.','lms-education-courses'); ?></p>
                  	<p><span class="strong"><?php esc_html_e('1. Create a new page :','lms-education-courses'); ?></span><?php esc_html_e(' Go to ','lms-education-courses'); ?>
					  	<b><?php esc_html_e(' Dashboard >> Pages >> Add New Page','lms-education-courses'); ?></b></p>
                  	<p><?php esc_html_e('Name it as "Home" then select the template "Custom Home Page".','lms-education-courses'); ?></p>
                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/home-page-template.png" alt="" />
                  	<p><span class="strong"><?php esc_html_e('2. Set the front page:','lms-education-courses'); ?></span><?php esc_html_e(' Go to ','lms-education-courses'); ?>
					  	<b><?php esc_html_e(' Settings >> Reading ','lms-education-courses'); ?></b></p>
				  	<p><?php esc_html_e('Select the option of Static Page, now select the page you created to be the homepage, while another page to be your default page.','lms-education-courses'); ?></p>
                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/set-front-page.png" alt="" />
                  	<p><?php esc_html_e(' Once you are done with setup, then follow the','lms-education-courses'); ?> <a class="doc-links" href="<?php echo esc_url( LMS_EDUCATION_COURSES_FREE_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation','lms-education-courses'); ?></a></p>
			  	</div>
			</div>
		</div>
		

		<div id="block_pattern" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){
				$plugin_ins = LMS_Education_Courses_Plugin_Activation_Settings::get_instance();
				$lms_education_courses_actions = $plugin_ins->recommended_actions;
				?>
				<div class="lms-education-courses-recommended-plugins">
				    <div class="lms-education-courses-action-list">
				        <?php if ($lms_education_courses_actions): foreach ($lms_education_courses_actions as $key => $lms_education_courses_actionValue): ?>
				                <div class="lms-education-courses-action" id="<?php echo esc_attr($lms_education_courses_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($lms_education_courses_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($lms_education_courses_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($lms_education_courses_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" href="javascript:void(0);" get-start-tab-id="gutenberg-editor-tab"><?php esc_html_e('Skip','lms-education-courses'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="gutenberg-editor-tab" style="<?php echo esc_attr($lms_education_courses_plugin_custom_css); ?>">
				<div class="block-pattern-img">
				  	<h3><?php esc_html_e( 'Block Patterns', 'lms-education-courses' ); ?></h3>
					<hr class="h3hr">
					<p><?php esc_html_e('Follow the below instructions to setup Home page with Block Patterns.','lms-education-courses'); ?></p>
	              	<p><b><?php esc_html_e('Click on Below Add new page button >> Click on "+" Icon.','lms-education-courses'); ?></b></p>
	              	<div class="lms-education-courses-pattern-page">
				    	<a href="javascript:void(0)" class="vw-pattern-page-btn button-primary button"><?php esc_html_e('Add New Page','lms-education-courses'); ?></a>
				    </div>
				    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/block-pattern1.png" alt="" />
				    	<p><b><?php esc_html_e('Click on Patterns Tab >> Click on Theme Name >> Click on Sections >> Publish.','lms-education-courses'); ?></b></p>
	              	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/block-pattern.png" alt="" />
	            </div>

	            <div class="block-pattern-link-customizer">
					<h3><?php esc_html_e( 'Link to customizer', 'lms-education-courses' ); ?></h3>
					<hr class="h3hr">
					<div class="first-row">
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','lms-education-courses'); ?></a>
							</div>
							<div class="row-box2">
								<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=lms_education_courses_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','lms-education-courses'); ?></a>
							</div>
						</div>
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','lms-education-courses'); ?></a>
							</div>

							<div class="row-box2">
								<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=lms_education_courses_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','lms-education-courses'); ?></a>
							</div>
						</div>

						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=lms_education_courses_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','lms-education-courses'); ?></a>
							</div>
							 <div class="row-box2">
								<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','lms-education-courses'); ?></a>
							</div>
						</div>
					</div>
				</div>
	     	</div>
		</div>
		
		<div id="gutenberg_editor" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = LMS_Education_Courses_Plugin_Activation_Settings::get_instance();
			$lms_education_courses_actions = $plugin_ins->recommended_actions;
			?>
				<div class="lms-education-courses-recommended-plugins">
				    <div class="lms-education-courses-action-list">
				        <?php if ($lms_education_courses_actions): foreach ($lms_education_courses_actions as $key => $lms_education_courses_actionValue): ?>
				                <div class="lms-education-courses-action" id="<?php echo esc_attr($lms_education_courses_actionValue['id']);?>">
			                        <div class="action-inner plugin-activation-redirect">
			                            <h3 class="action-title"><?php echo esc_html($lms_education_courses_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($lms_education_courses_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($lms_education_courses_actionValue['link']); ?>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Gutunberg Blocks', 'lms-education-courses' ); ?></h3>
				<hr class="h3hr">
				<div class="lms-education-courses-pattern-page">
			    	<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-templates' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Ibtana Settings','lms-education-courses'); ?></a>
			    </div>

			    <div class="link-customizer-with-guternberg-ibtana">
	              	<div class="link-customizer-with-block-pattern">
						<h3><?php esc_html_e( 'Link to customizer', 'lms-education-courses' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','lms-education-courses'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=lms_education_courses_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','lms-education-courses'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','lms-education-courses'); ?></a>
								</div>
								
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=lms_education_courses_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','lms-education-courses'); ?></a>
								</div>
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=lms_education_courses_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','lms-education-courses'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','lms-education-courses'); ?></a>
								</div> 
							</div>
						</div>
					</div>	
				</div>
			<?php } ?>
		</div>

		<div id="product_addons_editor" class="tabcontent">
				<?php if(!class_exists('IEPA_Loader')){
				$plugin_ins = LMS_Education_Courses_Plugin_Activation_Woo_Products::get_instance();
				$lms_education_courses_actions = $plugin_ins->recommended_actions;
				?>
				<div class="lms-education-courses-recommended-plugins">
				    <div class="lms-education-courses-action-list">
				        <?php if ($lms_education_courses_actions): foreach ($lms_education_courses_actions as $key => $lms_education_courses_actionValue): ?>
				                <div class="lms-education-courses-action" id="<?php echo esc_attr($lms_education_courses_actionValue['id']);?>">
			                        <div class="action-inner plugin-activation-redirect">
			                            <h3 class="action-title"><?php echo esc_html($lms_education_courses_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($lms_education_courses_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($lms_education_courses_actionValue['link']); ?>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Woocommerce Products Blocks', 'lms-education-courses' ); ?></h3>
				<hr class="h3hr">
				<div class="lms-education-courses-pattern-page">
					<p><?php esc_html_e('Follow the below instructions to setup Products Templates.','lms-education-courses'); ?></p>
					<p><b><?php esc_html_e('1. First you need to activate these plugins','lms-education-courses'); ?></b></p>
						<p><?php esc_html_e('1. Ibtana - WordPress Website Builder ','lms-education-courses'); ?></p>
						<p><?php esc_html_e('2. Ibtana - Ecommerce Product Addons.','lms-education-courses'); ?></p>
						<p><?php esc_html_e('3. Woocommerce','lms-education-courses'); ?></p>

					<p><b><?php esc_html_e('2. Go To Dashboard >> Ibtana Settings >> Woocommerce Templates','lms-education-courses'); ?></b></p>
	              	<div class="lms-education-courses-pattern-page">
			    		<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-woocommerce-templates&ive_wizard_view=parent' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Woocommerce Templates','lms-education-courses'); ?></a>
			    	</div>
	              	<p><?php esc_html_e('You can create a template as you like.','lms-education-courses'); ?></p>
			    </div>
			<?php } ?>
		</div>

		<div id="theme_pro" class="tabcontent">
		  	<h3><?php esc_html_e( 'Premium Theme Information', 'lms-education-courses' ); ?></h3>
			<hr class="h3hr">
		    <div class="col-left-pro">
		    	<p><?php esc_html_e('The LMS Education WordPress Theme stands as an innovative solution meticulously designed for educators and institutions committed to providing an outstanding online learning environment. Engineered with precision, this theme seamlessly integrates with the Tutor LMS plugin, offering a flexible framework adaptable to a wide range of educational needs. The theme is constructed on a robust foundation and ensures optimal performance and responsiveness across diverse devices. Notably, it provides extensive customization options, granting users control over color schemes, typography, and layout settings. This adaptability empowers administrators to craft a distinctive and visually compelling learning space aligned with their brand identity. Functionality is a primary strength, featuring advanced course management, student profiles, progress tracking, and interactive quiz capabilities through the Tutor LMS plugin. These attributes empower educators to deliver dynamic and immersive learning experiences. Seamless social media integration facilitates easy content sharing across different platforms. From a technical standpoint, the theme places a premium on search engine optimization (SEO), ensuring that educational content ranks prominently in search results. The Tutor LMS Education WordPress Theme stands at the forefront of online education solutions, offering technical excellence, seamless LMS integration, customization versatility, and rich features—an ideal choice for those aiming to establish a premium, user-centric, and technologically advanced online learning presence.','lms-education-courses'); ?></p>
		    	<div class="pro-links">
			    	<a href="<?php echo esc_url( LMS_EDUCATION_COURSES_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'lms-education-courses'); ?></a>
					<a href="<?php echo esc_url( LMS_EDUCATION_COURSES_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'lms-education-courses'); ?></a>
					<a href="<?php echo esc_url( LMS_EDUCATION_COURSES_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'lms-education-courses'); ?></a>
				</div>
		    </div>
		    <div class="col-right-pro">
		    	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/responsive.png" alt="" />
		    </div>
		    <div class="featurebox">
			    <h3><?php esc_html_e( 'Theme Features', 'lms-education-courses' ); ?></h3>
				<hr class="h3hr">
				<div class="table-image">
					<table class="tablebox">
						<thead>
							<tr>
								<th></th>
								<th><?php esc_html_e('Free Themes', 'lms-education-courses'); ?></th>
								<th><?php esc_html_e('Premium Themes', 'lms-education-courses'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php esc_html_e('Theme Customization', 'lms-education-courses'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Responsive Design', 'lms-education-courses'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Logo Upload', 'lms-education-courses'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Social Media Links', 'lms-education-courses'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Slider / Banner Settings', 'lms-education-courses'); ?></td>
								<td class="table-img"><?php esc_html_e('Slider', 'lms-education-courses'); ?></td>
								<td class="table-img"><?php esc_html_e('Banner', 'lms-education-courses'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Number of Slides', 'lms-education-courses'); ?></td>
								<td class="table-img"><?php esc_html_e('3', 'lms-education-courses'); ?></td>
								<td class="table-img"><?php esc_html_e('0', 'lms-education-courses'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Template Pages', 'lms-education-courses'); ?></td>
								<td class="table-img"><?php esc_html_e('3', 'lms-education-courses'); ?></td>
								<td class="table-img"><?php esc_html_e('13', 'lms-education-courses'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Home Page Template', 'lms-education-courses'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'lms-education-courses'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'lms-education-courses'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Theme sections', 'lms-education-courses'); ?></td>
								<td class="table-img"><?php esc_html_e('2', 'lms-education-courses'); ?></td>
								<td class="table-img"><?php esc_html_e('12', 'lms-education-courses'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Contact us Page Template', 'lms-education-courses'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('1', 'lms-education-courses'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Blog Templates & Layout', 'lms-education-courses'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('3(Full width/Left/Right Sidebar)', 'lms-education-courses'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Unlimited Courses & Category', 'lms-education-courses'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Single Course page', 'lms-education-courses'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Color Pallete For Particular Sections', 'lms-education-courses'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Global Color Option', 'lms-education-courses'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Reordering', 'lms-education-courses'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Demo Importer', 'lms-education-courses'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Allow To Set Site Title, Tagline, Logo', 'lms-education-courses'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Enable Disable Options On All Sections, Logo', 'lms-education-courses'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Full Documentation', 'lms-education-courses'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Latest WordPress Compatibility', 'lms-education-courses'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Woo-Commerce Compatibility', 'lms-education-courses'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support 3rd Party Plugins', 'lms-education-courses'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Secure and Optimized Code', 'lms-education-courses'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Exclusive Functionalities', 'lms-education-courses'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Enable / Disable', 'lms-education-courses'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Google Font Choices', 'lms-education-courses'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Gallery', 'lms-education-courses'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Simple & Mega Menu Option', 'lms-education-courses'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Support to add custom CSS / JS ', 'lms-education-courses'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Shortcodes', 'lms-education-courses'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'lms-education-courses'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Premium Membership', 'lms-education-courses'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Budget Friendly Value', 'lms-education-courses'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Priority Error Fixing', 'lms-education-courses'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Custom Feature Addition', 'lms-education-courses'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('All Access Theme Pass', 'lms-education-courses'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Seamless Customer Support', 'lms-education-courses'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('WordPress 6.4 or later', 'lms-education-courses'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('PHP 8.2 or 8.3', 'lms-education-courses'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('MySQL 5.6 (or greater) | MariaDB 10.0 (or greater)', 'lms-education-courses'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td></td>
								<td class="table-img"></td>
								<td class="update-link"><a href="<?php echo esc_url( LMS_EDUCATION_COURSES_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Upgrade to Pro', 'lms-education-courses'); ?></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div id="free_pro" class="tabcontent">
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-star-filled"></span><?php esc_html_e('Pro Version', 'lms-education-courses'); ?></h4>
				<p> <?php esc_html_e('To gain access to extra theme options and more interesting features, upgrade to pro version.', 'lms-education-courses'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( LMS_EDUCATION_COURSES_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'lms-education-courses'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-cart"></span><?php esc_html_e('Pre-purchase Queries', 'lms-education-courses'); ?></h4>
				<p> <?php esc_html_e('If you have any pre-sale query, we are prepared to resolve it.', 'lms-education-courses'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( LMS_EDUCATION_COURSES_CONTACT ); ?>" target="_blank"><?php esc_html_e('Question', 'lms-education-courses'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-admin-customizer"></span><?php esc_html_e('Child Theme', 'lms-education-courses'); ?></h4>
				<p> <?php esc_html_e('For theme file customizations, make modifications in the child theme and not in the main theme file.', 'lms-education-courses'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( LMS_EDUCATION_COURSES_CHILD_THEME ); ?>" target="_blank"><?php esc_html_e('About Child Theme', 'lms-education-courses'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-admin-comments"></span><?php esc_html_e('Frequently Asked Questions', 'lms-education-courses'); ?></h4>
				<p> <?php esc_html_e('We have gathered top most, frequently asked questions and answered them for your easy understanding. We will list down more as we get new challenging queries. Check back often.', 'lms-education-courses'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( LMS_EDUCATION_COURSES_FAQ ); ?>" target="_blank"><?php esc_html_e('View FAQ','lms-education-courses'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-sos"></span><?php esc_html_e('Support Queries', 'lms-education-courses'); ?></h4>
				<p> <?php esc_html_e('If you have any queries after purchase, you can contact us. We are eveready to help you out.', 'lms-education-courses'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( LMS_EDUCATION_COURSES_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Contact Us', 'lms-education-courses'); ?></a>
				</div>
		  	</div>
		</div>
	</div>
</div>

<?php } ?>
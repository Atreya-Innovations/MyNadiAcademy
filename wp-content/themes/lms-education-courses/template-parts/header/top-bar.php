<?php
/**
 * The template part for Top Header
 *
 * @package LMS Education Courses 
 * @subpackage lms-education-courses
 * @since lms-education-courses 1.0
 */
?>
<!-- Top Header -->
<div class="topbar">
  <div class="container">
    <div class="row pt-lg-0 pt-md-0 pt-3">
      <div class="col-lg-2 col-md-3 col-12 align-self-center text-lg-start text-md-start text-center">
        <div class="logo">
          <?php if ( has_custom_logo() ) : ?>
            <div class="site-logo"><?php the_custom_logo(); ?></div>
              <?php endif; ?>
              <?php $blog_info = get_bloginfo( 'name' ); ?>
                <?php if ( ! empty( $blog_info ) ) : ?>
                  <?php if ( is_front_page() && is_home() ) : ?>
                    <?php if( get_theme_mod('lms_education_courses_logo_title_hide_show',true) == 1){ ?>
                      <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                    <?php } ?>
                  <?php else : ?>
                    <?php if( get_theme_mod('lms_education_courses_logo_title_hide_show',true) == 1){ ?>
                      <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                    <?php } ?>
                  <?php endif; ?>
                <?php endif; ?>
                <?php
                  $description = get_bloginfo( 'description', 'display' );
                  if ( $description || is_customize_preview() ) :
                ?>
                <?php if( get_theme_mod('lms_education_courses_tagline_hide_show',false) == 1){ ?>
                  <p class="site-description mb-0">
                    <?php echo esc_html($description); ?>
                  </p>
                <?php } ?>
            <?php endif; ?>
        </div>
      </div>
      <div class="col-lg-7 col-md-3 col-3 align-self-center text-lg-start text-md-start text-end  pt-lg-0 pt-md-0 pt-3">
        <div class="menu-section">
          <?php get_template_part('template-parts/header/navigation'); ?>
        </div>
      </div>
      <div class="col-lg-1 col-md-3 col-3 align-self-center text-lg-end text-md-center text-center  pt-lg-0 pt-md-0 pt-3">
        <?php if( get_theme_mod( 'lms_education_courses_header_search',true) == 1) { ?>
            <div class="search-box">
              <span><a href="#"><i class='fas fa-search mx-2'></i></a></span>
            </div>
        <?php }?>
        <div class="serach_outer align-self-center text-center text-lg-start text-md-start py-lg-0 py-md-0 py-3">
          <div class="closepop"><a href="#maincontent"><i class='fa fa-window-close me-2'></i></a></div>
          <div class="serach_inner">
            <?php get_search_form(); ?>
          </div>
        </div>
      </div>
      <div class="col-lg-2 col-md-3 col-6 align-self-center topbar-btn text-lg-center text-md-center text-center  pt-lg-0 pt-md-0 pt-3">
        <?php if ( get_theme_mod('lms_education_courses_topbar_button_label','Log In / Register') != '' ) {?>
          <div class ="topbar-button">
            <a href="<?php echo esc_url(get_theme_mod('lms_education_courses_topbar_button_url',false));?>"><?php echo esc_html(get_theme_mod('lms_education_courses_topbar_button_label','Log In / Register'));?><span class="screen-reader-text"><?php esc_html_e( 'Log In / Register','lms-education-courses');?></span></a>
          </div>
        <?php }?>
      </div>
    </div>
  </div>
</div>
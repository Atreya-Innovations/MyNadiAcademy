<?php
/**
 * Template Name: Custom Home Page
 */

get_header(); ?>

<main id="maincontent" role="main">
  <?php do_action( 'lms_education_courses_before_slider' ); ?>

  <?php if( get_theme_mod( 'lms_education_courses_slider_hide_show', false) == 1 || get_theme_mod( 'lms_education_courses_resp_slider_hide_show', false) == 1) { ?>
    <section id="slider">       
      <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel" data-bs-interval="<?php echo esc_attr(get_theme_mod( 'lms_education_courses_slider_speed',4000)) ?>">
          <?php $lms_education_courses_pages = array();
            for ( $count = 1; $count <= 3; $count++ ) {
              $mod = intval( get_theme_mod( 'lms_education_courses_slider_page' . $count ));
              if ( 'page-none-selected' != $mod ) {
                $lms_education_courses_pages[] = $mod;
              }
            }
            if( !empty($lms_education_courses_pages) ) :
              $args = array(
                'post_type' => 'page',
                'post__in' => $lms_education_courses_pages,
                'orderby' => 'post__in'
              );
              $query = new WP_Query( $args );
              if ( $query->have_posts() ) :
                $i = 1;
          ?>
          <div class="carousel-inner" role="listbox">
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
              <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
                <?php if(has_post_thumbnail()){
                  the_post_thumbnail();
                } else{?>
                  <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/slider.png" alt="" />
                <?php } ?>
                <div class="carousel-caption">
                  <div class="inner_carousel">
                    <h1 class="wow slideInRight delay-1000" data-wow-duration="2s"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                    <p class="wow slideInRight delay-1000" data-wow-duration="2s"><?php $lms_education_courses_excerpt = get_the_excerpt(); echo esc_html( lms_education_courses_string_limit_words( $lms_education_courses_excerpt, esc_attr(get_theme_mod('lms_education_courses_slider_excerpt_number','10')))); ?></p>
                    <?php
                    $lms_education_courses_button_text = get_theme_mod('lms_education_courses_slider_button_text','Get Start');
                    $lms_education_courses_button_link = get_theme_mod('lms_education_courses_top_button_url', '');
                    if (empty($lms_education_courses_button_link)) {
                      $lms_education_courses_button_link = get_permalink();
                    }
                    if ($lms_education_courses_button_text || !empty($lms_education_courses_button_link)) { ?>
                      <div class="more-btn mt-0 my-lg-4 my-md-2 wow slideInRight delay-1000" data-wow-duration="2s">
                        <?php if( get_theme_mod('lms_education_courses_slider_button_text','Get Start') != ''){ ?>
                          <a href="<?php echo esc_url($lms_education_courses_button_link); ?>" class="button redmor">
                          <?php echo esc_html($lms_education_courses_button_text); ?>
                            <span class="screen-reader-text"><?php echo esc_html($lms_education_courses_button_text); ?></span>
                          </a>
                        <?php } ?>
                      </div>
                    <?php } ?>
                    <hr class="slider-line">
                    <div class="row tutor-certified">
                      <div class="col-lg-6 col-md-6 align-self-center certified-text-sec1 d-flex gap-1">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/tutor-count.png" alt="" />
                        <span class="small-text1 d-flex gap-3"><?php echo esc_html(get_theme_mod('lms_education_courses_certified_text_small_title1',''));?></span>
                      </div>
                      <div class="col-lg-6 col-md-6 certified-text-sec align-self-center d-flex gap-3" >
                        <span><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/teachers.png" alt="" /></span>
                        <div class="row">
                          <div class="col-lg-12">
                            <span class="small-text2"><?php echo esc_html(get_theme_mod('lms_education_courses_certified_text_small_title2',''));?></span>
                          </div>
                          <div class="col-lg-12">
                            <span class="small-text3"><?php echo esc_html(get_theme_mod('lms_education_courses_certified_text_small_title3',''));?></span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php $i++; endwhile; 
            wp_reset_postdata();?>
          </div>
          <?php else : ?>
            <div class="no-postfound"></div>
          <?php endif;
          endif;?>
          <?php if(get_theme_mod('lms_education_courses_slider_arrow_hide_show', true)){?>
            <a class="carousel-control-prev" data-bs-target="#carouselExampleInterval" data-bs-slide="prev" role="button">
              <span class="carousel-control-prev-icon w-auto h-auto" aria-hidden="true"><i class="<?php echo esc_attr(get_theme_mod('lms_education_courses_slider_prev_icon','fas fa-angle-left')); ?>"></i></span>
            </a>
            <a class="carousel-control-next" data-bs-target="#carouselExampleInterval" data-bs-slide="next" role="button">
              <span class="carousel-control-next-icon w-auto h-auto" aria-hidden="true"><i class="<?php echo esc_attr(get_theme_mod('lms_education_courses_slider_next_icon','fas fa-angle-right')); ?>"></i></span>
            </a>
          <?php }?>
        </div>
    </section>
    <?php }?>
<?php do_action( 'lms_education_courses_after_slider' ); ?>

<!-- best-product Section -->
<?php if( get_theme_mod( 'lms_education_courses_degree_courses_heading')|| get_theme_mod( 'lms_education_degree_courses_text_small_title')) { ?>
  <section id="degree-courses" class="section-degree-courses py-5" >
    <div class="container">
      <div class="degree-courses">
          <?php if( get_theme_mod('lms_education_courses_degree_courses_small_title') != '' ){ ?>
            <p class="small-text"><?php echo esc_html(get_theme_mod('lms_education_courses_degree_courses_small_title',''));?></p>
          <?php }?>
          <?php if( get_theme_mod('lms_education_courses_degree_courses_heading') != '' ){ ?>
            <h2 class="heading-text"><?php echo esc_html(get_theme_mod('lms_education_courses_degree_courses_heading',''));?></h2>
          <?php }?>
      </div>
      <div class="row align-items-center pt-4">
        <?php
        $args = array(
            'posts_per_page' => 8,
            'post_type' => 'courses'
          );
        $loop = new WP_Query($args);
        ?>
        <?php while ( $loop->have_posts() ) : $loop->the_post(); global $post;
        ?>
          <div class="col-lg-3 col-sm-6 col-12 mb-3 courses-box position-relative">
            <?php
              $lms_education_courses_post_id = get_the_ID();
              $lms_education_courses_is_wish_listed = tutor_utils()->is_wishlisted( $lms_education_courses_post_id );
              $lms_education_courses_login_url_attr = '';
              $lms_education_courses_action_class   = '';

              $_course_duration = get_post_meta($lms_education_courses_post_id,'_course_duration',true);

              $lms_education_courses_student_enrolled = tutor_utils()->count_enrolled_users_by_course();

              $hours = '0h';$minutes = '0min';
              if ($_course_duration != '') {
                $hours = $_course_duration['hours'] . 'h';
                $minutes = $_course_duration['minutes'] . 'min';
              }

              $_tutor_course_level = get_post_meta($post->ID,'_tutor_course_level',true);
              $lms_education_courses_level = str_replace('_', ' ', $_tutor_course_level);

              if ( is_user_logged_in() ) {
                $lms_education_courses_action_class = apply_filters( 'tutor_wishlist_btn_class', 'tutor-course-wishlist-btn' );
              } else {
                $lms_education_courses_action_class = apply_filters( 'tutor_popup_login_class', 'tutor-open-login-modal' );

                if ( ! tutor_utils()->get_option( 'enable_tutor_native_login', null, true, true ) ) {
                  $lms_education_courses_login_url_attr = 'data-login_url="' . esc_url( wp_login_url() ) . '"';
                }
              }
              // phpcs:disable WordPress.Security.EscapeOutput.OutputNotEscaped -- $lms_education_courses_login_url_attr contain safe data
                echo '<a href="javascript:;" ' . $lms_education_courses_login_url_attr . ' class="' . esc_attr( $lms_education_courses_action_class ) . ' save-bookmark-btn tutor-iconic-btn tutor-iconic-btn-secondary" data-course-id="' . esc_attr( $lms_education_courses_post_id ) . '">
                        <i class="' . ( $lms_education_courses_is_wish_listed ? 'tutor-icon-bookmark-bold' : 'tutor-icon-bookmark-line' ) . '"></i>
                    </a>';
              ?>
            <div class="course-img">
              <?php the_post_thumbnail();?>
            </div>

            <div class="product-contain-main-box">
              <div class="course-rating">
                <?php $lms_education_courses_course_rating = tutor_utils()->get_course_rating();?>
                <div class="d-flex tutor-loop-rating-wrap <?php echo esc_attr(!$lms_education_courses_course_rating->rating_count ? 'no-rating' : ''); ?>">
                  <?php tutor_utils()->star_rating_generator($lms_education_courses_course_rating->rating_avg);?>
                  <span class="ms-2"> (<?php echo esc_html($lms_education_courses_course_rating->rating_avg); ?> / 5.0)</span>
                </div>
              </div>
              <h4 class="courses-title" style="line-height:0">
                <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
                </a>
              </h4>
              <div class="course-time-outer row mt-2">
                <div class="student-enroll-main col-lg-4 col-5">
                   <div class="d-flex align-items-center"><span class="tutor-icon-user-line tutor-meta-icon" area-hidden="true"></span><p class="mb-0 course-count"><?php echo esc_html($lms_education_courses_student_enrolled);?></p>
                   </div>
                </div>
                <div class="course-time  col-lg-8 col-7">
                  <div class="d-flex align-items-center"><span class="tutor-icon-clock-line tutor-meta-icon" area-hidden="true"> </span><p class="mb-0 course-count"><?php echo esc_html($hours.$minutes); ?></p></div>
                </div>
              </div>
              <div class="course-price-outer d-flex justify-content-between mt-2">
                <div class="tutor-course-pricing">
                  <?php echo esc_html(tutor_course_loop_price()); ?>
                </div>
                <div class="course-level">
                  <?php echo esc_html(ucfirst($lms_education_courses_level)); ?>
                </div>
              </div>
            </div>
          </div>
        <?php endwhile; wp_reset_query(); ?>
      </div>
    </div>
  </section>
<?php }?>
<?php do_action( 'lms_education_courses_after_degree_courses_section' ); ?>

  <div id="content-vw" class="entry-content py-3">
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>
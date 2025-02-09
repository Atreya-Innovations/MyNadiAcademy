<?php

/**
 * The template for displaying course content within loops
 *
 * This template can be overridden by copying it to yourtheme/masteriyo/content-course-2.php.
 *
 * HOWEVER, on occasion Masteriyo will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @package Masteriyo\Templates
 * @version 1.10.0
 */

defined( 'ABSPATH' ) || exit;

global $course;

// Ensure visibility.
if ( empty( $course ) || ! $course->is_visible() ) {
	return;
}

$author     = masteriyo_get_user( $course->get_author_id() );
$difficulty = $course->get_difficulty();
$categories = $course->get_categories( 'name' );

?>
<div class="masteriyo-course-card">
<?php
	/**
	 * Fires an action before the layout 2 course thumbnail is displayed.
	 *
	 * @param \Masteriyo\Models\Course $course The course object.
	 *
	 * @since 1.10.0
	 */
	do_action( 'masteriyo_before_layout_2_course_thumbnail', $course );
?>

	<!-- Course Image -->
	<img class="masteriyo-course-card__thumbnail-image" src="<?php echo esc_attr( $course->get_featured_image_url( 'masteriyo_medium' ) ); ?>" alt="<?php echo esc_attr( $course->get_title() ); ?>">

	<?php
		/**
		 * Fires an action after the layout 2 course thumbnail is displayed.
		 *
		 * @param \Masteriyo\Models\Course $course The course object.
		 *
		 * @since 1.10.0
		 */
		do_action( 'masteriyo_after_layout_2_course_thumbnail', $course );
	?>

	<div class="masteriyo-course-card__content">
		<!-- Course category -->
		<div class="masteriyo-course-card__content--category">
			<?php if ( ! empty( $categories ) ) : ?>
				<?php foreach ( $categories as $category ) : ?>
					<a href="<?php echo esc_attr( $category->get_permalink() ); ?>" alt="<?php echo esc_attr( $category->get_name() ); ?>" class="masteriyo-course-category">
						<?php echo esc_html( $category->get_name() ); ?>
					</a>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>

		<a href="<?php echo esc_url( $course->get_permalink() ); ?>" class="masteriyo-course-card__content--course-title">
			<h3 class="masteriyo-course-title"><?php echo esc_html( $course->get_title() ); ?></h3>
		</a>

		<div class="masteriyo-course-card__content--rating-amount">
			<div class="masteriyo-course-card__content--rating">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
					<path d="M21.947 9.179a1.001 1.001 0 00-.868-.676l-5.701-.453-2.467-5.461a.998.998 0 00-1.822-.001L8.622 8.05l-5.701.453a1 1 0 00-.619 1.713l4.213 4.107-1.49 6.452a1 1 0 001.53 1.057L12 18.202l5.445 3.63a1.001 1.001 0 001.517-1.106l-1.829-6.4 4.536-4.082c.297-.268.406-.686.278-1.065z"></path>
				</svg>
				<?php echo wp_kses_post( masteriyo_get_svg( 'full_star' ) ); ?> <?php echo esc_html( masteriyo_format_decimal( $course->get_average_rating(), 1, true ) ); ?> <?php echo '(' . esc_html( $course->get_review_count() . ')' ); ?>
			</div>

			<div class="masteriyo-course-card__content--amount">
				<?php if ( $course->get_regular_price() && ( '0' === $course->get_sale_price() || ! empty( $course->get_sale_price() ) ) ) : ?>
					<div class="masteriyo-course-card__content--amount-offer-price"><?php echo wp_kses_post( masteriyo_price( $course->get_regular_price() ) ); ?></div>
				<?php endif; ?>
				<span class="masteriyo-course-card__content--amount-sale-price"><?php echo wp_kses_post( masteriyo_price( $course->get_price() ) ); ?></span>
			</div>
		</div>

		<div class="masteriyo-course-card__content--container d-none">
		<?php

			/**
			 * Action hook that fires before the layout 2 course description has been rendered.
			 *
			 * @param \Masteriyo\Models\Course $course The course object.
			 *
			 * @since 1.10.0
			 */
			do_action( 'masteriyo_before_layout_2_course_description', $course );
		?>
			<p class="masteriyo-course-card__content--desc">
				<?php echo wp_kses_post( wp_trim_words( $course->get_description(), 20, '...' ) ); ?>
			</p>
			<?php

			/**
			 * Action hook that fires after the layout 2 course description has been rendered.
			 *
			 * @param \Masteriyo\Models\Course $course The course object.
			 *
			 * @since 1.10.0
			 */
			do_action( 'masteriyo_after_layout_2_course_description', $course );
			?>

			<div class="masteriyo-course-card__content--info">
				<div class="masteriyo-course-card__content--info-duration">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
						<path fill="#646464" fill-rule="evenodd" d="M3 12a9 9 0 1 1 18 0 9 9 0 0 1-18 0Zm9-11C5.925 1 1 5.925 1 12s4.925 11 11 11 11-4.925 11-11S18.075 1 12 1Zm1 5a1 1 0 1 0-2 0v6a1 1 0 0 0 .553.894l4 2a1 1 0 1 0 .894-1.788L13 11.382V6Z" clip-rule="evenodd" />
					</svg>

					<span class="masteriyo-info-label"><?php echo esc_html( masteriyo_minutes_to_time_length_string( $course->get_duration() ) ); ?></span>

				</div>

				<div class="masteriyo-course-card__content--info-students">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
						<path fill="#646464" fill-rule="evenodd" d="M6.5 7.583a2.75 2.75 0 1 1 5.5 0 2.75 2.75 0 0 1-5.5 0ZM9.25 3a4.583 4.583 0 1 0 0 9.167A4.583 4.583 0 0 0 9.25 3ZM5.583 14A4.583 4.583 0 0 0 1 18.583v1.834a.917.917 0 0 0 1.833 0v-1.834a2.75 2.75 0 0 1 2.75-2.75h7.334a2.75 2.75 0 0 1 2.75 2.75v1.834a.917.917 0 0 0 1.833 0v-1.834A4.584 4.584 0 0 0 12.917 14H5.583Zm12.863.807a.917.917 0 0 1 1.116-.659A4.583 4.583 0 0 1 23 18.582v1.835a.917.917 0 0 1-1.833 0v-1.833a2.75 2.75 0 0 0-2.063-2.66.917.917 0 0 1-.658-1.117Zm-2.552-11.66a.917.917 0 0 0-.455 1.777 2.75 2.75 0 0 1 0 5.328.917.917 0 0 0 .455 1.776 4.583 4.583 0 0 0 0-8.88Z" clip-rule="evenodd" />
					</svg>

					<span class="masteriyo-info-label"><?php echo esc_html( masteriyo_count_enrolled_users( $course->get_id() + $course->get_fake_enrolled_count() ) ); ?></span>

				</div>

				<div class="masteriyo-course-card__content--info-lessons">
					<svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
						<path d="M6 22h15v-2H6.012C5.55 19.988 5 19.805 5 19s.55-.988 1.012-1H21V4c0-1.103-.897-2-2-2H6c-1.206 0-3 .799-3 3v14c0 2.201 1.794 3 3 3zM5 8V5c0-.805.55-.988 1-1h13v12H5V8z"></path>
						<path d="M8 6h9v2H8z"></path>
					</svg>

					<span class="masteriyo-info-label"><?php echo esc_html( masteriyo_get_lessons_count( $course ) ); ?></span>

				</div>
			</div>

			<?php
				/**
				 * Action hook for rendering enroll button template.
				 *
				 * @since 1.0.0
				 *
				 * @param \Masteriyo\Models\Course $course Course object.
				 */
				do_action( 'masteriyo_template_enroll_button', $course );
			?>
		</div>
	</div>

</div>
<?php

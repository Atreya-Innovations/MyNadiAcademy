<?php
/**
 * LMS Education Courses: Block Patterns
 *
 * @package LMS Education Courses
 * @since   1.0.0
 */

/**
 * Register Block Pattern Category.
 */
if ( function_exists( 'register_block_pattern_category' ) ) {

	register_block_pattern_category(
		'lms-education-courses',
		array( 'label' => __( 'LMS Education Courses', 'lms-education-courses' ) )
	);
}

/**
 * Register Block Patterns.
 */
if ( function_exists( 'register_block_pattern' ) ) {
	register_block_pattern(
		'lms-education-courses/banner-section',
		array(
			'title'      => __( 'Banner Section', 'lms-education-courses' ),
			'categories' => array( 'lms-education-courses' ),
			'content'    => "<!-- wp:cover {\"url\":\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/banner.png\",\"id\":314,\"dimRatio\":50,\"customOverlayColor\":\"#00000000\",\"minHeight\":600,\"align\":\"full\",\"className\":\"lms-education-banner-section\",\"layout\":{\"type\":\"constrained\"}} -->\n<div class=\"wp-block-cover alignfull lms-education-banner-section\" style=\"min-height:600px\"><span aria-hidden=\"true\" class=\"wp-block-cover__background has-background-dim\" style=\"background-color:#00000000\"></span><img class=\"wp-block-cover__image-background wp-image-314\" alt=\"\" src=\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/banner.png\" data-object-fit=\"cover\"/><div class=\"wp-block-cover__inner-container\"><!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column {\"width\":\"50%\",\"className\":\"banner-content\"} -->\n<div class=\"wp-block-column banner-content\" style=\"flex-basis:50%\"><!-- wp:heading {\"level\":1,\"style\":{\"elements\":{\"link\":{\"color\":{\"text\":\"var:preset|color|black\"}}},\"typography\":{\"fontSize\":\"40px\"}},\"textColor\":\"black\",\"className\":\"banner-heading\"} -->\n<h1 class=\"wp-block-heading banner-heading has-black-color has-text-color has-link-color\" style=\"font-size:40px\">Learn Everyday And Any New Skills Online With Top Instructor.</h1>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"style\":{\"elements\":{\"link\":{\"color\":{\"text\":\"var:preset|color|black\"}}},\"typography\":{\"fontSize\":\"16px\"}},\"textColor\":\"black\",\"className\":\"banner-para\"} -->\n<p class=\"banner-para has-black-color has-text-color has-link-color\" style=\"font-size:16px\">Choose Your Favorite Course And Start Learning Today.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons {\"className\":\"banner-btn\"} -->\n<div class=\"wp-block-buttons banner-btn\"><!-- wp:button {\"textColor\":\"white\",\"style\":{\"elements\":{\"link\":{\"color\":{\"text\":\"var:preset|color|white\"}}},\"color\":{\"background\":\"#3790cb\"},\"border\":{\"radius\":\"8px\"},\"typography\":{\"fontSize\":\"18px\"}}} -->\n<div class=\"wp-block-button has-custom-font-size\" style=\"font-size:18px\"><a class=\"wp-block-button__link has-white-color has-text-color has-background has-link-color wp-element-button\" style=\"border-radius:8px;background-color:#3790cb\">Get Start</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons -->\n\n<!-- wp:columns {\"className\":\"tutor-certified\"} -->\n<div class=\"wp-block-columns tutor-certified\"><!-- wp:column {\"className\":\"tutor-certified1\"} -->\n<div class=\"wp-block-column tutor-certified1\"><!-- wp:columns {\"className\":\"tutor-certified-col\"} -->\n<div class=\"wp-block-columns tutor-certified-col\"><!-- wp:column {\"width\":\"\",\"className\":\"circle-img-sec\"} -->\n<div class=\"wp-block-column circle-img-sec\"><!-- wp:image {\"id\":345,\"sizeSlug\":\"full\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image size-full\"><img src=\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/tutor-count.png\" alt=\"\" class=\"wp-image-345\"/></figure>\n<!-- /wp:image --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"\",\"className\":\"circle-img-text\"} -->\n<div class=\"wp-block-column circle-img-text\"><!-- wp:paragraph {\"style\":{\"elements\":{\"link\":{\"color\":{\"text\":\"var:preset|color|black\"}}},\"typography\":{\"fontSize\":\"15px\"}},\"textColor\":\"black\"} -->\n<p class=\"has-black-color has-text-color has-link-color\" style=\"font-size:15px\">More Than 1k+ Tutors</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"className\":\"tutor-certified2\"} -->\n<div class=\"wp-block-column tutor-certified2\"><!-- wp:columns {\"className\":\"tutor-certified-col\"} -->\n<div class=\"wp-block-columns tutor-certified-col\"><!-- wp:column {\"width\":\"20%\",\"className\":\"admin-sec\"} -->\n<div class=\"wp-block-column admin-sec\" style=\"flex-basis:20%\"><!-- wp:image {\"lightbox\":{\"enabled\":false},\"id\":347,\"sizeSlug\":\"full\",\"linkDestination\":\"none\",\"className\":\"is-style-default\"} -->\n<figure class=\"wp-block-image size-full is-style-default\"><img src=\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/teachers.png\" alt=\"\" class=\"wp-image-347\"/></figure>\n<!-- /wp:image --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"80%\",\"className\":\"admin-text-sec\"} -->\n<div class=\"wp-block-column admin-text-sec\" style=\"flex-basis:80%\"><!-- wp:paragraph {\"style\":{\"elements\":{\"link\":{\"color\":{\"text\":\"#3790cb\"}}},\"color\":{\"text\":\"#3790cb\"},\"typography\":{\"fontSize\":\"26px\"}}} -->\n<p class=\"has-text-color has-link-color\" style=\"color:#3790cb;font-size:26px\">239+</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph {\"style\":{\"elements\":{\"link\":{\"color\":{\"text\":\"var:preset|color|black\"}}},\"typography\":{\"fontSize\":\"15px\"}},\"textColor\":\"black\"} -->\n<p class=\"has-black-color has-text-color has-link-color\" style=\"font-size:15px\">Certified Teachers</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"50%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:50%\"></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:cover -->",
		)
	);

	register_block_pattern(
		'lms-education-courses/degree-and-courses-section',
		array(
			'title'      => __( 'Degree and Courses Section', 'lms-education-courses' ),
			'categories' => array( 'lms-education-courses' ),
			'content'    => "<!-- wp:columns {\"className\":\"degree-courses-section\"} -->\n<div class=\"wp-block-columns degree-courses-section\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:paragraph {\"align\":\"left\",\"style\":{\"color\":{\"text\":\"#3790cb\"},\"elements\":{\"link\":{\"color\":{\"text\":\"#3790cb\"}}},\"typography\":{\"fontSize\":\"18px\"}}} -->\n<p class=\"has-text-align-left has-text-color has-link-color\" style=\"color:#3790cb;font-size:18px\">Degree & Courses</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:heading {\"textAlign\":\"left\",\"style\":{\"elements\":{\"link\":{\"color\":{\"text\":\"var:preset|color|black\"}}},\"typography\":{\"fontSize\":\"30px\"}},\"textColor\":\"black\"} -->\n<h2 class=\"wp-block-heading has-text-align-left has-black-color has-text-color has-link-color\" style=\"font-size:30px\">Top Degree &amp; Courses That Fits Your Life</h2>\n<!-- /wp:heading -->\n\n<!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:shortcode -->\n[tutor_course]\n<!-- /wp:shortcode --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->",
		)
	);
}
<?php

/**
 * Display front-page
 *
 * @package Assignment
 */

use AssignmentVendor\EightshiftLibs\Helpers\Components;

get_header();

if (have_posts()) {
	while (have_posts()) {
		the_post();
		echo Components::render( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			'heading',
			[
				'headingContent' => get_the_title(),
				'headingLevel' => 1,
				'headingAlign' => 'center',
				'headingSize' => 'superbig',
			]
		);
		the_content();
	}
}

get_footer();

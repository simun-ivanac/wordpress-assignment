<?php

/**
 * Template for the Link Block view.
 *
 * @package Assignment
 */

use AssignmentVendor\EightshiftLibs\Helpers\Components;

echo \wp_kses_post(Components::render('link', $attributes));

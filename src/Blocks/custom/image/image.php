<?php

/**
 * Template for the Image Block view.
 *
 * @package Assignment
 */

use AssignmentVendor\EightshiftLibs\Helpers\Components;

echo wp_kses_post(Components::render('image', $attributes));

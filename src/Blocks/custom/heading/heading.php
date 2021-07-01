<?php

/**
 * Template for the Heading Block view.
 *
 * @package Assignment
 */

use AssignmentVendor\EightshiftLibs\Helpers\Components;

echo \wp_kses_post(Components::render('heading', $attributes));

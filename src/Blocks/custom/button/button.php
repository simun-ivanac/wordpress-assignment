<?php

/**
 * Template for the Button Block view.
 *
 * @package Assignment
 */

use AssignmentVendor\EightshiftLibs\Helpers\Components;

echo \wp_kses_post(Components::render('button', $attributes));

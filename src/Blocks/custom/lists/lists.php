<?php

/**
 * Template for the Lists Block view.
 *
 * @package Assignment
 */

use AssignmentVendor\EightshiftLibs\Helpers\Components;

echo \wp_kses_post(Components::render('lists', $attributes));

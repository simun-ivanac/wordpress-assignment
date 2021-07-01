<?php

/**
 * Template for the Paragraph Block view.
 *
 * @package Assignment
 */

use AssignmentVendor\EightshiftLibs\Helpers\Components;

echo \wp_kses_post(Components::render('paragraph', $attributes));

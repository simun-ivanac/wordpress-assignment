<?php

/**
 * Template for the Card Block.
 *
 * @package Assignment
 */

use AssignmentVendor\EightshiftLibs\Helpers\Components;

echo wp_kses_post(Components::render('card', $attributes));

<?php

/**
 * Template for the Carousel Block.
 *
 * @package Assignment
 */

use AssignmentVendor\EightshiftLibs\Helpers\Components;
use Assignment\Manifest\Manifest;

$manifest = Components::getManifest(__DIR__);

$blockClass = Components::checkAttr('blockClass', $attributes, $manifest);
$blockJsClass = Components::checkAttr('blockJsClass', $attributes, $manifest);
$isLoop = Components::checkAttr('isLoop', $attributes, $manifest);
$showItems = Components::checkAttr('showItems', $attributes, $manifest);

$carouselClass = Components::classnames([
	$blockClass,
	$blockJsClass,
	'swiper-container',
]);

$arrowPrevClass = Components::classnames([
	"{$blockClass}__arrow-prev",
	"{$blockJsClass}-prev-arrow",
]);

$arrowNextClass = Components::classnames([
	"{$blockClass}__arrow-next",
	"{$blockJsClass}-next-arrow",
]);

$paginationClass = Components::classnames([
	"{$blockClass}__pagination",
	"{$blockJsClass}-pagination",
]);

?>

<div
	class="<?php echo esc_attr($carouselClass); ?>"
	data-swiper-loop="<?php echo esc_attr($isLoop); ?>"
	data-show-items="<?php echo esc_attr($showItems); ?>"
>

	<div class="<?php echo esc_attr('swiper-wrapper'); ?>">
		<?php echo wp_kses_post($innerBlockContent); ?>
	</div>

	<div class="<?php echo esc_attr($blockClass); ?>__navigation">
		<span class="<?php echo esc_attr($arrowPrevClass); ?>">
			<img 
				src="<?php echo esc_url(apply_filters(Manifest::MANIFEST_ITEM, 'arrow-left.svg')); ?>"
				alt="<?php esc_html_e('Previous item', 'assignment'); ?>">
		</span>
		<span class="<?php echo esc_attr($arrowNextClass); ?>">
			<img 
				src="<?php echo esc_url(apply_filters(Manifest::MANIFEST_ITEM, 'arrow-right.svg')); ?>"
				alt="<?php esc_html_e('Next item', 'assignment'); ?>">
		</span>
		<span class="<?php echo esc_attr($paginationClass); ?>"></span>
	</div>

</div>

<?php

/**
 * Template for the Latest Posts view.
 *
 * @package Assignment
 */

use Assignment\Rest\FetchPublicApiData;
use AssignmentVendor\EightshiftLibs\Helpers\Components;

$manifest = Components::getManifest(__DIR__);

$numOfPosts = Components::checkAttr('numberOfPosts', $attributes, $manifest);

$blockClass = $attributes['blockClass'] ?? '';
$articleClasses = Components::classNames([
	"{$blockClass}__post",
	"article-post"
]);

// Receive API data.
$apiNews = \apply_filters('get_api_data', ['limit' => $numOfPosts]);

?>

<section class="<?php echo \esc_attr($blockClass); ?>">
	<?php
	echo \wp_kses_post(
		Components::render(
			'heading',
			[
				'headingContent' => esc_html__('Latest corns', 'assignment'),
				'headingLevel' => 2,
				'headingAlign' => 'left',
				'headingSize' => 'big',
			]
		)
	); ?>
	<div class="<?php echo \esc_attr("{$blockClass}__posts"); ?>">
		<?php foreach ($apiNews as $key => $item) { ?>
			<article 
				class="<?php echo \esc_attr("{$articleClasses}"); ?>"
				data-id="<?php echo \esc_attr($item['id']); ?>">
				<?php
				echo \wp_kses_post(
					Components::render(
						'image',
						[
							'imageUrl' => $item['image'],
							'imageLink' => $item['url'],
							'imageAlt' => $item['title'],
							'blockClass' => $blockClass
						]
					)
				); ?>
				<time class="<?php echo \esc_attr("{$blockClass}__published"); ?>">
					<i><?php echo \wp_kses_post(gmdate('d.m.Y @ H:i', strtotime($item['published']))); ?></i>
				</time>
				<?php
				echo \wp_kses_post(
					Components::render(
						'heading',
						[
							'headingContent' => $item['title'],
							'headingLevel' => 3,
							'headingSize' => 'default',
							'headingAlign' => 'left',
							'blockClass' => $blockClass
						]
					)
				);
				echo \wp_kses_post(
					Components::render(
						'paragraph',
						[
							'paragraphContent' => $item['description'],
							'paragraphAlign' => 'left',
							'paragraphSize' => 'small',
							'blockClass' => $blockClass
						]
					)
				); ?>
				<div class="<?php echo \esc_attr("{$blockClass}__categories"); ?> js-article-categories">
					<?php foreach ($item['category'] as $key => $category) { ?>
						<span class="<?php echo \esc_attr("{$blockClass}__category"); ?>">
							<?php echo \wp_kses_post($category); ?>
						</span>
					<?php } ?>
				</div>
			</article>
		<?php } ?>
	</div>
	<?php
	// Show "load more" button only if requested number of posts is returned.
	if (count($apiNews) === $numOfPosts) {
		echo \wp_kses_post(
			Components::render(
				'button',
				[
					'buttonContent' => esc_html__('Load More', 'assignment'),
					'buttonAlign' => 'center',
					'buttonId' => "{$blockClass}__load-more",
					'blockClass' => $blockClass
				]
			)
		);
	} ?>
</section >

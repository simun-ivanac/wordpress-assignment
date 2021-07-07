<?php

/**
 * Template for the Latest Posts view.
 *
 * @package Assignment
 */

use Assignment\Rest\FetchPublicApiData;
use AssignmentVendor\EightshiftLibs\Helpers\Components;

$manifest = Components::getManifest(__DIR__);
$blockClass = $attributes['blockClass'] ?? '';

// Receive API data.
$apiNews = new FetchPublicApiData();
$apiNews = $apiNews->getApiData(['limit' => 4]); ?>


<section class="<?php echo \esc_attr($blockClass); ?>">
	<?php
	echo \wp_kses_post(
		Components::render(
			'heading',
			[
				'headingContent' => 'Latest corns',
				'headingLevel' => 2,
				'headingAlign' => 'left',
				'headingSize' => 'big',
			]
		)
	); ?>
	<div class="<?php echo \esc_attr("{$blockClass}__posts"); ?>">
		<?php foreach ($apiNews as $key => $item) : ?>
			<article 
				class="<?php echo \esc_attr("{$blockClass}__post article-post js-article-post"); ?>"
				data-id="<?php echo \esc_attr($item['id']); ?>">
				<?php
				echo \wp_kses_post(
					Components::render(
						'image',
						[
							'imageUrl' => $item['image'],
							'imageLink' => $item['url'],
							'imageAlt' => $item['title'],
							'blockClass' => $blockClass . "__image js-{$blockClass}",
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
							'blockClass' => $blockClass . "__heading js-{$blockClass}",
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
							'blockClass' => $blockClass . "__paragraph js-{$blockClass}",
						]
					)
				); ?>
				<div class="<?php echo \esc_attr("{$blockClass}__categories"); ?> js-article-categories">
					<?php foreach ($item['category'] as $key => $category) : ?>
						<span class="<?php echo \esc_attr("{$blockClass}__category"); ?>">
							<?php echo \wp_kses_post($category); ?>
						</span>
					<?php endforeach; ?>
				</div>
			</article>
		<?php endforeach; ?>
	</div>
	<?php
	// Show "load more" button only if requested number of posts is returned.
	if (count($apiNews) === 4) :
		echo \wp_kses_post(
			Components::render(
				'button',
				[
					'buttonContent' => __('Load More', 'Assignment'),
					'buttonAlign' => 'center',
					'buttonId' => $blockClass . '__load-more',
					'blockClass' => $blockClass . '__button js-' . $blockClass
				]
			)
		);
	endif; ?>
</section >

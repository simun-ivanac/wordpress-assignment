<?php

/**
 * Display footer
 *
 * @package Assignment
 */

use AssignmentVendor\EightshiftLibs\Helpers\Components;
use Assignment\Manifest\Manifest;

?>

</main>

<?php
echo Components::render( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	'layout-three-columns',
	[
		'selectorClass' => 'footer',
		'layoutLeft' => Components::render(
			'logo',
			[
				'parentClass' => 'footer',
				'logoSrc' => \apply_filters(Manifest::MANIFEST_ITEM, 'eightshift-logo.svg'),
				'logoAlt' => \get_bloginfo('name'),
				'logoTitle' => \get_bloginfo('name'),
				'logoHref' => \get_bloginfo('url'),
			]
		),
		'layoutCenter' => Components::render(
			'menu',
			[
				'variation' => 'horizontal',
				'parentClass' => 'footer',
			]
		),
		'layoutRight' => Components::render(
			'copyright',
			[
				'copyrightYear' => gmdate('Y'),
				'copyrightContent' => esc_html__('All love and hapiness', 'assignment'),
			]
		),
	]
);

wp_footer();
?>
</body>
</html>

<?php

/**
 * Class Blocks is the base class for Gutenberg blocks registration.
 * It provides the ability to register custom blocks using manifest.json.
 *
 * @package Assignment\Blocks
 */

declare(strict_types=1);

namespace Assignment\Blocks;

use Assignment\Config\Config;
use AssignmentVendor\EightshiftLibs\Blocks\AbstractBlocks;

/**
 * Class Blocks
 */
class Blocks extends AbstractBlocks
{

	/**
	 * Reusable blocks Capability Name.
	 */
	public const REUSABLE_BLOCKS_CAPABILITY = 'edit_reusable_blocks';

	/**
	 * Register all the hooks
	 *
	 * @return void
	 */
	public function register(): void
	{
		// Register all custom blocks.
		\add_action('init', [$this, 'getBlocksDataFullRaw'], 10);
		\add_action('init', [$this, 'registerBlocks'], 11);

		// Remove P tags from content.
		remove_filter('the_content', 'wpautop');

		// Create new custom category for custom blocks.
		\add_filter('block_categories', [$this, 'getCustomCategory'], 10, 2);

		// Register custom theme support options.
		\add_action('after_setup_theme', [$this, 'addThemeSupport'], 25);

		// Register custom project color palette.
		\add_action('after_setup_theme', [$this, 'changeEditorColorPalette'], 11);

		// Register Reusable blocks side menu.
		\add_action('admin_menu', [$this, 'addReusableBlocks']);

        // Disable core Gutenberg blocks.
        \add_filter('allowed_block_types', [ $this, 'getAllBlocksList' ], 10, 2);

        // Remove core Gutenberg block patterns.
        \add_filter('block_editor_settings', [$this, 'removeCorePatterns']);
	}

	/**
	 * Get blocks absolute path
	 *
	 * Prefix path is defined by project config.
	 *
	 * @return string
	 */
	protected function getBlocksPath(): string
	{
		return Config::getProjectPath() . '/src/Blocks';
	}

	/**
	 * Add Reusable Blocks as a part of a sidebar menu.
	 *
	 * @return void
	 */
	public function addReusableBlocks(): void
	{
		\add_menu_page(
			\esc_html__('Blocks', 'eightshift-libs'),
			\esc_html__('Blocks', 'eightshift-libs'),
			self::REUSABLE_BLOCKS_CAPABILITY,
			'edit.php?post_type=wp_block',
			'',
			'dashicons-editor-table',
			4
		);
	}

    /**
    * Remove core block patterns
    *
    * @param array $settings Array of block editor settings to filter out.
    *
    * @return array Filtered array.
    */
    public function removeCorePatterns(array $settings): array
    {
        $settings['__experimentalBlockPatterns'] = [];

        return $settings;
    }
}

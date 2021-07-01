import React from 'react';
import { __, sprintf } from '@wordpress/i18n';
import { Fragment } from '@wordpress/element';
import { URLInput } from '@wordpress/block-editor';
import { ColorPaletteCustom } from '@eightshift/frontend-libs/scripts/components';
import { SelectControl, TextControl, Icon, ToggleControl } from '@wordpress/components';
import { icons, getOptionColors } from '@eightshift/frontend-libs/scripts/editor';
import { checkAttr } from '@eightshift/frontend-libs/scripts/helpers';
import manifest from '../manifest.json';

const { options, title } = manifest;

export const LinkOptions = (attributes) => {
	const {
		setAttributes,
		componentName = manifest.componentName,
		label = title,
		linkShowControls = true,

		linkUse = checkAttr('linkUse', attributes, manifest, componentName),

		linkUrl = checkAttr('linkUrl', attributes, manifest, componentName),
		linkColor = checkAttr('linkColor', attributes, manifest, componentName),
		linkSize = checkAttr('linkSize', attributes, manifest, componentName),
		linkWidth = checkAttr('linkWidth', attributes, manifest, componentName),
		linkIsAnchor = checkAttr('linkIsAnchor', attributes, manifest, componentName),
		linkId = checkAttr('linkId', attributes, manifest, componentName),

		showLinkUrl = true,
		showLinkColor = true,
		showLinkSize = true,
		showLinkWidth = true,
		showLinkIsAnchor = true,
		showLinkId = true,

	} = attributes;

	if (!linkShowControls) {
		return null;
	}

	return (
		<Fragment>

			{label &&
				<h3 className={'options-label'}>
					{label}
				</h3>
			}

			<ToggleControl
				label={sprintf(__('Use %s', 'Assignment'), label)}
				checked={linkUse}
				onChange={(value) => setAttributes({ [`${componentName}Use`]: value })}
			/>

			{linkUse &&
				<Fragment>

					{showLinkUrl &&
						<URLInput
							label={
								<Fragment>
									<Icon icon={icons.link} />
									{__('URL', 'Assignment')}
								</Fragment>
							}
							value={linkUrl}
							autoFocus={false}
							onChange={(value) => setAttributes({ [`${componentName}Url`]: value })}
						/>
					}

					{showLinkColor &&
						<ColorPaletteCustom
							label={
								<Fragment>
									<Icon icon={icons.color} />
									{__('Color', 'Assignment')}
								</Fragment>
							}
							value={linkColor}
							colors={getOptionColors(options.colors)}
							onChange={(value) => setAttributes({ [`${componentName}Color`]: value })}
						/>
					}

					{showLinkSize &&
						<SelectControl
							label={
								<Fragment>
									<Icon icon={icons.textSize} />
									{__('Text size', 'Assignment')}
								</Fragment>
							}
							value={linkSize}
							options={options.sizes}
							onChange={(value) => setAttributes({ [`${componentName}Size`]: value })}
						/>
					}

					{showLinkWidth &&
						<SelectControl
							label={
								<Fragment>
									<Icon icon={icons.width} />
									{__('Width', 'Assignment')}
								</Fragment>
							}
							value={linkWidth}
							options={options.widths}
							onChange={(value) => setAttributes({ [`${componentName}Width`]: value })}
						/>
					}

					{showLinkIsAnchor &&
						<ToggleControl
							label={__('Anchor', 'Assignment')}
							checked={linkIsAnchor}
							onChange={(value) => setAttributes({ [`${componentName}IsAnchor`]: value })}
							help={__('Using anchor option will add JavaScript selector to the link. You must provide anchor destination inside link Url field. Example: #super-block.', 'Assignment')}
						/>
					}

					{showLinkId &&
						<TextControl
							label={
								<Fragment>
									<Icon icon={icons.id} />
									{__('ID', 'Assignment')}
								</Fragment>
							}
							value={linkId}
							onChange={(value) => setAttributes({ [`${componentName}Id`]: value })}
						/>
					}
				</Fragment>
			}

		</Fragment>
	);
};

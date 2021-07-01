import React from 'react';
import { Fragment } from '@wordpress/element';
import readme from './readme.mdx';
import manifest from './../manifest.json';
import { ImageEditor } from '../components/image-editor';
import { ImageOptions } from '../components/image-options';
import { ImageToolbar } from '../components/image-toolbar';

export default {
	title: `Components/${manifest.title}`,
	parameters: {
		docs: { 
			page: readme
		}
	},
};

const props = manifest.example.attributes;

export const editor = () => (
	<ImageEditor {...props} />
);

export const editorWithUpload = () => (
	<ImageEditor
		{...props}
		imageUrl={''}
	/>
);

export const editorWithPlaceholder = () => (
	<ImageEditor
		{...props}
		imageUrl={''}
		imageUsePlaceholder={true}
	/>
);

export const editorBackgroundImage = () => (
	<ImageEditor
		{...props}
		imageBg={true}
	/>
);

export const options = () => (
	<ImageOptions {...props} />
);

export const optionsWithUpload = () => (
	<ImageOptions
		{...props}
		imageUrl={''}
		imageUsePlaceholder={true}
	/>
);

export const toolbar = () => (
	<ImageToolbar {...props} />
);

const aligns = [
	'top left',
	'top center',
	'top right',
	'center left',
	'center center',
	'center right',
	'bottom left',
	'bottom center',
	'bottom right',
];

export const align = () => (
	<div css={{
		'.image': {
			maxWidth: '50%',
			height: '80%',
		},
		'.image-wrap': {
			height: '300px',
			backgroundColor: 'lightslategray',
		}
	}}>
		{aligns.map((values, index) => (
			<Fragment key={index}>
				<ImageEditor
					{...props}
					imageAlign={values}
				/>
				<br />
			</Fragment>
		))}
	</div>
);

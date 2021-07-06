import React from 'react';
import { InspectorControls } from '@wordpress/block-editor';
import { Fragment } from '@wordpress/element';
import { LatestPostsEditor } from './components/latest-posts-editor';
import { LatestPostsOptions } from './components/latest-posts-options';

export const LatestPosts = (props) => {
	return (
		<Fragment>
			<InspectorControls>
				<LatestPostsOptions {...props} />
			</InspectorControls>
			<LatestPostsEditor {...props} />
		</Fragment>
	);
};
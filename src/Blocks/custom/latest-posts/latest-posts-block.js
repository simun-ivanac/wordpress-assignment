import React from 'react';
import { Fragment } from '@wordpress/element';
import { LatestPostsEditor } from './components/latest-posts-editor';

export const LatestPosts = (props) => {
	return (
		<Fragment>
			<LatestPostsEditor {...props} />
		</Fragment>
	);
};
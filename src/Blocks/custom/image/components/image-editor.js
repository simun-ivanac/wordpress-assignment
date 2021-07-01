import React from 'react';
import { ImageEditor as ImageEditorComponent } from '../../../components/image/components/image-editor';

export const ImageEditor = ({ attributes, setAttributes }) => {
	return (
		<ImageEditorComponent
			{...attributes}
			setAttributes={setAttributes}
		/>
	);
};

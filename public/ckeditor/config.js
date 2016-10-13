/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	config.toolbar = [
		{ name: 'basicstyles', items: [ 'Bold', 'Italic' ] },
		{ name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent' ] },
		{ name: 'links', items: [ 'Link', 'Unlink' ] }
	];
	config.disableNativeSpellChecker = false;
};

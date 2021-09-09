/**
 * @license Copyright (c) 2003-2020, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	config.filebrowserBrowseUrl = 'https://Justisia-Institute.org/assets/js/kcfinder/browse.php?type=files';
	config.filebrowserImageBrowseUrl = 'https://Justisia-Institute.org/assets/js/kcfinder/browse.php?type=images';
	config.filebrowserFlashBrowseUrl = 'https://Justisia-Institute.org/assets/js/kcfinder/browse.php?type=flash';
	config.filebrowserUploadUrl = 'https://Justisia-Institute.org/assets/js/kcfinder/upload.php?type=files';
	config.filebrowserImageUploadUrl = 'https://Justisia-Institute.org/assets/js/kcfinder/upload.php?type=images';
	config.filebrowserFlashUploadUrl = 'https://Justisia-Institute.org/assets/js/kcfinder/upload.php?type=flash';
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.toolbarGroups = [
		{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
		{ name: 'document'},
		{ name: 'links' },
		{ name: 'insert' },
		{ name: 'others' },
		'/',
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
		{ name: 'styles' },
		{ name: 'colors' },
		{ name: 'about' },
		{ name: 'tools' },
		{ name: 'mode'},
	];
	


};

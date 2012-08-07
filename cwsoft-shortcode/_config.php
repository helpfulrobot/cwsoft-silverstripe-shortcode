<?php
/**
 * Module: cwsoft-shortcode
 * Provides some handy shortcode methods ready to use from your CMS SilverStripe WYSIWYG editor.
 *
 * This file contains global settings for the SilverStripe CMS shortcode module.
 *
 * LICENSE: GNU General Public License 3.0
 * 
 * @platform    CMS SilverStripe 3
 * @package     cwsoft-shortcode
 * @version     2.1.0
 * @author      cwsoft (http://cwsoft.de)
 * @copyright   cwsoft
 * @license     http://www.gnu.org/licenses/gpl-3.0.html
*/

// ensure module is stored in folder "cwsoft-shortcode"
$moduleName = 'cwsoft-shortcode';
$folderName = basename(dirname(__FILE__));

if ($folderName != $moduleName) {
	user_error(
		_t(
			'_config.WRONG_MODULE_FOLDER', 
			'Please rename the folder "{folderName}" into "{moduleName}" to get the {moduleName} module working properly.',
			array('moduleName' => $moduleName, 'folderName' => $folderName)
		),
		E_USER_ERROR
	);
}

// include external files into head section
Requirements::set_write_js_to_body(false);

// register short code tags accessible from pages of type cwsCodePage
ShortcodeParser::get()->register('cwsHideMailto', array('cwsShortCodeHideMailto', 'cwsShortCodeHideMailtoHandler'));
ShortcodeParser::get()->register('cwsRandomImage', array('cwsShortCodeRandomImage', 'cwsShortCodeRandomImageHandler'));
ShortcodeParser::get()->register('cwsRandomQuote', array('cwsShortCodeRandomQuote', 'cwsShortCodeRandomQuoteHandler'));

// increase default image quality of thumbnails
GD::set_default_quality(95);
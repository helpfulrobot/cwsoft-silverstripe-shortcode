<?php
/**
 * Module: cwsoft-shortcode
 * Provides some handy shortcode methods ready to use from your CMS SilverStripe WYSIWYG editor.
 *
 * This file contains global settings for the SilverStripe CMS shortcode module.
 *
 * LICENSE: GNU General Public License 3.0
 * 
 * @platform    CMS SilverStripe 2.4.x
 * @package     cwsoft-shortcode
 * @author      cwsoft (http://cwsoft.de)
 * @version     1.1.0
 * @copyright   cwsoft
 * @license     http://www.gnu.org/licenses/gpl-3.0.html
*/

// ensure shortcode module is located in folder named cwsoft-shortcode
$moduleDir = basename(rtrim(dirname(__FILE__), '/'));
if ($moduleDir != 'cwsoft-shortcode') {
	user_error(sprintf(_t('Messages.WRONGDIRECTORY','The shortcode module must be located in a directory named "cwsoft-shortcode" (currently "%s")'), $moduleDir), E_USER_ERROR);
}

// include external files into head section
Requirements::set_write_js_to_body(false);

// register short code tags accessible from pages of type cwsCodePage
ShortcodeParser::get()->register('RandomImage', array('cwsRandomImage', 'RandomImageHandler'));
ShortcodeParser::get()->register('RandomQuote', array('cwsRandomQuote', 'RandomQuoteHandler'));
ShortcodeParser::get()->register('HideMailto', array('cwsHideMailto', 'HideMailtoHandler'));

// increase default image quality of thumbnails
GD::set_default_quality(95);
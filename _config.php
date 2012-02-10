<?php
/**
 * This file registers the implemented shortcodes and configures the default behaviour
 * 
 * LICENSE: GNU General Public License 3.0
 * 
 * @platform    CMS Silverstripe 2.4.5
 * @package     silverstripe-shortcode
 * @author      cwsoft (http://cwsoft.de)
 * @version     1.0.0
 * @copyright   cwsoft
 * @license     http://www.gnu.org/licenses/gpl.html
*/

// ensure shortcode module is located in folder named cws-shortcode
$moduleDir = basename(rtrim(dirname(__FILE__), '/'));
if ($moduleDir != 'cws-shortcode') {
	user_error(sprintf(_t('Messages.WRONGDIRECTORY','The shortcode module must be located in a directory named "cws-shortcode" (currently "%s")'), $moduleDir), E_USER_ERROR);
}

// include external files into head section
Requirements::set_write_js_to_body(false);

// register short code tags accessible from pages of type cwsCodePage
ShortcodeParser::get()->register('RandomImage', array('cwsRandomImage', 'RandomImageHandler'));
ShortcodeParser::get()->register('RandomQuote', array('cwsRandomQuote', 'RandomQuoteHandler'));
ShortcodeParser::get()->register('HideMailto', array('cwsHideMailto', 'HideMailtoHandler'));

// increase default image quality of thumbnails
GD::set_default_quality(95);
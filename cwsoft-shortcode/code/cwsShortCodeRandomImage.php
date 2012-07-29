<?php
/**
 * Module: cwsoft-shortcode
 * Provides some handy shortcode methods ready to use from your CMS SilverStripe WYSIWYG editor.
 *
 * LICENSE: GNU General Public License 3.0
 * 
 * @platform    CMS SilverStripe 3
 * @package     cwsoft-shortcode
 * @author      cwsoft (http://cwsoft.de)
 * @copyright   cwsoft
 * @license     http://www.gnu.org/licenses/gpl-3.0.html
*/


/**
 * Class: cwsShortCodeRandomImage
 * Implements shortcode [cwsRandomImage] to display a random image from a subfolder in assets/.
 * Automatic thumbnail creation implemented. A larger image scale appears on mouse click via jQuery Colorbox effect.
 * 
 * USAGE INSIDE WYSIWYG EDITOR:
 * 	[cwsRandomImage folder="subfolder_in_assets" align="left|right"]
*/
class cwsShortCodeRandomImage {
	/**
	 * Displays a random image with colorbox effect from a given assets subfolder
	 * Uses template "csoft-shortcode/templates/Includes/cwsShortCodeRandomImage.ss" for output 
	 * 
	 * @param mixed $arguments (folder='subfolder_in_assets' align='left|right')
	 * @param $content = null
	 * @param $parser = null
	 * @return processed template cwsShortCodeRandomImage.ss
	 */
	public static function cwsShortCodeRandomImageHandler($arguments, $content = null, $parser = null) {
		// only proceed if subfolder was defined
		if (! isset($arguments['folder'])) return;
		
		// sanitize user inputs
		$folder = Convert::raw2sql($arguments['folder']);
		$align = isset($arguments['align']) ? strtolower(Convert::raw2xml($arguments['align'])) : '';
		
		// fetch all images in random order from the user defined folder
		$folder = Folder::get()->filter('Filename', "assets/$folder/")->First();
		$randomImage = ($folder) ? Image::get()->filter('ParentID', $folder->ID)->sort('RAND()') : false;
		
		// quit in case user defined folder does not contain any image
		if (! $randomImage) return;
		
		// build the output data
		$randomImage = $randomImage->First();
		$data = array();

		$data['cwsRandomImage'] = $randomImage;
		$data['align'] = $align;
		$data['caption'] = $randomImage->Title;
		if (preg_match('#(\d*-)?(.+)\.(jpg|gif|png)#i', $data['caption'], $matches)) {
			$data['caption'] = ucfirst(str_replace('-', ' ', $matches[2]));
		}
		
		// load template and process data
		$template = new SSViewer('cwsShortCodeRandomImage');
		return $template->process(new ArrayData($data));
	}
}
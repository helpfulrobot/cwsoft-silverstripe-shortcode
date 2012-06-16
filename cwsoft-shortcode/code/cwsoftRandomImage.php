<?php
/**
 * Module: cwsoft-shortcode
 * Provides some handy shortcode methods ready to use from your CMS SilverStripe WYSIWYG editor.
 *
 * LICENSE: GNU General Public License 3.0
 * 
 * @platform    CMS SilverStripe 2.4.x
 * @package     cwsoft-shortcode
 * @author      cwsoft (http://cwsoft.de)
 * @copyright   cwsoft
 * @license     http://www.gnu.org/licenses/gpl-3.0.html
*/


/**
 * Class: cwsoftRandomImage
 * Implements shortcode [RandomImage] to display a random image from a subfolder in assets/.
 * Automatic thumbnail creation implemented. A larger image scale appears on mouse click via jQuery Colorbox effect.
 * 
 * USAGE INSIDE WYSIWYG EDITOR:
 * 	[RandomImage folder="subfolder_in_assets" align="left|right"]
*/
class cwsoftRandomImage {
	/**
	 * Displays a random image with colorbox effect from a assets subfolder
	 * Uses template "csoft-shortcode/templates/Includes/RandomImage.ss" for output 
	 * 
	 * @param mixed $arguments (folder='subfolder_in_assets' align='left|right')
	 * @param $content = null
	 * @param $parser = null
	 * @return processed template RandomImage.ss
	 */
	public function RandomImageHandler($arguments, $content = null, $parser = null) {
		// only proceed if subfolder was defined
		if (! isset($arguments['folder'])) return;
		
		// sanitize user inputs
		$folder = Convert::raw2sql($arguments['folder']);
		$align = isset($arguments['align']) ? strtolower(Convert::raw2xml($arguments['align'])) : '';
		
		// try to fetch a random image from defined folder
		$folder = DataObject::get_one("Folder", "Filename = 'assets/$folder/'");
		$randomImage = ($folder) ? DataObject::get("Image", "ParentID = '{$folder->ID}'", "RAND()", '', 1) : false;
		if (! $randomImage) return;
		
		// collect output data
		$data = array();
		$data['RandomImage'] = $randomImage;
		$data['align'] = $align;
		$data['caption'] = $randomImage->First()->Title;
		if (preg_match('#.+\.(jpg||gif|png)#i', $data['caption'])) {
			$data['caption'] = ucfirst(str_replace(array('-', '_'), ' ', substr($data['caption'], 0, -4)));
		}		
		
		// load template and process data
		$template = new SSViewer('RandomImage');
		return $template->process(new ArrayData($data));
	}
}
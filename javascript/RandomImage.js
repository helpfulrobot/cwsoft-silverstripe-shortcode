/**
 * This file contains the configuration settings for the jQuery colorbox plugin.
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

$(document).ready(function(){
	$("a[rel='colorbox']").colorbox({
		transition: 'fade', 	// fade, ellastic, none
		speed: 300, 
		maxWidth: '800px', 
		maxHeight: '800px',
		current: '{current}/{total}',
		arrowKey: true,
		escKey: true
	});
});
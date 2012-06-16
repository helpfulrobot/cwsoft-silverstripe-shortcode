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
 * Class: cwsoftRandomQuote
 * Implements shortcode [RandomQuote] to display a random citation from a CSV file stored inside assets folder.
 *
 * USAGE INSIDE WYSIWYG EDITOR:
 * 	[RandomQuote csv_file="subfolder_in_assets/quotes.csv"]
*/
class cwsoftRandomQuote {
	/**
	 * Displays random quote from a CSV file located in a assets subfolder
	 * Uses template "cwsoft-shortcode/templates/Includes/RandomQuote.ss" for output 
	 * 
	 * @param $arguments (csv_file = 'subfolder_in_assets/csv_file.csv')
	 * @param $content = null
	 * @param $parser = null
	 * @return processed template RandomQuote.ss
	 */
	public function RandomQuoteHandler($arguments, $content = null, $parser = null) {
		// only proceed if a CSV file was specified 
		if (! isset($arguments['csv_file'])) return;
		
		$citation = array();
		$csvFile = 'assets/' . Convert::raw2sql($arguments['csv_file']);
		
		// make sure $csvFile resists inside assets folder (valid file object)   
		if (File::find($csvFile)) {
			$csv = new CSVParser($filename = $csvFile, $delimiter = '|', $enclosure = '"');
			// iterate through imported quotes|author entries and store results in array
			$citations = array();
			foreach($csv as $row) {
  				// only store entries with two data fields (quotation and author)
				if (count($row) !== 2) continue;
            	$citations[] = $row;
			}

        	// randomize citation array, pick first element for display
        	shuffle($citations);
			$citation = $citations[0];
			unset($citations);
		}

        // use default citation if CSV file is invalid
		if (! (isset($citation['quote']) && isset($citation['author'])) ) {
			$citation['quote'] = _t('cwsoftShortCodePage.DEFAULTQUOTE','Only who puts his heart and soul in it, can ignite the fire in others.');
			$citation['author'] = _t('cwsoftShortCodePage.DEFAULTAUTHOR','Augustinus');
        }
		
		// load template and process data
		$template = new SSViewer('RandomQuote');
		return $template->process(new ArrayData($citation));	
	}
}
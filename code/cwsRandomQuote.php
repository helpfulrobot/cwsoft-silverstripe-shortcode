<?php
/**
 * Implements the shortcode [RandomQuote] to display a random citation from a CSV file located inside assets
 *
 * USAGE INSIDE EDITOR:
 * 	[RandomQuote csv_file="subfolder_in_assets/quotes.csv"]
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
class cwsRandomQuote {
	/**
	 * Displays random quote from a CSV file located in a assets subfolder
	 * Uses template "cws-shortcode/templates/Includes/RandomQuote.ss" for output 
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
		$csvFile = 'assets/' . dirname($arguments['csv_file']) . '/' . basename($arguments['csv_file']);
		
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
			$citation['quote'] = _t('cwsShortCodePage.DEFAULTQUOTE','Only who puts his heart and soul in it, can ignite the fire in others.');
			$citation['author'] = _t('cwsShortCodePage.DEFAULTAUTHOR','Augustinus');
        }

		// load template and process data
		$template = new SSViewer('RandomQuote');
		return $template->process(new ArrayData($citation));	
	}
}
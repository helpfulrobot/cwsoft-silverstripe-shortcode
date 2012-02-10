<?php
/**
 * Implements the shortcode [HideMailto], which protects email parts in mailto links from beeing fechted by spam bots
 *
 * USAGE INSIDE EDITOR:
 *	[HideMailto email='yourmail@domain.com' subject='optional_mail_subject']
 *	[HideMailto email='yourmail@domain.com' subject='optional_mail_subject']mail_link_text[HideMailto]
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
class cwsHideMailto {
	/**
	 * Hide mailto links from beeing fetched by spam bots
	 * Uses template "cws-shortcode/templates/Includes/HideMailto.ss" for output 
	 * 
	 * @param mixed $arguments (email='yourmail@domain.com' subject='mail subject')
	 * @param $content = null
	 * @param $parser = null
	 * @return processed template HideMailto.ss
	 */
	public function HideMailtoHandler($arguments, $content = null, $parser = null) {
		// only proceed if a valid email was defined
		$email = isset($arguments['email']) ? Convert::raw2xml(trim($arguments['email'])) : '';
		if ($email == '') return;
		
		// make sure we have a mailto link description (replace @ by (at) and . by (dot))
		$description = (trim($content) == '') ? $email : Convert::raw2xml($content);
		$description = str_replace(array('@', '.'), array('(at)', '(dot)'), $description);

		// get optional mail subject and mail link description
		$subject = isset($arguments['subject']) ? Convert::raw2xml(trim($arguments['subject'])) : '';
		if ($subject == '') $subject = _t('cwsHideMailto.SUBJECT','Subject');
		
		// create random key for caesar cipher
		$key = mt_rand(1, 30);

		// collect output data
		$data = array();
		$data['email'] = (self::caesar_cipher('mailto:' . $email, $key));
		$data['subject'] = rawurldecode($subject . chr(64 + $key));
		$data['description'] = $description;
		
		// load template and process data
		$template = new SSViewer('HideMailto');
		return $template->process(new ArrayData($data));
	}

	/**
	 * Simple Caesar chiffre to obfuscate mailto emails
	 * 
	 * @param string $text
	 * @param integer $key
	 * @return encrypted/decrypted string
	 */
	private static function caesar_cipher($text, $shift) {
		// string with allowed characters
		$allowedCharacters = 'abcdefghijklmnopqrstuvwxyz@.-_:';
		$numberAllowedCharacters = strlen($allowedCharacters);
		
		// convert text and check user inputs
		$text = strtolower(trim($text));
		if ($text == '' || abs($shift) > $numberAllowedCharacters - 1) return $text;  
		
		// encrypt/decrypt email string
		$cipher = '';
		for ($i = 0; $i < strlen($text); $i++) {
			// get position of actual character in allowed characters
			$index = strpos($allowedCharacters, $text[$i]);
			// get position of encrypted character, ensure position is valid  
			$index = ($index + $shift) % $numberAllowedCharacters;
			if ($index < 0) $index = $index + $numberAllowedCharacters; 
			// build cipher
			$cipher .= $allowedCharacters[$index];
		}
		
		return $cipher;		
	} 
}
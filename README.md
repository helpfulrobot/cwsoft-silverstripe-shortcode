# Shortcode module for CMS SilverStripe 3
This module provides some handy shortcode methods ready to use from your [SilverStripe CMS](http://silverstripe.org) WYSIWYG editor.

The `cwsoft-shortcode` module builds up on the shortcode function first introduced with SilverStripe 2.4. Shortcodes can best be thought of a kind of placeholders entered in the WYSIWYG editor, which gets replaced with PHP output just before beeing displayed on the screen. This allows to add dynamic content to a specific position inside a WYSIWYG page.

----------------------------------------
***Shortcode methods provided:***

- [cwsHideMailto](https://github.com/cwsoft/silverstripe-shortcode#shortcode-cwshidemailto): obfuscates the mailto part of mailto links
- [cwsRandomQuote](https://github.com/cwsoft/silverstripe-shortcode#shortcode-cwsrandomquote): displays a random quote from a text file
- [cwsRandomImage](https://github.com/cwsoft/silverstripe-shortcode#shortcode-cwsrandomimage): displays a random image from your assets folder

## Download
The latest stable release of the `cwsoft-shortcode` module is available as ZIP or TAR archive in GitHubs [download area](https://github.com/cwsoft/silverstripe-shortcode/downloads). [Previous releases](https://github.com/cwsoft/silverstripe-shortcode/tags) are still available for download, but are no longer maintained. The development history of the shortcode module can be tracked via [GitHub](https://github.com/cwsoft/silverstripe-shortcode/commits/master).

Note: An older, but unsupported version for SilverStripe 2.4.x can be found and downloaded in the [2.4.x branch](https://github.com/cwsoft/silverstripe-shortcode/tree/2.4.x) at GitHub.

## License
The cwsoft-shortcode module is licensed under the [GNU General Public License (GPL) v3.0](http://www.gnu.org/licenses/gpl-3.0.html).

## Requirements
The minimum requirements to get the cwsoft-shortcode module running on your SilverStripe installation are as follows:

- SilverStripe ***3.0.x*** or higher (recommended last stable 3.x version)
- PHP ***5.3*** or higher (recommended last stable PHP 5.3.x version)

## Installation
1. download latest archive from GitHub [download area](https://github.com/cwsoft/silverstripe-shortcode/downloads)
2. unpack the archive on your local computer
3. upload the entire ***cwsoft-shortcode*** folder to your SilverStripe root folder using your preferred Ftp program
4. update your SilverStripe database via `http://yourdomain.com/dev/build?flush=all`

## Usage
The shortcode methods are available in the WYSIWYG editor of your SilverStripe default page type. To use the shortcodes provided by the `cwsoft-shortcode` module, follow the steps below.

### Shortcode: [cwsHideMailto]
Enter the following shortcode into the WYSIWYG editor of a default page type to obfuscate a mailto link from spam bots.

        [cwsHideMailto email='yourmail@domain.com' subject='optional_mail_subject']mail_link_text[/cwsHideMailto]

Optional you can use the following form:

        [cwsHideMailto email='yourmail@domain.com' subject='optional_mail_subject']

The characters @ and . of your E-Mail address will be replaced by (at) and (dot). The mailto link will be encrypted with a simple Javascript Caeser cipher and automatically decrypted into human readable format when openend in an E-Mail program.

### Shortcode: [cwsRandomQuote]
Enter the following shortcode into the WYSIWYG editor of a default page type to displays a random quote from a textfile located in a subfolder in ***/assets***.

        [cwsRandomQuote csv_file="subfolder_in_assets/quotes.csv"]

The textfile with the quotes must follow the conventions below (***ensure*** thaat the first line of your CSV file exactly matches the example below):

	"Quote"|"Author"
	"your first quote goes here"|"author name"
	"next quote goes here"|"autor of this quote"

**Tip:** The appearance of the quote can be adjusted to your needs via template file *cwsoft-shortcode/templates/Include/RandomQuote.ss* and the CSS file located in *cwsoft-shortcode/css/cwsShortCodeRandomQuote.css*.

### Shortcode: [cwsRandomImage]
Enter the following shortcode into the WYSIWYG editor of a default page type to displays a random image with colorbox effect from a subfolder in ***/assets***.

        [cwsRandomImage folder="subfolder_in_assets" align="left|right"]

**Tip:** The alignment of the image can be set to left or right. The appearance of the thumbnail can be adjusted to your needs via template file *cwsoft-shortcode/templates/Include/RandomImage.ss* and the CSS file located in *cwsoft-shortcode/css/cwsShortCodeRandomImage.css*.

A screenshot with the frontend output of the three shortcode methods is shown below:
![](https://github.com/cwsoft/silverstripe-shortcode/raw/master/.screenshots/cwsoft-shortcode.png) 

## Known Issues
Known issues can be tracked and reported via GitHubs [issue tracking service](https://github.com/cwsoft/silverstripe-shortcode/issues). If you run into any issues with the cwsoft-shortcode module, visit the issue tracker and check if a similar issue was already reported. If not, just add a new topic descriping your issue.

## Questions
If you have questions or issues with cwsoft-shortcode, please visit the [SilverStripe](http://www.silverstripe.org/all-other-modules/show/19244) forum thread and ask for feedback.

***Always provide the following information with your support request:***

 - detailed error description (what happens, what have you already tried ...)
 - the cwsoft-shortcode version used
 - your PHP and SilverStripe version used
 - information about your operating system (e.g. Windows, Mac, Linux) incl. version
 - information of your browser and browser version used

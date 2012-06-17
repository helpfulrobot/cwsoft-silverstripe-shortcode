# Shortcode module for CMS SilverStripe (2.4.x)
This module provides some handy shortcode methods ready to use from your [SilverStripe CMS](http://silverstripe.org) WYSIWYG editor.

The `cwsoft-shortcode` module uses the shortcode mechanism introduced with SilverStripe 2.4. Shortcodes are ***placeholders*** entered into the WYSIWYG editor, which are replaced by output from PHP methods before beeing displayed on the screen. A handy feature, which allows to add dynamic content to a specific position within a WYSIWYG page.

***Shortcodes included in the cwsoft-shortcode module:***

- **[HideMailto]**: obfuscates the mailto part of mailto links
- **[RandomQuote]**: displays a random quote from a text file
- **[RandomImage]**: displays a random image from your assets folder

## Download
The latest stable release of the `cwsoft-shortcode` module is available as ZIP or TAR archive in GitHubs [download area](https://github.com/cwsoft/silverstripe-shortcode/downloads). [Previous releases](https://github.com/cwsoft/silverstripe-shortcode/tags) are still available for download, but are no longer maintained. The development history of the shortcode module can be tracked via [GitHub](https://github.com/cwsoft/silverstripe-shortcode/commits/master).

## License
The cwsoft-shortcode module is licensed under the [GNU General Public License (GPL) v3.0](http://www.gnu.org/licenses/gpl-3.0.html).

## Requirements
The minimum requirements to get the cwsoft-shortcode module running on your SilverStripe installation are as follows:

- SilverStripe ***2.4.5*** or higher (recommended last stable 2.4.x version)
- PHP ***5.2.2*** or higher (recommended last stable PHP 5.3.x version)

## Installation
1. download latest archive from GitHub [download area](https://github.com/cwsoft/silverstripe-shortcode/downloads)
2. unpack the archive on your local computer
3. upload the entire ***cwsoft-shortcode*** folder to your SilverStripe root folder using your preferred Ftp program
4. update your SilverStripe database via `http://yourdomain.com/dev/build?flush=all`

## Usage
The shortcode methods are available in the WYSIWYG editor of your SilverStripe default page type. To use the shortcodes provided by the `cwsoft-shortcode` module, follow the steps below.

### Shortcode: [HideMailto]
Enter the following shortcode into the WYSIWYG editor of a default page type to obfuscate a mailto link from spam bots.

        [HideMailto email='yourmail@domain.com' subject='optional_mail_subject']mail_link_text[/HideMailto]

Optional you can use the following form:

        [HideMailto email='yourmail@domain.com' subject='optional_mail_subject']

The characters @ and . of your E-Mail address will be replaced by (at) and (dot). The mailto link will be encrypted with a simple Javascript Caeser cipher and automatically decrypted into human readable format when openend in an E-Mail program.

### Shortcode: [RandomQuote]
Enter the following shortcode into the WYSIWYG editor of a default page type to displays a random quote from a textfile located in a subfolder in ***/assets***.

        [RandomQuote csv_file="subfolder_in_assets/quotes.csv"]

The textfile with the quotes must follow the conventions below (including first line):

	"quote"|"author"
	"your first quote goes here"|"author name"
	"next quote goes here"|"autor of this quote"

**Tip:** The appearance of the quote can be adjusted to your needs via template file *cwsoft-shortcode/templates/Include/RandomQuote.ss* and the CSS file located in *cwsoft-shortcode/css/RandomQuote.css*.

### Shortcode: [RandomImage]
Enter the following shortcode into the WYSIWYG editor of a default page type to displays a random image with colorbox effect from a subfolder in ***/assets***.

        [RandomImage folder="subfolder_in_assets" align="left|right"]

**Tip:** The alignment of the image can be set to left or right. The appearance of the thumbnail can be adjusted to your needs via template file *cwsoft-shortcode/templates/Include/RandomImage.ss* and the CSS file located in *cwsoft-shortcode/css/RandomImage.css*.

A screenshot with the frontend output of the three shortcode methods is shown below:
![](https://github.com/cwsoft/silverstripe-shortcode/raw/master/.screenshots/cwsoft-shortcodes.png) 

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

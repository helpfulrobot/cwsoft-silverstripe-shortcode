# Shortcode module for CMS Silverstripe (2.4.5)

The latest version and code changes of the ***silverstripe-shortcode*** module can be found on [GitHub](https://github.com/cwsoft/silverstripe-shortcode).

## About silverstripe-shortcode module

The Silverstripe shortcode mechanism allows to use ***placeholders*** in the WYSIWYG editor, which will be replaced by output from PHP methods before displayed on the screen. This is a handy Silverstripe feature, which allows to add dynamic content to a specify position within a WYSIWYG page.

The silverstripe-shortcode module uses the Silverstripe features and implements three easy to use shortcodes, which allows you to:

- display a ***random image*** from /assets folder using a jQuery colorbox effect
- display a ***random quote*** from a text file located in the /assets folder
- to ***obfuscate E-Mails*** entered in WYSIWYG editor from spam bots

## Prerequisites

CMS Silverstripe version 2.4.5 (not tested for upcoming v3 release yet).

## Installation

The installation follows the standard Silverstripe installation process:

1. download archive of the latest version from the [GitHub repository](https://github.com/cwsoft/silverstripe-shortcode/downloads)
2. extract the downloaded archive on your local computer
3. ftp entire subfolder ****silverstripe-shortcode**** to your Silverstripe root folder
4. rename the uploaded folder into ***cws-shortcode***
5. build required database entries using Silverstripe build mechanism

        yourdomain.com/dev/build?flush=all

## Using the shortcode module

Log into your Silverstripe backend and create a default page (WYSIWYG). Than you can use one of the following three shortcodes provided by this module.

### Shortcode: `[RandomImage]`

Enter the following shortcode into the WYSIWYG editor of a default page type to displays a random image with colorbox effect from a subfolder in ***/assets***.

        [RandomImage folder="subfolder_in_assets" align="left|right"]

***Tip:*** The image alignment can be set to left or right. Styling of the output can be done via the template file *cws-shortcode/templates/Include/RandomImage.ss* and the CSS file located in *cws-shortcode/css/RandomImage.css*.

### Shortcode: `[RandomQuote]`

Enter the following shortcode into the WYSIWYG editor of a default page type to displays a random quote from a textfile located in a subfolder in ***/assets***.

        [RandomQuote csv_file="subfolder_in_assets/quotes.csv"]

***Note:*** The textfile with the quotes must stick to the conventions below (including first line)
>"quote"|"author"
>"your first quote goes here"|"author name"
>"next quote goes here"|"autor of this quote"

### Shortcode: `[HideMailto]`

Enter the following shortcode into the WYSIWYG editor of a default page type to obfuscate an E-Mail address from spam bots.

        [HideMailto email='yourmail@domain.com' subject='optional_mail_subject']

Optional you can use the following form:

        [HideMailto email='yourmail@domain.com' subject='optional_mail_subject']mail_link_text[HideMailto]

The characters @ and . of your E-Mail address will be replaced by (at) and (dot). The mailto link will be encrypted with a simple Javascript Caeser cipher and automatically decrypted into human readable format when openend in an E-Mail program.
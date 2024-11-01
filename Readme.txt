=== TotalSheets For WP ===
Contributors: totalsheetsadmin
Donate link: 
Tags: spreadsheet, web apps, data visualization, calculation, calculator, chart, data analysis, data presentation
Requires at least: 4.0
Tested up to: 5.1.1
Stable tag: 1.0.0
Requires PHP: 5.3
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

The plugin helps to show TotalSheets spreadsheet in WordPress posts or pages.

== Description ==

TotalSheets is an online spreadsheet platform. Similar to Google Sheets in concept, but with the intention to give a greater control to users over the appearance of their published spreadsheets.

TotalSheets For WP is a simple plugin that helps to show TS spreadsheets in WordPress posts or pages. Just insert a shortcode wherever in a post or page.

Shortcode with a minimal requirement:

[totalsheets-for-wordpress spreadsheetid="*spreadsheet_id*"]

where *spreadsheet_id* indicates the last 12 chars in the published spreadsheet link

***A number of optional parameters for the shortcode can be set:***

*id* - a unique identifier if more than one spreadsheet is to be shown in post/page.  Default = "totalsheets-for-wordpress".

*width* - width of the frame in % or px (100% by default).

*height* - height of the frame in % or px (auto by default).

*autosize* - auto sizing of the frame based on the content. Default = "true".

*border* - show a border around the frame.  Default = 0. Border style can be specified e.g., "3px solid black"

*header* - show a header bar with logo and 'copy spreadsheet' link (if copylink is set to "true"). Default = "true".

*headercolor* - set a color for the header. Default = "#eee".

*copylink* - show a 'copy spreadsheet' link. Default = "false".

Example:

[totalsheets-for-wordpress spreadsheetid="rYjVX5XlmlLV" width="100%" height="400px" autosize="false" border="1px solid #eee" copylink="true"]

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/totalsheets-for-wp` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress.
3. Use the [totalsheets-for-wordpress spreadsheetid="spreadsheet_id"] shortcode wherever in your post or page to show spreadsheet.

== Frequently Asked Questions ==

= Is TotalSheets platform free? =

TotalSheets is still in beta version and is free of charge to all users. This may change in the future, but only for the new registered users.

= How many spreadsheets can I show in one post/page? =

There is no limitation, however the load time can be extended as each spreadsheet requires some time to load.

== Screenshots ==

1. Spreadsheet shown in the post
2. Shortcode example

== Changelog ==
=1.0.0 - Released: May 02, 2019 =

Initial release

== Upgrade Notice ==

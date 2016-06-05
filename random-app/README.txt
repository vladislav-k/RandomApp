=== Plugin Name ===
Contributors: vladislavk
Donate link: http://woopss.com/
Tags: random, app, store, ios, android, windows phone
Requires at least: 3.0.1
Tested up to: 4.3
Stable tag: 4.5.2
License: GPLv2 
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Random App is a WordPress plugin which allows you to show random app with links to the Stores.

== Description ==

*Random App* is a WordPress plugin which allows you to show random app with links to it's Web-site, App Store, Play Store and Windows Store with a shortcode and as widget.

### Usage

Go to the newly added *Random App* sections and add some apps. To add new app select *Add new* option and fill next fields:
* Set app **name** in a title;
* Set app **icon** by adding Featured image.
* Set app **web-site URL**;
* Set **App Store ID** (like id1048456519);
* Set **Play Market** app **package** (like com.company.app);
* Set **Windows Store ID** (like 4adfji430v).
* Select **iOS Icon Style** if you want plugin to display icon with rounded corners and border like App Store do.

### Widget
You can add this plugin as a widget. Add the *Random App* widget to your sidebar or place `<?php get_random_app(); ?>` in your template.

### Shortcode
Also you can use shortcode `[random_app]` to show *Random App* view in your content.
== Installation ==
1. Upload the plugin files to the `/wp-content/plugins/random-app` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress.
3. Use the "Random App" screen to add new apps for display.

== Frequently Asked Questions ==

= I can't see app icon =

Set app icon by adding Featured image.

= Plugin redirects to wrong App Store URL =

Make sure you set App Store ID and not full URL of your application.

= Plugin redirects to wrong Play Market URL =

Make sure you set package name of your app in Play Market and  not full URL.

= Plugin redirects to wrong Windows Store URL =

Make sure you set Windows Store ID and not full URL of your application.

== Screenshots ==

1. This screen shot description corresponds to screenshot-1.(png|jpg|jpeg|gif). Note that the screenshot is taken from
the /assets directory or the directory that contains the stable readme.txt (tags or trunk). Screenshots in the /assets 
directory take precedence. For example, `/assets/screenshot-1.png` would win over `/tags/4.3/screenshot-1.png` 
(or jpg, jpeg, gif).
2. This is the second screen shot

== Changelog ==

= 1.0 =
* Initial commit.

== Upgrade Notice ==

= 1.0 =
No notices, just Initial commit.
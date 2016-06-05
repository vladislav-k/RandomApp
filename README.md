# Random App
## Description
*Random App* is a WordPress plugin which allows you to show random app with links to it's Web-site, App Store, Play Store and Windows Store with a shortcode and as widget.

## Installation
1. Upload the plugin files to the `/wp-content/plugins/random-app` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress.

## Usage
### Apps list
Go to the newly added *Random App* sections and add some apps. To add new app select *Add new* option and fill next fields:
* Set app **name** in a title;
* Set app **icon** by adding Featured image.
* Set app **web-site URL**;
* Set **App Store ID** (like id1048456519);
* Set **Play Market** app **package** (like com.company.app);
* Set **Windows Store ID** (like 4adfji430v).
* Select **iOS Icon Style** if you want plugin to display icon with rounded corners and border like App Store do.

![Random App - Add new app](https://github.com/vladislav-k/RandomApp/blob/master/assets/app_settings.png?raw=true)

### Widget
You can add this plugin as a widget. Add the *Random App* widget to your sidebar or place `<?php get_random_app(); ?>` in your template.

![Random App - Widget](https://github.com/vladislav-k/RandomApp/blob/master/assets/widget.png?raw=true)

### Shortcode
Also you can use shortcode `[random_app]` to show *Random App* view in your content.

## Author
Vladislav Kovalyov, http://woopss.com/

## License
*Random App* is available under the GPLv2 license. See the LICENSE file for more info.
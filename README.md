# FitRazDva WordPress Theme

This is WordPress theme for website FitRazDva.cz. It`s build on top of slightly modified FoundationPress starter theme, based on Foundation 5 framework by Zurb.

[![Build Status](https://travis-ci.org/olefredrik/FoundationPress.svg?branch=master)](https://travis-ci.org/olefredrik/FoundationPress)
[![Code Climate](https://codeclimate.com/github/danielsitek/fitrazdva-theme/badges/gpa.svg)](https://codeclimate.com/github/danielsitek/fitrazdva-theme)

## Requirements

| Prerequisite       | Version | How to check        | How to install
| ------------------ | ------- | ------------ | ------------- |
| PHP       | >= 5.4.x | `php -v` | [php.net](http://php.net/manual/en/install.php) |
| Node.js  | >= 0.12.x | `node -v` | [nodejs.org](http://nodejs.org/) |
| Grunt     | >= 0.4.5 | `grunt --version` | [gruntjs.com](http://gruntjs.com/getting-started) |
| Bower    | >= 1.3.12 | `bower -v` | [bower.io](http://bower.io/#install-bower) |

## Development

### Instalation

`$ npm install`

`$ grunt init`

### Usage

`$ grunt watch`

### Stylesheet Folder Structure

  * `style.css`: Do not worry about this file. (For some reason) it's required by WordPress. All styling are handled in the Sass files described below

  * `scss/foundation.scss`: Imports for Foundation components and your custom styles.
  * `scss/config/_settings.scss`: Original Foundation 5 base settings
  * `scss/config/_custom-settings.scss`: Copy the settings you will modify to this file. Make it your own
  * `scss/site/*.scss`: Unleash your creativity and make it look perfect. Create the files you need (and remember to make import statements for all your files in scss/foundation.scss)
  
  * `css/foundation.css`: All Sass files are minified and compiled to this file
  * `css/foundation.css.map`: CSS source maps

### Script Folder Strucutre
  
  * `bower_components/`: This is the source folder where all Foundation components are located. `foundation update` will check and update scripts in this folder.

  * `js/custom`: This is where you put all your custom scripts. Every .js file you put in this directory will be minified and concatinated to [foundation.js](https://github.com/olefredrik/FoundationPress/blob/master/js/foundation.js)

  * `js/vendor`: Vendor scripts are copied from `bower_components/` to this directory. We use this path for enqueing the vendor scripts in WordPress.

  * Please note that you must run `grunt build` in your terminal for the script to be copied and concatinated. See [Gruntfile.js](https://github.com/olefredrik/FoundationPress/blob/master/Gruntfile.js) for details

## Documentation

* [Zurb Foundation Docs](http://foundation.zurb.com/docs/)
* [WordPress Codex](http://codex.wordpress.org/)


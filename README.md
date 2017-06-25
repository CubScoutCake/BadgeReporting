# CakePHP Application Skeleton

Master Branch: [![Build Status](https://travis-ci.org/CubScoutCake/BadgeReporting.svg?branch=master)](https://travis-ci.org/CubScoutCake/BadgeReporting)
[![Dependency Status](https://www.versioneye.com/user/projects/59502245368b080067e6018b/badge.svg?style=flat-square)](https://www.versioneye.com/user/projects/59502245368b080067e6018b)

Development Branch: [![Build Status](https://travis-ci.org/CubScoutCake/BadgeReporting.svg?branch=development)](https://travis-ci.org/CubScoutCake/BadgeReporting)

[![License](https://img.shields.io/packagist/l/cakephp/app.svg?style=flat-square)](https://packagist.org/packages/cakephp/app)

A skeleton for creating applications with [CakePHP](http://cakephp.org) 3.x.

The framework source code can be found here: [cakephp/cakephp](https://github.com/cakephp/cakephp).

## Installation

1. Download [Composer](http://getcomposer.org/doc/00-intro.md) or update `composer self-update`.
2. Run `php composer.phar create-project --prefer-dist cakephp/app [app_name]`.

If Composer is installed globally, run

```bash
composer create-project --prefer-dist cakephp/app
```

In case you want to use a custom app dir name (e.g. `/myapp/`):

```bash
composer create-project --prefer-dist cakephp/app myapp
```

You can now either use your machine's webserver to view the default home page, or start
up the built-in webserver with:

```bash
bin/cake server -p 8765
```

Then visit `http://localhost:8765` to see the welcome page.

## Update

Since this skeleton is a starting point for your application and various files
would have been modified as per your needs, there isn't a way to provide
automated upgrades, so you have to do any updates manually.

## Configuration

Read and edit `config/app.php` and setup the `'Datasources'` and any other
configuration relevant for your application.

## Layout

The app skeleton uses a subset of [Foundation](http://foundation.zurb.com/) CSS
framework by default. You can, however, replace it with any other library or
custom styles.

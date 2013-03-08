CakePHP Composer Plugin
=======================

[Composer](http://getcomposer.org/) is a tool for dependency management in PHP. It allows you to declare the dependent libraries your project needs and it will install them in your project for you.

This is a CakePHP plugin to use Composer conveniently with your CakePHP project.

There is no need to pre-install Composer.
This plugin will automatically download the latest version if Composer is not installed at your system.

Requirements
---------
CakePHP v2.x

How to use
----------
1. Download the plugin and place it at `APP/Plugin/Composer`.

   ```bash
   cd APP/Plugin
   git clone git://github.com/uzyn/cakephp-composer.git Composer
   ```

2. Load the plugin by adding this line to the bottom of your app's `Config/bootstrap.php`:

   ```php
   <?php
   CakePlugin::load('Composer', array('bootstrap' => true));
   ```

3. That's all! Composer is ready for use.

   `composer.json` is located at `APP/composer.json`. It is automatically created if it is not found.
   Packages are installed to `APP/Vendor` as per CakePHP convention.
   Invoke Composer from command line with `Console/cake composer.c`.

   For example, to install [opauth/opauth](http://packagist.org/packages/opauth/opauth) using Composer's `require` command.
   ```bash
   cd APP
   Console/cake composer.c require opauth/opauth:0.*
   ```

   To install packages defined at `composer.json`
   ```bash
   Console/cake composer.c install
   ```

4. This plugin also makes use of Composer's autoloader.
   Start using a Composer-loaded classes right away without needing `require()`, `include()` or `App::import()`.

   For example, to instantiate a new Opauth object, simply instantiate Opauth from anywhere in your CakePHP application:

   ```php
   <?php
   $Opauth = new Opauth();
   ```

#### Extra Options

To run the plugin non-interactively, especially to automatically install `composer.phar` (see [#8](https://github.com/uzyn/cakephp-composer/issues/8)), you can include `--yes` or `-y` option, eg. `Console/cake composer.c install -y`.

Issues & questions
-------------------
- Issues: [Github Issues](https://github.com/uzyn/cakephp-composer/issues)
- Twitter: [@uzyn](http://twitter.com/uzyn)
- Email me: chua@uzyn.com

Looking for CakePHP solution or consultation?
<a href="mailto:chua@uzyn.com">Drop me a mail</a>. I do freelance consulting & development.

License
---------
The MIT License
Copyright © 2012-2013 U-Zyn Chua (http://uzyn.com)
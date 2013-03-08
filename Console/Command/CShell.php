<?php
/**
 * CakePHP Composer plugin
 *
 * Alias for ComposerShell
 * to shorten `Console/cake Composer.composer` to `Console/cake Composer.c`
 *
 * @copyright		Copyright © 2012-2013 U-Zyn Chua (http://uzyn.com)
 * @link 			http://opauth.org
 * @license			MIT License
 */
App::uses('ComposerShell', 'Composer.Console/Command');

class CShell extends ComposerShell {
}
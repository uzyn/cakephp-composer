<?php
class ComposerShell extends AppShell {
	public $pharDir;
	
	public function __construct(){
		if (empty($pharDir)){
			if (Configure::read('Composer.phar_dir') !== null) $pharDir = Configure::read('Composer.phar_dir');
			else $pharDir = dirname(dirname(dirname(__FILE__))).'Vendor'.DS.'Composer'.DS;
		}
	}
	
	public function main() {
		$this->out('Hello world.');
	}
	
	/**
	 * Grabs the latest composer.phar from http://getcomposer.org/composer.phar
	 * Changeable at CakePHP configuration: Composer.phar_url
	 */
	public function setup(){
		$pharURL = 'http://getcomposer.org/composer.phar';
		if (Configure::read('Composer.phar_url') !== null) $pharURL = Configure::read('Composer.phar_url');
		
		if (is_writable(dirname(dirname(__FILE__)).'/Strategy/')){
		}
	}
}
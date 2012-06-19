<?php
class ComposerShell extends AppShell {
	public $pharDir;
	
	public function initialize(){
		if (empty($this->pharDir)){
			if (Configure::read('Composer.phar_dir') !== null) $this->pharDir = Configure::read('Composer.phar_dir');
			else $this->pharDir = dirname(dirname(dirname(__FILE__))).'Vendor'.DS.'Composer'.DS;
		}
	}
	
	public function main() {
		$this->out('Hello world.');;
	}
	
	/**
	 * Grabs the latest composer.phar from http://getcomposer.org/composer.phar
	 * Changeable at CakePHP configuration: Composer.phar_url
	 */
	public function setup(){
		$pharURL = 'http://getcomposer.org/composer.phar';
		if (Configure::read('Composer.phar_url') !== null) $pharURL = Configure::read('Composer.phar_url');
		
		if (!is_writable($pharDir)){
			$this->error("$pharDir is not writable.");
		}
	}
}
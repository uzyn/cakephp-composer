<?php
class ComposerShell extends AppShell {
	public $pharDir;
	
	public function initialize(){
		if (empty($this->pharDir)){
			if (Configure::read('Composer.phar_dir') !== null) $this->pharDir = Configure::read('Composer.phar_dir');
			else $this->pharDir = dirname(dirname(dirname(__FILE__))).DS.'Vendor'.DS.'Composer'.DS;
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
		
		if (!is_writable($this->pharDir)){
			$this->error("$this->pharDir is not writable.");
		}
		
		$this->out('<info>Setting up Composer</info>');
		$this->out("Downloading from $pharURL...");
		
		$content = file_get_contents($pharURL);
		if ($content === false){
			$this->error("Download failed");
		}
		
		$save = file_put_contents($this->pharDir.'composer.phar', $content);
		
		if ($save === false){
			$this->error("Unable to save to {$this->pharDir}composer.phar.");
		}
		
		$this->out("Composer.phar installed and saved successfully.");
	}
}
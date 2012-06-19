<?php
class ComposerShell extends AppShell {
	public $pharDir;
	
	public function initialize(){
		if (empty($this->pharDir)){
			if (Configure::read('Composer.phar_dir') !== null) $this->pharDir = Configure::read('Composer.phar_dir');
			else $this->pharDir = dirname(dirname(dirname(__FILE__))).DS.'Vendor'.DS.'Composer'.DS;
		}
		
		/**
		 * Check if composer.phar is available
		 */
		$version = @exec("php {$this->pharDir}composer.phar --version");
		
		if (stripos($version, 'Composer') === false || stripos($version, 'version') === false){
			$this->out('<warning>Composer is not installed.</warning>');
			$setup = $this->in('Would you like Composer to be set up automatically?', array('y', 'n'), 'y');
			
			if ($setup != 'y'){
				$this->error("Terminating. You may overwrite the location of composer.phar by defining 'Composer.phar_dir' configuration.");
			}
			else{
				$this->setup();
			}
		}
	}
	
	public function main() {
		$this->out("<info>Composer plugin for CakePHP</info> by U-Zyn Chua.", 2);
		passthru("php {$this->pharDir}composer.phar ".implode(" ", $this->args));
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
		$this->out("Downloading composer.phar from $pharURL...");
		
		$content = file_get_contents($pharURL);
		if ($content === false){
			$this->error("Download failed");
		}
		
		$save = file_put_contents($this->pharDir.'composer.phar', $content);
		
		if ($save === false){
			$this->error("Unable to save to {$this->pharDir}composer.phar.");
		}
		
		$this->out("<info>Composer installed and saved successfully.</info>");
	}
}
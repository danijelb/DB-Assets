<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Db_assets
{
	// Instance of Codeigniter
	protected $CI;
	
	// Array of Google Libraries URLs
	private $libraries;
	
	// Holds HTML tag "templates"
	private $templates;
	
	// Stores folder names
	private $assets_dir;
	private $js_dir;
	private $css_dir;
	
	public function __construct()
	{
		$this->CI =& get_instance();
		
		// Populating libraries, templates...
		$this->libraries = $this->CI->config->item('google_libraries');
		$this->templates = $this->CI->config->item('html_templates');
		
		// ...and folder names
		$this->assets_dir = $this->CI->config->item('assets_dir');
		$this->js_dir = $this->CI->config->item('js_dir');
		$this->css_dir = $this->CI->config->item('css_dir');
	}

	public function css($stylesheet, $media=null)
	{
		/**
		 * Constructing the URL to load
		 */
		$url = base_url() . $this->assets_dir . "/" . $this->css_dir . "/";
		
		if($media != null)
		{
			$media = sprintf($this->templates['media'], $media);
		}
		else
		{
			$media = " ";
		}
		
		return sprintf($this->templates['css'], $url.$stylesheet, $media);
	}
	
	public function js($script)
	{
		/**
		 * Constructing the URL to load
		 */
		$url = base_url() . $this->assets_dir . "/" . $this->js_dir . "/";
		
		/**
		 * Create and return HTML chunk
		 */
		return sprintf($this->templates['script'], $url.$script);
	}

	public function google($script, $version=null, $uncompressed=false)
	{
		/**
		 * Checking if library exists
		 */
		if( !isset($this->libraries[$script]))
		{
			return null;
		}
			
		/**
		 * If version is set to null we set it
		 * to the latest one from config
		 */
		if( !isset($version))
		{
			$version = $this->libraries[$script]['latest'];
		}
		
		/**
		 * Determining whether to load uncompressed or compressed
		 * script
		 */
		if($uncompressed)
		{
			$url = sprintf($this->libraries[$script]['path_u'], $version);
		}
		else
		{
			$url = sprintf($this->libraries[$script]['path'], $version);
		}
		
		/**
		 * Returning the chunk of HTML
		 */
		return sprintf($this->templates['script'], $url);
	}
	
	public function conditional($html, $condition="IE")
	{
		return sprintf($this->templates['conditional'], $html, $condition);
	}

}

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
	
	/**
	 * Constructor method
	 * @return void
	 */
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

	/**
	 * This method constructs the CSS html chunk
	 * @var string $stylesheet Stylesheet filename
	 * @var string $media Defines for what media types the stylesheet is tailored
	 * @return string
	 */
	public function css($stylesheet, $media = NULL)
	{
		/**
		 * Constructing the URL to load
		 */
		$url = base_url() . $this->assets_dir . "/" . $this->css_dir . "/";
		
		if($media != NULL)
		{
			$media = sprintf($this->templates['media'], $media);
		}
		else
		{
			$media = " ";
		}
		
		return sprintf($this->templates['css'], $url.$stylesheet, $media);
	}
	
	/**
	 * This method constructs HTML chunk for loading scripts
	 * @var string $script Script filename
	 * @return string
	 */
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

	/**
	 * This returns script chunk for a Google hosted JS script
	 * @var string $script Name of script to load
	 * @var string $version Version of script to load. If not provided then the latest version at the moment of this version release is set
	 * @var string $uncompressed Set to true if you need uncompressed script (where supported)
	 * @return string
	 */
	public function google($script, $version = NULL, $uncompressed = FALSE)
	{
		/**
		 * Checking if library exists
		 */
		if( !isset($this->libraries[$script]))
		{
			return NULL;
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
	
	/**
	 * Wraps any kind of data into IE conditional comments
	 * @var string $data Data to wrap
	 * @var string $condition IE condition
	 * @return string
	 */
	public function conditional($data, $condition="IE")
	{
		return sprintf($this->templates['conditional'], $data, $condition);
	}

}

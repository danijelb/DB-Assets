<?php

function js($script)
{
	$CI =& get_instance();
	return $CI->db_assets->js($script);
}

function google($script, $version=null, $uncompressed=false)
{
	$CI =& get_instance();
	return $CI->db_assets->google($script, $version, $uncompressed);
}
<?php

function css($stylesheet, $media=null)
{
	$CI =& get_instance();
	return $CI->db_assets->css($stylesheet, $media);
}

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

function conditional($data, $condition="IE")
{
	$CI =& get_instance();
	return $CI->db_assets->conditional($condition, $data);
}
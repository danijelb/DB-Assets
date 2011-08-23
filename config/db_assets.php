<?php

$config['assets_dir'] = "assets";
$config['js_dir'] = "js";
$config['css_dir'] = "css";

$config['google_libraries'] = array(
	'chrome-frame' => array(
		'path' => 'https://ajax.googleapis.com/ajax/libs/chrome-frame/%s/CFInstall.min.js',
		'path_u' => 'https://ajax.googleapis.com/ajax/libs/chrome-frame/%s/CFInstall.js',
		'latest' => '1.0.2'
	),
	'dojo' => array(
		'path' => 'https://ajax.googleapis.com/ajax/libs/dojo/%s/dojo/dojo.xd.js',
		'path_u' => 'https://ajax.googleapis.com/ajax/libs/dojo/%s/dojo/dojo.xd.js.uncompressed.js',
		'latest' => '1.6.1'
	),
	'ext-core' => array(
		'path' => 'https://ajax.googleapis.com/ajax/libs/ext-core/%s/ext-core.js',
		'path_u' => 'https://ajax.googleapis.com/ajax/libs/ext-core/3.1.0/ext-core-debug.js',
		'latest' => '3.1.0'
	),
	'jquery' => array(
		'path' => 'https://ajax.googleapis.com/ajax/libs/jquery/%s/jquery.min.js',
		'path_u' => 'https://ajax.googleapis.com/ajax/libs/jquery/%s/jquery.js',
		'latest' => '1.6.2'
	),
	'jqueryui' => array(
		'path' => 'https://ajax.googleapis.com/ajax/libs/jqueryui/%s/jquery-ui.min.js',
		'path_u' => 'https://ajax.googleapis.com/ajax/libs/jqueryui/%s/jquery-ui.js',
		'latest' => '1.8.16'
	),
	'mootools' => array(
		'path' => 'https://ajax.googleapis.com/ajax/libs/mootools/%s/mootools-yui-compressed.js',
		'path_u' => 'https://ajax.googleapis.com/ajax/libs/mootools/%s/mootools.js',
		'latest' => '1.3.2'
	),
	'prototype' => array(
		'path' => 'https://ajax.googleapis.com/ajax/libs/prototype/%s/prototype.js',
		'path_u' => 'https://ajax.googleapis.com/ajax/libs/prototype/%s/prototype.js',
		'latest' => '1.7.0.0'
	),
	'scriptaculous' => array(
		'path' => 'https://ajax.googleapis.com/ajax/libs/scriptaculous/%s/scriptaculous.js',
		'path_u' => 'https://ajax.googleapis.com/ajax/libs/scriptaculous/%s/scriptaculous.js',
		'latest' => '1.9.0'
	),
	'swfobject' => array(
		'path' => 'https://ajax.googleapis.com/ajax/libs/swfobject/%s/swfobject.js',
		'path_u' => 'https://ajax.googleapis.com/ajax/libs/swfobject/%s/swfobject_src.js',
		'latest' => '2.2'
	),
	'yui' => array(
		'path' => 'https://ajax.googleapis.com/ajax/libs/yui/%s/build/yui/yui-min.js',
		'path_u' => 'https://ajax.googleapis.com/ajax/libs/yui/%s/build/yui/yui.js',
		'latest' => '3.3.0'
	),
	'webfont' => array(
		'path' => 'https://ajax.googleapis.com/ajax/libs/webfont/%s/webfont.js',
		'path_u' => 'https://ajax.googleapis.com/ajax/libs/webfont/%s/webfont_debug.js',
		'latest' => '1.0.22'
	),
);

$config['html_templates'] = array(
	'script' => "<script type=\"text/javascript\" src=\"%s\"></script>\n",
	'css' => "<link rel=\"stylesheet\" href=\"%s\" type=\"text/css\"%s/>\n",
	'media' => ' media="%s" ',
	'conditional' => "<!--[if %s]>\n\t%s\t<![endif]-->\n"
);
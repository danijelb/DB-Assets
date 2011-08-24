DB-Assets Library
=================
DB-Assets is a simple library designed to simplify including Javascript and CSS files into views.

Setup
-----
The script is set to use a folder named "assets" in the root of your directory structure.

    /application
    /assets
    .../js
    .../css
    /sparks
    /system
    /tools

You can setup your custom directory structure in the db_assets.php config file.

Usage
=====
This library supports including of CSS and Javascript assets. It also supports including Javascript libraries hosted at [Google Libraries API CDN](http://code.google.com/apis/libraries/) and simple one-line IE conditional comments.

Including Javascripts
---------------------
Let's assume you want to include a Javascript file located at <em>/assets/js/site.js</em>.

    <?php echo js("site.js"); ?>
    
This code generates:

    <script type="text/javascript" src="YOUR-BASE-URL/assets/js/site.js"></script>
    
Additionaly, if you want to include a Javascript file located at subfolder, like <em>/assets/js/lib/jquery.min.js</em> you would do this:

    <?php echo js("lib/jquery.min.js");
    
Including CSS
-------------
Let's assume you want to include a CSS stylesheet located at <em>/assets/css/master.css</em>.

    <?php echo css("master.css"); ?>
    
This code generates:

    <link rel="stylesheet" href="YOUR-BASE-URL/assets/css/stylesheet.css" type="text/css" />
    
If you need to specify media attribute you would do this:

    <?php echo css("master.css", "all"); ?>
    
This will generate:

    <link rel="stylesheet" href="YOUR-BASE-URL/assets/css/stylesheet.css" type="text/css" media="all" />
    
Don't forget you can organize stylesheets in subfolders.
    <?php echo css("subfolder/structure/some.css"); ?>
    
    
Including Javascript libraries hosted at [Google Libraries API CDN](http://code.google.com/apis/libraries/)
-----------------------------------------------------------------
DB-Assets supports including Javascript libraries hosted at [Google Libraries API CDN](http://code.google.com/apis/libraries/).

Let's assume you want to load jQuery 1.6.2. All you have to write is:

    <?php echo google("jquery", "1.6.2"); ?>
    
This code generates:

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
    
Also note, if you don't specify the version you want to load, the latest one* will be loaded. You are strongly encouraged to specify a version number.

<small><em>*\** This library has latest versions of libraries stored in the configuration file. Therefore, if you don't specify a version number, the version from the configuration will be loaded. The version from the configuration is the latest at the time of release of library.</em></small>

Compressed versions of libraries are loaded by default. (if available)

If you want to load uncompressed version you need to pass *true* as third parameter:

    <?php echo google("jquery", "1.6.2", true); ?>

Supported libraries are:

<table>
    <tr>
        <td><strong>Library</strong></td>
        <td><strong>Name</strong></td>
    </tr>
    <tr>
        <td>Chrome Frame</td>
        <td>chrome-frame</td>
    </tr>
    <tr>
        <td>Dojo</td>
        <td>dojo</td>
    </tr>
    <tr>
        <td>Ext Core</td>
        <td>ext-core</td>
    </tr>
    <tr>
        <td>jQuery</td>
        <td>jquery</td>
    </tr>
    <tr>
        <td>jQuery UI</td>
        <td>jqueryui</td>
    </tr>
    <tr>
        <td>MooTools</td>
        <td>mootools</td>
    </tr>
    <tr>
        <td>Prototype</td>
        <td>prototype</td>
    </tr>
    <tr>
        <td>script.aculo.us</td>
        <td>scriptaculous</td>
    </tr>
    <tr>
        <td>SWFObject</td>
        <td>swfobject</td>
    </tr>
    <tr>
        <td>Yahoo! User Interface Library (YUI)</td>
        <td>yui</td>
    </tr>
    <tr>
        <td>WebFont Loader</td>
        <td>webfont</td>
    </tr>
</table>

For more info on Google Libraries API CDN please visit their [website](http://code.google.com/apis/libraries/).

IE conditional comments
-----------------------
This library supports easy wrapping of assets into an IE conditional comment.

Let's assume you need to include a stylesheet located at */assets/css/ie6.css* aimed for Internet Explorer 6 or below.

The first parameter is the chunk of HTML that needs to be in conditional comment. The second parameter is the condition. For the first parameter we will use our css() function.

    <?php echo conditional(css("ie6.css"), "lte IE6"); ?>
    
This will generate:

    <!--[if lte IE6]>
	<link rel="stylesheet" href="YOUR-BASE-URL/assets/css/ie6.css" type="text/css" />
	<![endif]-->
    
Condition is one of the following

* <strong><code>IE</code></strong> - any version of IE
* <strong><code>lt IE *version*</code></strong> - any version of IE less than specified *version*
* <strong><code>lte IE *version*</code></strong> - any version of IE less than or equal to the specified *version*
* <strong><code>IE *version*</code></strong> - specified *version* of IE only
* <strong><code>gt IE *version*</code></strong> - any version of IE greater than specified *version*
* <strong><code>gte IE *version*</code></strong> - any version of IE greater or equal to the specified *version*

Typical versions are 6, 7, 8 and 9.

If you don't specify any condition at all, the "IE" condition will be used which is *any version of IE*.
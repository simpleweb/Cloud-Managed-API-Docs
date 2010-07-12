<?php
//Let's get cracking. Include the Swim API lib. This is known as LucidGecko.
require_once('LucidGecko/LucidGecko.php');

//Include a config file with our api details.
require_once('config.php');

//Create an instance of the API Lib. This is like this with getInstance because the class is implemented as a singleton.
$lucidGecko = LucidGecko::getInstance(PLUGIN_KEY, PLUGIN_SECRET);

//Information for the logged in user.
?>

<!--YUI is used for layout if you load the yuitrip framework.-->


<div id="doc3" class="yui-t7">
   <div id="hd" role="banner"><h3>Welcome to SWM App Development</h3></div>
   <div id="bd" role="main">
		<div class="yui-g">
		
			<p>This SWM App serves to get you up to speed with developing applications to work within SWM.</p>	
		
			<p>We hope SWM will make it easy to quickly deliver applications to your customers and a potential wider audience.</p>
			
			<p>Here are some of the benefits of using SWM:</p>
			
			<ul>
				<li>No need to worry about logins of user context.</li>
				<li>Post information to a global activity feed to give your users compelling stats and updates.</li>
				<li>Easily add WYSIWYG editor fields, shared asset library with image and file pickers.</li>
				<li>Easy to use CSS Typography and Layout framework to build consistent SWM apps without worrying about design or markup.</li>
			</ul>
			
			<h4>Basic steps to creating a SWM app</h4>
			
			<ol>
				<li>Setup some externally accessible hosting (or setup your local webserver so it can be accessed externally by SWM).</li>
				<li>Grab the LucidGecko library from SVN over at Google Code (<a href="http://code.google.com/p/lucidgecko/">http://code.google.com/p/lucidgecko/</a>).</li>
				<li>Setup your application in the <a href="/<?=$lucidGecko->parentCompany['Key']?>/action/developers/">developer section of SWM</a>. You can also access this link at the bottom of SWM.</li>
				<li>Build your app!</li>
			</ol>
			
			
			<h4>Useful Resources</h4>
			
			<ul>
				<li>This app! Although this app is accessible via SWM, you can also get the code from Google Code at (<a href="http://code.google.com/p/lucidgecko/source/browse/#svn/trunk/PHP/ApiDocs">http://code.google.com/p/lucidgecko/source/browse/#svn/trunk/PHP/ApiDocs</a> to see exactly what each section is doing.</li>				
				<li><a href="http://code.google.com/p/lucidgecko/">LucidGecko Library</a> - this is a simple code library that makes it simple for your app to communicate with SWM.</li>
				<li>The <a href="http://groups.google.com/group/swm-developers">SWM Developer Google Group</a> - join this group, and if you have any development questions, ask them here.</li>
			</ul>
			
		</div>

	</div>
   <div id="ft" role="contentinfo"><p></p></div>
</div>

<!--You can put the main app nav anywhere in your output and it will be stripped out and moved, just make sure it's in a div ID'd as appNav -->
<?php
require_once('appnav.php');
?>
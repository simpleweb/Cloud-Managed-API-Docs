<!--YUI is used for layout if you load the yuitrip framework.-->
<swm:css framework="yuitrip" />

<div id="doc3" class="yui-t7">
   <div id="hd" role="banner"><h1>XHTML Framework</h1></div>
   <div id="bd" role="main">
	<div class="yui-g">

		<p>
			To keep things simple, you don't generally need to worry too much about markup or CSS in SWM.			
		</p>	
		
		<p>
			You tell SWM (via <a href="//swmml.php#swm:css">SWMML</a>) the correct CSS framework to load and it will load it. You then just use the correct markup.
		</p>
		
		<p>
			Currently, SWM only uses one CSS framework called yuitrip. This is an amalgamation of YUI (for layout) and Blue Trip (for typograpy). To load the framework, include the SWMML tag anywhere in your output:
			<code>
				&#60;swm:css framework="yuitrip" /&#62;
			</code>
		</p>	
		
		<p>
			If you want to load your own CSS, you should also do it via SWMML. For a more extensive guide, see the <a href="http://groups.google.com/group/swm-developers/web/swmml.pdf">SWMML doc</a>.
		</p>
		
		<ul>
			<li>Layout is done with YUI, you can use the <a href="http://developer.yahoo.com/yui/grids/builder/">YUI grid builder</a> to help you. You should use 100% width. <a href="//layout.php">Click here for an example.</a></li>
			<li>Typography is done with Blue Trip. <a href="//typography.php">Click here for an example.</a></li>
		</ul>
		
	</div>

	</div>
   <div id="ft" role="contentinfo"><p></p></div>
</div>


<!--You can put the main app nav anywhere in your output and it will be stripped out and moved, just make sure it's in a div ID'd as appNav -->
<?php
require_once('appnav.php');
?>
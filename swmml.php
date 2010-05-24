<?php
//Let's get cracking. Include the Swim API lib. This is known as LucidGecko.
require_once('LucidGecko3/LucidGecko3.php');

//Include a config file with our api details.
require_once('config.php');

//Create an instance of the API Lib. This is like this with getInstance because the class is implemented as a singleton.
$lucidGecko = LucidGecko2::getInstance(PLUGIN_KEY, PLUGIN_SECRET);

//Information for the logged in user.
?>
<!--YUI is used for layout if you load the yuitrip framework.-->
<swm:css framework="yuitrip" />

<div id="doc3" class="yui-t7">
   <div id="hd"><h3>SWMML</h3></div>
   <div id="bd">
	<div class="yui-g">

<p>SWMML is markup language that SWM recognises for the purpose of quickly adding
extended and consistent functionality when developer SWM applications.</p>
<p>If you are familiar with developing Facebook applications, SWMML could be compared to
FBML.</p>
<p>All SWMML tags start with &lt;swm:function where function is changed for one of the available
tags. An example of this are:</p>
<p><code>&lt;swm:flash message=&quot;This will output a flash message&quot; /&gt;</code></p>
<p>Some tags are self closing tags (ending with a /&gt;) and some are containing tags containing
additional markup.</p>
<p>Most SWMML tags contain at least one required attribute. If a tag is output without the required
attributes SWM will throw an exception. For the purpose of this document, optional
attributes are shown in square brackets.</p>
<p>An explanation and examples of each tag follows below:</p>
<ul>
	<li><a href="#swm:nav">swm:Nav</a></li>
	<li><a href="#swm:css">swm:CSS</a></li>
	<li><a href="#swm:companyautocomplete">swm:CompanyAutoComplete</a></li>
	<li><a href="#swm:flash">swm:Flash</a></li>
	<li><a href="#swm:imagepicker">swm:ImagePicker</a></li>
	<li><a href="#swm:filepicker">swm:FilePicker</a></li>
	<li><a href="#swm:user">swm:User</a></li>
	<li><a href="#swm:company">swm:Company</a></li>
	<li><a href="#mceeditor">WYSIWYG Editor</a></li>
</ul>

<h4 id="swm:nav">swm:Nav</h4>

<p>Outputs main application navigation. Currently, this tag just surrounds a div with an id of appNav that contains a UL list. In the future this will change to make it easier to add navigation.</p>

<h4 class="fancy">Example</h4>

<code><pre>
&lt;swm:nav&gt;
	&lt;div id=&quot;appNav&quot;&gt;
		&lt;ul&gt;
			&lt;li&gt;&lt;a href=&quot;//activity/&quot;&gt;Activity&lt;/a&gt;&lt;/li&gt;
			&lt;li&gt;&lt;a href=&quot;//&quot;&gt;List People&lt;/a&gt;&lt;/li&gt;
			&lt;li&gt;&lt;a href=&quot;//add-user/&quot;&gt;Add Person&lt;/a&gt;&lt;/li&gt;
		&lt;/ul&gt;
	&lt;/div&gt;
&lt;/swm:nav&gt;
</pre></code>

	</div>


<h4 id="swm:css">swm:CSS</h4>

<p>SWM makes use of default CSS frameworks to speed up styling of your app within the
canvas. At the moment, the only framework is &quot;YuiTrip&quot; which is an amalgamation of Yui
grids (2.7) and Blue Trip for typography. See <a href="//xhtmlframework.php">XHTML Framework</a>.</p> 
<p>The swm:css tag can be placed anywhere in your output. If it is omitted, the styling will full
back to legacy SWM CSS which will eventually be deprecated.</p>
<p>You can also specify your own CSS within the same tag using the href attribute. This feature
has not been heavily tested and for now it is recommended to put in an absolute path
(including server) to your CSS.</p>

<h4 class="fancy"5>Example</h4>

<code>&lt;swm:css framework=&quot;yuitrip&quot; href=&quot;http://yourserver.com/screen.css&quot; /&gt;</code>

<h4 class="fancy">Parameters</h4>

<dl>
	<dt>[framework]</dt>
	<dd>The framework to load. Currently only yuitrip is supported.</dd>
	
	<dt>[href]</dt>
	<dd>Absolute URL to your own CSS file to further enhanced styles.</dd>	
</dl>



<h4 id="swm:companyautocomplete">swm:CompanyAutoComplete</h4>

<p>Outputs a company lookup auto complete box.</p>

<p>Provides an easy way for someone to lookup a client within their domain. An example
of this can be seen below:</p>

<h4 class="fancy">Demo</h4>

<p>Type in the box to find a company (you'll need to make sure you've added a company to your account first): <swm:companyautocomplete id="myid" /></p>

<h4 class="fancy">Example</h4>

<code>&lt;swm:companyautocomplete id=&quot;id_for_postback&quot; value=&quot;&quot; /&gt;</code>

<h4 class="fancy">Parameters</h4>

<dl>
	<dt>id</dt>
	<dd>This is required and used as the prefix for the posted back form items.</dd>
	
	<dt>[value]</dt>
	<dd>This is for reloading a previously selected value back in to the selection box. It should
be populated with the CompanyKey of the previously selected user. The value obtained
from the postback item ValueOf_&lt;ID&gt; (see postback values).</dd>
</dl>

<h4 class="fancy">Postback Values</h4>

<p>These items are sent to your application as POST items when a form containing this tag is submitted. <strong>You
need to allow for these fields possibly being blank due to no selection being made.</strong></p>

<p>&lt;ID&gt; needs to be replaced with the value you choose for the id parameter.</p>

<dl>
	<dt>LabelFor_&lt;ID&gt;</dt>
	<dd>The name of the company selected by the user. This is the value the person sees.</dd>

	<dt>ValueOf_&lt;ID&gt;</dt>
	<dd>The unique company key value of the selection. This value can be used by your application for storing company specific data.</dd>		
</dl>



<h4 id="swm:flash">swm:Flash</h4>

<p>The purpose of this tag is to output a status message in the correct format such as &quot;Settings
updated successfully&quot;. This can be used to alert users to an action or make them
aware of a problem.</p>

<h4 class="fancy">Demo</h4>
<p>Look at the top of the page! Note how SWM will move the output to the correct place.</p>
<swm:flash message="This is a demo of the swm:flash SWMML tag!!!" status="info" />

<h4 class="fancy">Example</h4>

<code>&lt;swm:flash message=&quot;Something went horribly wrong!&quot; status=&quot;error&quot; /&gt;</code>

<h4 class="fancy">Parameters</h4>

<dl>
	<dt>message</dt>
	<dd>This is the message to output. e.g. Something went wrong!</dd>
	
	<dt>[status]</dt>
	<dd>Default value &quot;success&quot;. This is the type of message to output. Currently values can
be &quot;success&quot; (will output message in green), &quot;info&quot; (will output message in yellow) or &quot;error&quot; (will output message in red).</dd>

	<dt>[redirect]</dt>
	<dd>If specified SWM will redirect to the specified page before output the message. It is
only necessary to provide a page name, you do not need to include the full absolute
address.</dd>
	
</dl>

<h4 class="fancy">Notes</h4>

<p>This tag can be output anywhere on the page.</p>



<h4 id="swm:imagepicker">swm:ImagePicker</h4>

<p>This is a really quick way to let a user pick an image from the SWM asset manager and
visually see their selection.</p>

<h4 class="fancy">Demo</h4>

<swm:imagepicker id="myimage" width="100" height="100" />

<h4 class="fancy">Example</h4>

<code>&lt;swm:imagepicker id=&quot;myimage&quot; src=&quot;image.gif&quot; width=&quot;100&quot; height=&quot;100&quot; /&gt;</code>

<h4 class="fancy">Parameters</h4>

<dl>
	<dt>id</dt>
	<dd>Your own identifier for the image picker. This allows you to put multiple image pickers
on a page. There will be a form item posted back to your page with this id.</dd>

	<dt>[src]</dt>
	<dd>This is the absolute URL of an image for re-loading a previous selection.</dd>
	
	<dt>[width]</dt>
	<dd>The width of the image selector.</dd>
	
	<dt>[height]</dt>
	<dd>The height of the image selector.</dd>
	
</dl>

<h4 class="fancy">Postback Values</h4>

<p>The full absolute URL of the chosen image will be posted back in a POST item with the same ID as you specify in the ID parameter.</p>



<h4 id="swm:filepicker">swm:FilePicker</h4>

<p>The file picker is a really quick way to let a user select a file from the SWM asset manager.
It adds a &quot;browse for file&quot; link below a text field.</p>

<p>Clicking brows for file will pop open the asset manager and when a user selects a file, it
will be passed back in to the field.</p>

<h4 class="fancy">Demo</h4>

<swm:filepicker id="myfilepicker" />

<h4 class="fancy">Example</h4>

<code>&lt;swm:filepicker id=&quot;myfilepicker&quot; value=&quot;existing file url&quot; /&gt;</code>

<h4 class="fancy">Parameters</h4>

<dl>
	<dt>id</dt>
	<dd>Your own identifier for the file picker. This allows you to put multiple file pickers on a
page. There will be a form item posted back to your page with this id.</dd>

	<dt>[value]</dt>
	<dd>This is the absolute URL of a file for re-loading a previous selection.</dd>
	
</dl>

<h4 class="fancy">Postback Values</h4>

<p>The full absolute URL of the chosen file will be posted back in a POST item with the same ID as you specify in the ID parameter.</p>


<h4 id="swm:user">swm:User</h4>

<p>Outputs details of a SWM user using only the ID of the user. This means you don't need to store the name or icon of a person in your app (as these are likely to change).</p>

<h4 class="fancy">Demo</h4>

<p>
Forename: <strong><swm:user id="161" detail="forename" /></strong><br />
Surname: <strong><swm:user id="161" detail="surname" /></strong><br />
Full name: <strong><swm:user id="161" detail="name" /></strong><br />
Profile picture:<br /><swm:user id="161" detail="profilepic" />
</p>

<h4 class="fancy">Example</h4>

<code>&lt;swm:user id=&quot;161&quot; detail=&quot;name&quot; /&gt;</code>


<h4 class="fancy">Parameters</h4>

<dl>
	<dt>id</dt>
	<dd>The UserID of the user you want to output details for.</dd>

	<dt>detail</dt>
	<dd>What you want to output. Current values are 'forename', 'surname', 'name', 'profilepic'.</dd>
	
</dl>


<h4 id="swm:company">swm:Company</h4>

<p>Outputs details of a SWM company using only the CompanyKey of the company. This means you don't need to store the name or logo of a company in your app (as these are likely to change).</p>

<h4 class="fancy">Demo</h4>

<p>
CompanyName: <strong><swm:company companykey="simpleweb" detail="name" /></strong><br />
Logo:<br /><swm:company companykey="simpleweb" detail="logo" />
</p>

<h4 class="fancy">Example</h4>

<code>&lt;swm:company companykey=&quot;simpleweb&quot; detail=&quot;name&quot; /&gt;</code>

<h4 class="fancy">Parameters</h4>

<dl>
	<dt>companykey</dt>
	<dd>The CompanyKey of the company you want to output details for.</dd>

	<dt>detail</dt>
	<dd>What you want to output. Current values are 'name', 'logo'.</dd>
	
</dl>

<h4 id="mceeditor">WYSIWYG Editor</h4>

<p>You can easily put a WYSIWYG editor on your page. This funtionality is not currently using SWMML but will be converted to SWMML in the future for consistency and support for additional functionality. For the time being, just add a textare field to your output classed as 'mceEditor' or 'mceEditorAdvanced'.</p>

<h4 class="fancy">Demo</h4>

<p><textarea id="myeditorsimple" class="mceEditor">A textarea classed as <strong>mceEditor</strong>.</textarea></p>

<p><textarea id="myeditoradvanced" class="mceEditorAdvanced">A textarea classed as <strong>mceEditorAdvanced</strong>.</textarea></p>


	</div>
	
   <div id="ft"></div>
   
   


</div>


<!--You can put the main app nav anywhere in your output and it will be stripped out and moved, just make sure it's in a div ID'd as appNav -->
<?php
require_once('appnav.php');
?>
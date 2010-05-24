<?php
//Let's get cracking. Include the Swim API lib. This is known as LucidGecko.
require_once('LucidGecko3/LucidGecko3.php');

//Include a config file with our api details.
require_once('config.php');

//Create an instance of the API Lib. This is like this with getInstance because the class is implemented as a singleton.
$lucidGecko = LucidGecko2::getInstance(PLUGIN_KEY, PLUGIN_SECRET);

if(isset($_POST['name'])) {
	
	$name = 'Tom';
	$dob = '15-03-1980';
	
	if(!empty($_POST['name'])) {
		$name = $_POST['name'];
	}

	if(!empty($_POST['dob'])) {
		$dob = $_POST['dob'];
	}
	
	//Post actiity to swm.
	if($lucidGecko->postActivity('testmessage', array('Name' => $name, 'Dob' => $dob))) {
		echo '<swm:flash message="Activity message posted. Check the activity feed." status="success" />';
	} else {
		echo '<swm:flash message="Something went wrong!" status="error" />';
	}
}
?>

<!--YUI is used for layout if you load the yuitrip framework.-->
<swm:css framework="yuitrip" />

<div id="doc3" class="yui-t7">
   <div id="hd" role="banner"><h3>Post To Activity Feed</h3></div>
   <div id="bd" role="main">
	<div class="yui-g">

		<p>It's easy to post a status activity message to SWM.</p>
		<p>The first step is to define the messages in the developer section for the application. Each message has a key with a message. Using the API, you tell it to add a particular message using the key. You do not post the message itself.</p>
		<p>It's possible to put variable data in to a message using placeholder tags such as {DATA} in each message.</p>
		<p>The code to post a message looks like this (you do not need to specify extended data).</p>
		<p>
			<code>$lucidGecko->postActivity('testmessage', array('DATA' => 'Data item1', 'DATA2' => 'Data item2'));</code>
		</p>
		
		<p>Have a go, enter some random data below and then <a href="//activityfeed.php">check the activity</a>:</p>
			
		<form action="//postactivity.php" method="POST">
			<div>
				<label for="name">Name</label><br/>
				<input type="text" name="name" style="width: 400px" />
				<p class="quiet">Enter the name of someone</p>
			</div>
			<div>
				<label for="dob">Date of Birth</label><br/>
				<input type="text" name="dob" style="width: 400px" />
				<p class="quiet">Enter their Birthday</p>
			</div>			
			<div>
				<button class="button positive">
	  				<img src="/images/icons/tick.png" alt=""/> Submit
				</button>
			</div>
		</form>

	</div>

	</div>
   <div id="ft" role="contentinfo"><p></p></div>
</div>


<?php
//Output the nav.
require_once('appnav.php');
?>
<?php
//Let's get cracking. Include the Swim API lib. This is known as LucidGecko.
require_once('LucidGecko/LucidGecko.php');


//Include a config file with our api details.
require_once('config.php');

//Create an instance of the API Lib. This is like this with getInstance because the class is implemented as a singleton.
$lucidGecko = LucidGecko::getInstance(PLUGIN_KEY, PLUGIN_SECRET);

$lucidGecko->outputCalls = true;
$lucidGecko->friendlyErrors = true;


//Information for the logged in user.
?>
<h3>Person</h3>
<pre>
<?
var_dump($lucidGecko->user);
var_dump($lucidGecko->company);
var_dump($lucidGecko->contactCompany);
var_dump($lucidGecko->person);


echo '<pre>';
var_dump($lucidGecko->getProfileData($lucidGecko->person['GUID'], 'twitter'));
echo '</pre>';

?>
</pre>


<!--You can put the main app nav anywhere in your output and it will be stripped out and moved, just make sure it's in a div ID'd as appNav -->
<?php
require_once('appnav.php');
?>
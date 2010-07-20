<?php
//Let's get cracking. Include the Swim API lib. This is known as LucidGecko.
require_once('LucidGecko/LucidGecko.php');

//Include a config file with our api details.
require_once('config.php');

//Create an instance of the API Lib. This is like this with getInstance because the class is implemented as a singleton.
$lucidGecko = LucidGecko::getInstance(PLUGIN_KEY, PLUGIN_SECRET);

$lucidGecko->friendlyErrors = true;
$lucidGecko->outputCalls = true;

//Information for the logged in user.
$lucidGecko->requestWebhook(3016, 'IToDo', array('CompanyKey' => '8db3b67c-8c23-11df-a445-0014221b3344'));
?>
<swm:hasinterface interface="IToDo">
	<swm:interfaceapps interface="IToDo" type="radio" /> 
</swm:hasinterface>
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
$lucidGecko->emailUsers('hello',array($lucidGecko->user['ID']), array('secret' => '123'), null, null, false);
?>
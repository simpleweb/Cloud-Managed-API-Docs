<?php
/*
These need to be specified for each plugin. The key is available to anyone but only the developer can see the secret/GUID.
You do not need to perform any security checks when using the API lib. It's all taken care of in the lib or on the server.
If for any reason your app is posted data from a third part in an attempt to spoof swim, it will throw an exception when instantiating the API lib. You can mimic this by specifying an incorrect plugin secret 
*/
define('PLUGIN_KEY','phpapidocs');
define('PLUGIN_SECRET','a8483276-8c26-11df-a445-0014221b3344');
?>
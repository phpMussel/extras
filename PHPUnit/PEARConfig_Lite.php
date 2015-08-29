<?php

require_once 'Config/Lite.php';
$config = new Config_Lite();

// read config file
$config->read('phpmussel.ini');

// get value from config file
echo $config->get('general', 'cleanup'); 

// set value in config file to 1
$config->set('general', 'cleanup',1); 

// get current value (not yet saved to the config file)
echo $config->get('general', 'cleanup'); 

// save new value to config file
$config->save();

// read updated config file
$config->read('phpmussel.ini');

// get saved value from config file
echo $config->read('phpmussel.ini')->get('general', 'cleanup'); 

<?php
require_once 'Config/Lite.php';
$config = new Config_Lite();

// read config file
$config->read('phpmussel.ini');

// get value from config file
var_dump($config->getBool('general', 'cleanup'));
var_dump($config->getBool('general', 'disable_cli'));

// set value in config file to false
$config->set('general', 'cleanup',false);
$config->set('general', 'disable_cli',true);

// get current value (not yet saved to the config file)
var_dump($config->getBool('general', 'cleanup'));
var_dump($config->getBool('general', 'disable_cli'));

// save new value to config file
$config->save();

// read updated config file
$config->read('phpmussel.ini');

// get saved value from config file
var_dump($config->read('phpmussel.ini')->getBool('general', 'cleanup'));
var_dump($config->read('phpmussel.ini')->getBool('general', 'disable_cli'));

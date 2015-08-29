<?php

require_once('Config.php');
$phpIni = new Config();

// read config file
$root =& $phpIni->parseConfig('phpmussel.ini', 'inicommented');

// get value from config file
// $generalSection =& $root->getItem("section", "general");
// $cleanup = $generalSection->getItem("directive", "cleanup"); 
$cleanup = $root->getItem("section", "general")->getItem("directive", "cleanup"); 
echo ($cleanup->getContent());

// set value in config file to 1
$cleanup->setContent(1);

// get current value (not yet saved to the config file)
echo ($cleanup->getContent());

// save new value to config file
// $cleanup->writeConfig('phpmussel.ini', 'inicommented');
$root->writeDatasrc('phpmussel.ini', 'inicommented');

// get saved value from config file
echo $phpIni->parseConfig('phpmussel.ini', 'inicommented')->getItem("section", "general")->getItem("directive", "cleanup")->getContent(); 

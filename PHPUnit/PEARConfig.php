<?php
require_once 'Config.php';
$phpIni = new Config();
// read config file
$root =& $phpIni->parseConfig('phpmussel.ini', 'inicommented');
// get value from config file
// $generalSection =& $root->getItem("section", "general");
// $cleanup = $generalSection->getItem("directive", "cleanup");
$cleanup = $root->getItem("section", "general")->getItem("directive", "cleanup");
$disable_cli = $root->getItem("section", "general")->getItem("directive", "disable_cli");
var_dump((bool)$cleanup->getContent());
var_dump((bool)$disable_cli->getContent());
// set value in config file to false
$cleanup->setContent(false);
$disable_cli->setContent(true);
// get current value (not yet saved to the config file)
var_dump($cleanup->getContent());
var_dump($disable_cli->getContent());
// save new value to config file
// $cleanup->writeConfig('phpmussel.ini', 'inicommented');
$root->writeDatasrc('phpmussel.ini', 'inicommented');
// get saved value from config file
var_dump((bool)$phpIni->parseConfig('phpmussel.ini', 'inicommented')->getItem("section", "general")->getItem("directive", "cleanup")->getContent());
var_dump((bool)$phpIni->parseConfig('phpmussel.ini', 'inicommented')->getItem("section", "general")->getItem("directive", "disable_cli")->getContent());

<?php
require_once('autoload.php');

$config = include $_SERVER['DOCUMENT_ROOT'].'/config.php';

$controller = new app\CController($config);
$controller->getDetailNews();
<?php


session_start();
$_SESSION['USERNAME']='';
require("config.php");
session_destroy();
header("Location: " . $config_basedir);

?>
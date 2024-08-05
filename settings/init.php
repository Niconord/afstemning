<?php
require "classes/classDB.php";

define("CONFIG_LIVE", "1"); // 0: Test enviroment || 1: Live enviroment

if(CONFIG_LIVE == 0){
    $DB_SERVER = "localhost";
    $DB_NAME = "afstemning";
    $DB_USER = "root";
    $DB_PASS = "";
}else{
    $DB_SERVER = "mysql69.unoeuro.com";
    $DB_NAME = "njdesign_dk_db";
    $DB_USER = "njdesign_dk";
    $DB_PASS = "JohnnyBravo1337";
}

$db = new db($DB_SERVER, $DB_NAME, $DB_USER, $DB_PASS);

<?php
session_start();

$hostName = "localhost";
$dbUserName = "root";
$dbPassword ="fM9drkp6j6@";
$dbName = "snetwork";

$con = new Mysqli($hostName, $dbUserName, $dbPassword, $dbName);

if($con->connect_error) {
	die("Database Connection Failed");
}
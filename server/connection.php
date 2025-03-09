<?php

session_start();

$host='sql306.infinityfree.com'; //mysql host name
$user='if0_35763327'; //mysql username
$pass='Golf588539067'; //mysql password
$db='if0_35763327_MyShop'; //mysql database

$connect = mysqli_connect($host,$user,$pass,$db)or die('Connection Failed');

?>
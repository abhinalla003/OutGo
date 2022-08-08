<?php
session_start();

if(!isset($_SESSION['user']))
{
	header("location: login.php");
}
else
{
	session_destroy();
	header("location: login.php");
}
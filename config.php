<?php 
error_reporting(E_ALL);
session_start();
if(!isset($_SESSION['token'])){
	header('Location:index.php');
}
?>
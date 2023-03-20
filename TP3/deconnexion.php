<?php 
session_start();
require_once("template_header.php");
require_once("template_style.php");
unset($_SESSION['login']);
//header('location: index.php');
?>
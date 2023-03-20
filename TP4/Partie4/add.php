<?php

require_once("config.php");
require_once("connection_db.php");

$mail=$_POST['email'];
$name=$_POST['name'];

echo "$name, $email";

$add = $pdo->prepare("INSERT into 'users'('name','email') VALUES ('$name','$mail);
$request->execute();

header('Location: usersv2.php');
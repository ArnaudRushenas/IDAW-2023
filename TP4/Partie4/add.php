<?php

require_once("config.php");
require_once("connection_db.php");

$email=$_POST['email'];
$name=$_POST['name'];

echo "$name, $email";

$add = $pdo->prepare("INSERT into `users`(`name`,`email`) VALUES ('$name','$email')");
$add->execute();

header('Location: usersv2.php');
<?php

require_once("config.php");
require_once("connection_db.php");

$id=$_POST['id'];

$delete= $pdo->prepare("DELETE FROM `users` WHERE `id`='$id'");
$delete->execute();

header('Location: usersv2.php');
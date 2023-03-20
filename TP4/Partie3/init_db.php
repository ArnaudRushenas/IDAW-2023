<?php

require_once('config.php');

$connectionString = "mysql:host=". _MYSQL_HOST;
    if(defined('_MYSQL_PORT'))
        $connectionString .= ";port=". _MYSQL_PORT;
    $connectionString .= ";dbname=" . _MYSQL_DBNAME;
    $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' );
    $pdo = NULL;

    try {
        $pdo = new PDO($connectionString,_MYSQL_USER,_MYSQL_PASSWORD,$options);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
catch (PDOException $erreur) {
echo 'Erreur : '.$erreur->getMessage();
}

$sql = file_get_contents('bdtest.sql');
$pdo->exec($sql);
echo "Table initialisée <br/>";


// $request = $pdo->prepare("CREATE TABLE users1(
//     id  INT UNSIGNED AUTOINCREMENT PRIMARY KEY,
//     name VARCHAR(30) NOT NULL,
//     email VARCHAR(30) NOT NULL)");
// $request->execute();

$pdo = null;  
?>

<!DOCTYPE html>
<html>

<head>
    <title>USERS</title>
    <!-- <link rel="stylesheet" type="text/css" href="styles.css"> -->
</head>

<body>
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
        echo "connexion réussie <br/>";

}
catch (PDOException $erreur) {
echo 'Erreur : '.$erreur->getMessage();
}

$request = $pdo->prepare("select * from users");
$request->execute();
$result=$request->fetchAll(PDO::FETCH_OBJ);

echo "<table><tr><th>ID</th><th>Name</th><th>Email</th></tr>";
    foreach ($result as $user) {
        echo "<tr><td>" . $user->id . "</td><td>" . $user->name . "</td><td>" . $user->email . "</td></tr>";
    }
    echo "</table>";





// $result = $request->fetchAll(PDO::FETCH_CLASS, "user");
// var_dump($result);
// TODO: add your code here
// retrieve data from database using fetch(PDO::FETCH_OBJ) and
// display them in HTML array
/*** close the database connection ***/
$pdo = null;    

?>

</body>

</html>

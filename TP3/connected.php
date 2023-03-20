<?php
// session_start();
require_once("template_header.php");
require_once("template_style.php");
// on simule une base de données
$users = array(
// login => password
'riri' => 'fifi',
'yoda' => 'maitrejedi');
$login="anonymous";

            // $servername = 'localhost';
            // $username = 'root';
            // $password = '';
            // $database='tp3';
            
            // //On établit la connexion
            // $conn = new mysqli($servername, $username, $password,$database);
            
            // //On vérifie la connexion
            // if($conn->connect_error){
            //     die('Erreur : ' .$conn->connect_error);
            // }
            // /*echo 'Connexion database reussi';
            // echo "<br>";*/

            // $sql = $conn->query("SELECT * from login");

$errorText = "";
$successfullyLogged = false;
if(isset($_POST['login']) && isset($_POST['password'])) {
$tryLogin=$_POST['login'];
$tryPwd=$_POST['password'];
// si login existe et password correspond




if( array_key_exists($tryLogin,$users) && $users[$tryLogin]==$tryPwd ) {
$successfullyLogged = true;
$login = $tryLogin;
} 
else
$errorText = "Erreur de login/password";
}
else
$errorText = "Merci d'utiliser le formulaire de login";

if(!$successfullyLogged) {
echo $errorText;
} 
else {
    $_SESSION['login'] = $login;
}
?>
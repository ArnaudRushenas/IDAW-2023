<?php 
// session_start();
if(isset($_GET['css'])){
$content = $_GET['css']; // Contenu du cookie
setcookie("cookie_style", $content);
}

require_once("template_header.php");
require_once("template_style.php");
if(isset($POST['login'])){
    $_SESSION['login']=$_POST['login'];
    echo $_POST['login']." est connecté"."<br>";
    echo "<a href='deconnexion.php'>Déconnexion</a>";
}
if(isset($_SESSION['login'])){
    echo $_SESSION['login']." est connecté"."<br>";
    echo "<a href='deconnexion.php'>Déconnexion</a>";
}
else{
    echo "<h1>Bienvenue</h1>";
    require_once("connected.php");
    echo "<a href='login.php'>Connexion</a><br>" ;
    echo"<br>Si vous n'avez pas encore de compte: <br>
    <a href='inscription.php'>Inscription</a><br>";
    }
?>
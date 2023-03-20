<?php 
session_start();
require_once("template_header.php");
require_once("template_style.php");?>
<?php
           //database connexion 
            $servername = 'localhost';
            $username = 'root';
            $password = '';
        
            
            //On établit la connexion
            $conn = new mysqli($servername, $username, $password);
            
            //On vérifie la connexion
            if($conn->connect_error){
                die('Erreur : ' .$conn->connect_error);
            }
            /*echo 'Connexion database reussi';
            echo "<br>";*/
            $a=$_POST['NewLogin'];
            $b=$_POST['NewPassword'];
            $c=$_POST['NewPseudo'];
            echo $a;
            $sql = $conn->query("INSERT INTO login (Login,Password,)
            VALUES ('$a','$b','$c')");
            ?>
<h2> Vous avez bien été inscrit</h2>
<p>Votre login est <?php echo $_POST['NewLogin']?>
<a href=index.php>Retour à l'accueil</a>
<a href=login.php>Connexion</a>
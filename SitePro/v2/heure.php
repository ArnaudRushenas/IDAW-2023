<!DOCTYPE html>
<html>
    <head>
        <title>Affichage heure</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.cssé">
    </head>
    
    <body>
        <h1>Afficher l'heure</h1>
        <?php
            echo date('d/m/Y'). '<br>';
            echo date('l d m Y h:i:s'). '<br>';
            echo date('c'). '<br>';
            echo date('r'). '<br>';
        ?>
        <p>Random text</p>
    </body>
</html>
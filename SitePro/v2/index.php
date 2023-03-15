<?php
    require_once('template_header.php');
    require_once('template_menu.php');
    renderMenuToHTML('index');
?>

        <h1>Bienvenue sur la page principale</h1>

        <h2>Pour voir mon CV, rendez-vous sur la page dédiée</h2>

        <h3>Vous trouverez mes projets au lien ci-dessous, aussi disponible en haut de page</h3>
        <ul>
            <li> <a href="../v1/projets.html">Projets</a></li>
        </ul>
    
        
        <?php
    require_once('template_footer.php');
?>
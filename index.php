<!DOCTYPE html>
<html lang="FR">
  <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="index.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Ubuntu+Condensed&display=swap" rel="stylesheet">

    <title>header</title>
  </head>
  <body>
        <!--links to be redirected in my nav-->
        <header>
            <nav>
                <ul>
                    <!--<li><a href="https://christophe-ceccaldi.students-laplateforme.io/livre-or/inscription.php">Accueil</a></li>-->
                    <a href="http://localhost/reservation-salles/index.php">Accueil</a>
                    <li><a href="????????????">Planning</a></li>
                    <li><a href="http://localhost/reservation-salles/inscription.php">Inscription</a></li>
                    <li><a href="http://localhost/reservation-salles/connexion.php">Connexion</a></li>
                    <li><a href="http://localhost/reservation-salles/profil.php">Mofifier son profil</a></li>
                    <li><a href="https://christophe-ceccaldi.students-laplateforme.io/livre-or/deconnexion.php">Deconnexion</a></li>
                </ul >
                
            </nav>
        </header>
        <main class="desalle">
            <p>Bonjour, nos salles sont disponible de 8h à 19h</p>

        </main>
        <!--pour inclure le footer avec liens github-->
         <footer>
            <?php
            require "footer.php";
            ?>
         </footer>   
                
    </body>
</html>
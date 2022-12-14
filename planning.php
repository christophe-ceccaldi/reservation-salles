


<!DOCTYPE html>
<html lang="FR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="index.css">
        <link rel="stylesheet" href="planning.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Ubuntu+Condensed&display=swap" rel="stylesheet">
    </head>
    <header>
        <!--links to be redirected in my nav-->
        <nav>
            <ul>
                <li><a href="http://localhost/reservation-salles/index.php">Accueil</a></li>
                <li><a href="http://localhost/reservation-salles/connexion.php">Connexion</a></li>
                <li><a href="https://christophe-ceccaldi.students-laplateforme.io/livre-or/livreor.php">Planning</a></li>
            </ul >
            
        </nav>
    </header>
    <body class ="mama01">
    <main>
    
    
    
    <?php
$days = ["Lundi","Mardi","Mercredi","Jeudi","Vendredi","Jeudi","Vendredi","Samedi","Dimanche"];?>
<?php for ($i =8; $i < 18; $i++):?>
        <tr>
        <?php for ($j=0; $j=7; $j++):?>
        <?php if ($i == 8):?>
        <td><?= $day[$j] ?></td>
        <?php else :?>
        <td><?= $i?></td>
        <?php endif ;?>
        <?php endfor ;?>
        </tr>
        <?php endfor ;?>
        
        </main>
            <footer>
                    <!--include footer in my page-->
                <?php
                require "footer.php";
                ?>
            </footer>   
    </body>
</html>
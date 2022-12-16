<?php
//open session//
session_start();
//open connection//
require "sqliconnexion.php";


$erreur = false;

if (isset($_GET['erreur'])) {
    $erreur = true;

    switch ($_GET['erreur']) {
        case 1:
            $msgErreur = "Ce jour n'est pas disponible";
            break;
        case 2:
            $msgErreur = "";
            break;
        default:
            $msgErreur = "Une erreur de reservation";

    }

    }elseif (isset($_POST['submit'])){
        if (isset($_POST["texttype"]) && isset($_POST["arrive"]) && isset($_POST["depart"]) && isset($_POST["date"]) && isset($_POST["textdescr"]));{
        //création variable//
        $event = $_POST["texttype"];
        $arrive = $_POST["arrive"];
        $departure = $_POST["depart"];
        $usdate = $_POST["date"];
        $eventdes = $_POST["textdescr"];


        // echo $usdate;

        // check if the given $usdate is on a saturday or sunday
        $isSaturday = date('D', strtotime($usdate)) == 'Sat';
        $isSunday = date('D', strtotime($usdate)) == 'Sun';

        if ($isSaturday || $isSunday) {
            header('Location: reservation-form?erreur=1'); //no reservation on weekends
        }

        echo "$usdate is on a saturday? " . json_encode($isSaturday);
        if (isset($date) && isset($departure))

}

}

?>

<!DOCTYPE html>
<html lang="FR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="index.css">
        <link rel="stylesheet" href="reservation-form.css">
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
        <div class= "displaymod">

            <div>

                <h2>Réservation de salles</h2>
                <!--champs à remplir dans le formulaire pour inscription user avec post pour récupérer les infos-->
                <form method="post">


                    <?php if ($erreur) : ?>
                    <p class="erreur"><?= $msgErreur ?></p>
                    <?php endif; ?>

                    <!--use of label to display the values of keys input (field to fill)-->
                    <label>
                        <span>Titre :</span>
                        <input type="text" id="text" name='texttype'/>
                    </label>
                    
                    
                    <label>
                        <span>Arrivée :</span>
                        <select name="arrive" id="time-select">
                            <option value="09h">09h</option>
                            <option value="10h">10h</option>
                            <option value="11h">11h</option>
                            <option value="12h">12h</option>
                            <option value="13h">13h</option>
                            <option value="14h">14h</option>
                            <option value="15h">15h</option>
                            <option value="16h">16h</option>
                            <option value="17h">17h</option>
                            <option value="18h">18h</option>
                        </select>
                    </label>
                       <!--<input type="time" id="appt" name="appt" min="09:00" max="17:00" required>-->
                    
                    <label>
                        <span>Départ :</span>
                        <!--<input type="time" id="appt" name="appt" min="10:00" max="18:00" required>-->
                        <select name="depart" id="time-select">
                            <option value="10h">10h</option>
                            <option value="11h">11h</option>
                            <option value="12h">12h</option>
                            <option value="13h">13h</option>
                            <option value="14h">14h</option>
                            <option value="15h">15h</option>
                            <option value="16h">16h</option>
                            <option value="17h">18h</option>
                            <option value="18h">18h</option>
                            <option value="19h">19h</option>
                        </select>
                    </label>

                    <label>
                        <span>Date :</span>
                        <input type="date" id="date" name="date">
                    </label>

                    <label>
                    <span>Description :</span>
                        <textarea type="textarea" id="text" name='textdescr'></textarea>
                    </label>
                        <input type="submit" id="button" name='submit'/>
                </form>
            </div>
        </div>        
        </main>
            <footer>
               
            </footer>   
    </body>
</html>
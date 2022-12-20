<?php
//open session//
session_start();

if (!isset($_SESSION['id'])) {
    header('Location: connexion.php');
}

$id = $_SESSION['id'];

//open connection//
require "sqliconnexion.php";


if (isset($_POST['submit'])){
    if (isset($_POST["texttype"]) && isset($_POST["arrive"]) && isset($_POST["depart"]) && isset($_POST["date"]) && isset($_POST["textdescr"]));{
    //création variable//
    $event = htmlspecialchars($_POST["texttype"], ENT_QUOTES);
    $arrive = $_POST["arrive"]; // returns '09' 
    $departure = $_POST["depart"]; // returns '10'
    $usdate = $_POST["date"];
    $eventdes = htmlspecialchars($_POST["textdescr"], ENT_QUOTES);

    //formatting dates manually ...
    $debut = "$usdate $arrive:00:00"; // '2022-12-16 09:00:00'
    $fin = "$usdate $departure:00:00";



    // echo $usdate;

    //check if the given $usdate is on a saturday or sunday
    $isSaturday = date('D', strtotime($usdate)) == 'Sat';
    $isSunday = date('D', strtotime($usdate)) == 'Sun';

    if ($isSaturday || $isSunday) {
        header('Location: reservation-form.php?erreur=1'); //no reservation on weekends
    }

    //echo "IsSaturday = " . json_encode($isSaturday);


    
    //$result = $conn->query("INSERT INTO `reservations` (titre, description, debut, fin, id_utilisateur) VALUES ('$event', '$eventdes', '$debut', '$fin', '$id')");



    //$result = $conn->query($reqresa);
    
    //echo "event => $event <br>";
    //echo "debut => $debut <br>";
    //echo "fin => $fin <br>";
    //echo "eventdes => $eventdes <br>";

    //$findresa = $conn->query("SELECT * FROM `reservations` WHERE debut >= '$debut' AND fin <= '$fin'");
    $findresa = $conn->query("SELECT * FROM `reservations` WHERE '$debut' BETWEEN reservations.debut AND reservations.fin");
    $check = mysqli_fetch_all($findresa);
    $count = count($check);
    header ('location: planning.php');
    //var_dump($check);

    //var_dump($count);

   /* if ($count ===  0){
        $result = $conn->query("INSERT INTO `reservations` (titre, description, debut, fin, id_utilisateur) VALUES ('$event', '$eventdes', '$debut', '$fin', '$id')");
       
    }
    else  {
        echo 'créneau horaire dejà réservé, prenez un autre créneau horaire';

    }*/
}

}


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
            $msgErreur = "Une erreur de réservation";

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
                <li><a href="index.php">Accueil</a></li>
                <li><a href="profil.php">modifier profil</a></li>
                <li><a href="planning.php">Planning</a></li>
                <li><a href="deconnexion.php">Deconnexion</a></li>
            </ul >
            
        </nav>
    </header>
    <body class ="mama01">
   
    <main>
    <?php if (isset($_POST['submit'])) {

        if ($count ===  0){
            $result = $conn->query("INSERT INTO `reservations` (titre, description, debut, fin, id_utilisateur) VALUES ('$event', '$eventdes', '$debut', '$fin', '$id')");
           
        }
        else  {
            echo '<p>créneau horaire dejà réservé, prenez un autre créneau horaire</p>';
    
        }
    }
    
    
    ?>
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
                            <option value="09">09h</option>
                            <option value="10">10h</option>
                            <option value="11">11h</option>
                            <option value="12">12h</option>
                            <option value="13">13h</option>
                            <option value="14">14h</option>
                            <option value="15">15h</option>
                            <option value="16">16h</option>
                            <option value="17">17h</option>
                            <option value="18">18h</option>
                        </select>
                    </label>
                       <!--<input type="time" id="appt" name="appt" min="09:00" max="17:00" required>-->
                    
                    <label>
                        <span>Départ :</span>
                        <!--<input type="time" id="appt" name="appt" min="10:00" max="18:00" required>-->
                        <select name="depart" id="time-select">
                            <option value="10">10h</option>
                            <option value="11">11h</option>
                            <option value="12">12h</option>
                            <option value="13">13h</option>
                            <option value="14">14h</option>
                            <option value="15">15h</option>
                            <option value="16">16h</option>
                            <option value="17">18h</option>
                            <option value="18">18h</option>
                            <option value="19">19h</option>
                        </select>
                    </label>

                    <label>
                        <span>Date :</span>
                        <input type="date" id="date" name="date">
                    </label>

                    <label for="textdescr">Description:</label>
                    <textarea type="textarea" id="textdescr" name='textdescr'></textarea>
                    <input type="submit" id="button" name='submit'/>
                </form>
            </div>
        </div>        
        </main>
            <footer>
               
            </footer>   
    </body>
</html>
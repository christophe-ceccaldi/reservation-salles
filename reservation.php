<?php
//open session//
session_start ();

//open connection//
require "sqliconnexion.php";

//if no session is open so go to connection page
if (!isset($_SESSION['id'])) {
    header('Location: connexion.php');

}
//création varaiable
$id = $_SESSION['id'];


//identity of the id of the event that we wanna display
if (isset($_GET['id'])){
    //création of my id event
    $reservationid = ($_GET['id']);
    //sqli request for get all info from DB info about my reservation
    $dispresa = $conn->query("SELECT * FROM `reservations` WHERE id = '$reservationid' ");
    $result = mysqli_fetch_all($dispresa);
    //sqli request to get the login of user who create the event 
    $dispuser = $conn->query("SELECT `reservations`.*, `utilisateurs`.login FROM reservations
    INNER JOIN utilisateurs
    ON id_utilisateur = utilisateurs.id
    WHERE reservations.id = $reservationid");
    $loguser = mysqli_fetch_all($dispuser);

   

}




?>

<!DOCTYPE html>
<html lang="FR">
  <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://christophe-ceccaldi.students-laplateforme.io/reservation-salles/index.css">
        <link rel="stylesheet" href="https://christophe-ceccaldi.students-laplateforme.io/reservation-salles/reservation.css">
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
                    <li><a href="https://christophe-ceccaldi.students-laplateforme.io/reservation-salles/index.php">Accueil</a></li>
                    <li><a href="https://christophe-ceccaldi.students-laplateforme.io/reservation-salles/planning.php">Planning</a></li>
                    <li><a href="https://christophe-ceccaldi.students-laplateforme.io/reservation-salles/reservation-form.php">Réservation</a></li>
                    <li><a href="https://christophe-ceccaldi.students-laplateforme.io/reservation-salles/deconnexion.php">Deconnexion</a></li>
                </ul >
                
            </nav>
        </header>
        <main class="desalle">
        <div class= "displaymod">
    
            <h2>Détails de la réservation</h2>
            <div class= "inforesa">
                <!--to display details of my reservation-->
                <p><?=$loguser[0][6]?></p>
                <p><?=$result[0][1]?></p>
                <p><?=$result[0][2]?></p>
                <p><?=$result[0][3]?></p>
                <p><?=$result[0][4]?></p>
            </div>
        </div>
        </main>
     
         <footer>
           
         </footer>   
                
    </body>
</html>
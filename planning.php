<?php 
//open connection//
require 'sqliconnexion.php';

$dateToday = date('Y-m-d H:i:s');


//we want to start from monday to sunday//

//start on monday//
$dateStart = (date('D') != 'Mon') ? date('Y-m-d H:i:s', strtotime('last Monday')) : date('Y-m-d H:i:s');
//end on sunday//
$dateEnd = (date('D') != 'Sun') ? date('Y-m-d H:i:s', strtotime('next Sunday')) : date('Y-m-d H:i:s');

//query info about reservation//
$query = "SELECT * FROM `reservations` WHERE `debut` BETWEEN '$dateStart' AND  '$dateEnd'";
$result = mysqli_query($conn, $query);

$reservations = mysqli_fetch_all($result, MYSQLI_ASSOC);

//function for date start,, days, hours//


function computeDateFromStart($dateStart, $days, $hours) {
    $nextDays = date('Y-m-d H:i:s', strtotime($dateStart . '+' . $days . ' day'));
    $dateFromStart = date('Y-m-d H:i:s', strtotime($nextDays . '+' . $hours . ' hour'));

    return $dateFromStart;
}

//function for date & reservation//
function findReservationByDate($date, $reservations) {

    $result = [];

    $foundList = array_filter($reservations, function ($res) use ($date) {
        return ($date >= $res['debut'] && $date < $res['fin']);
    });
    //for each 
    foreach ($foundList as $key => $reservation) {
        $result = $reservation;
    }


    return $result;

}



// echo "Today's date is -> $dateToday <br>";
// echo "Start date is -> $dateStart <br>";
// echo "End date is -> $dateEnd <br>";


// echo "2 days at 9 hours from date start -> " . computeDateFromStart($dateStart, 2, 9) . " <br>";


// echo "Today's timestamp -> ". strtotime($dateToday) . "<br>";

// var_dump($reservations);


// $computedDate = computeDateFromStart($dateStart, 4, 10);
$reservationsTrouver = findReservationByDate('2022-12-16 12:00:00', $reservations);

// echo "Compute date is -> $computedDate <br>";
// var_dump($reservationsTrouver);


?>


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
                <li><a href="http://localhost/reservation-salles/planning.php">Planning</a></li>
            </ul>
            
        </nav>
    </header>
    <body class ="mama01">
    <main>
    
        <?php $days = ["Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi","Dimanche"];?>

        <table>
            <thead>
                <tr>
                    <th class="horraires">Horraires</th>

                    <?php foreach($days as $day) :?>
                    <th><?= $day ?></th>
                    <?php endforeach;?>
                </tr>
            </thead>


            <tbody>
                <?php for ($h = 8; $h <= 18; $h++):?>
                <tr>
                    <td class="horraires"><?= "$h h - " . ($h + 1) . " h" ?></td>

                    <?php for($j = 0; $j < count($days); $j++) :?>

                        <?php 
                            $date = computeDateFromStart($dateStart, $j, $h);
                            $reservation = findReservationByDate($date, $reservations);
                            
                            $readableDate = date('w F jS, Y', strtotime($date));
                        ?>
                        <td class="reservation" title="<?= $readableDate ?>">

                            <?php if($reservation) :?>
                            <a href="reservation.php?id=<?= $reservation['id']?>" title="<?= $reservation['description']?>">
                                <span class="date" hidden><?= $date?></span>
                                <h3 class="titre"><?= $reservation['titre']?></h3>
                                <p class="description"><?= $reservation['description']?></p>
                            </a>
                            <?php else: echo 'disponible'; endif;?>

                        </td>


                    <?php endfor;?>

                </tr>
                <?php endfor;?>
            </tbody>
        </table>


        
    </main>

    </body>
</html>
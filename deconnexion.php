<?php
//page pour deconnexion session//

session_start();
session_destroy();
header("Location: http://localhost/reservation-salles/connexion.php");

?>
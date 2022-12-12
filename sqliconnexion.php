<?php

 //connexionn DB on plesk
try{
    $conn = new mysqli("localhost", "root", "", "reservationsalles");
 
}
catch(Exception $e) {
    echo $e->getMessage();
}

 
?>
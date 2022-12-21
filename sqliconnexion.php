<?php

 //connexionn DB on plesk
try{
    $conn = new mysqli("localhost", "cc", "snowrocket13", "christophe-ceccaldi_reservationsalles");
 
}
catch(Exception $e) {
    echo $e->getMessage();
}

 
?>
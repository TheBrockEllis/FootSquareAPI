<?php

include("passwords.php");

try {  
    $db = new PDO("mysql:host=$DBHOST;dbname=$DBNAME;charset=utf8", "$DBUSER", "$DBPW");
} catch(PDOException $e) {
    echo $e->getMessage();
}

?>

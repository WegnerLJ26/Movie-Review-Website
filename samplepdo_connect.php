<?php

$user = 'dblogin';
$pass = 'password'; // first initial last initial last 4-digits of ID
$db_info='mysql:host=localhost; dbname=cs366-finalproj';
try {
    $db = new PDO($db_info, $user, $pass);

} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}


?>

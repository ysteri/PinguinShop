<?php
header('Content-type: application/json');
require '../pgConnect.php';
require '../classes/Connexion.class.php';
require '../classes/Reservation.class.php';
require '../classes/ReservationDB.class.php';
$cnx= Connexion::getInstance($dsn, $user, $pass);
print "ici ajax";
try{
    print "ici ajax";
    $recherche= new ReservationDB($cnx);
    $retour=$recherche->getClientJson($_GET['email1'],$_GET['nom']);
    print json_encode($retour);
    
} catch (PDOException $e) {
    
    print $e->getMessage();

}
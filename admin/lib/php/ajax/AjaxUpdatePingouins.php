<?php
header('Content-type: application/json');
require '../pgConnect.php';
require '../classes/Connexion.class.php';
require '../classes/Pingouins.class.php';
require '../classes/PingouinsDB.class.php';
$cnx= Connexion::getInstance($dsn, $user, $pass);

try{
    
    $update= new PingouinsDB($cnx);
    extract($_GET,EXTR_OVERWRITE);
    $param = 'id=' . $id . '&champ=' . $champ . '&nouveau=' . $nouveau;
    $update ->updatePingouins($champ,$nouveau,$id);
    
} catch (Exception $e) {
    
    print $e->getMessage();

}

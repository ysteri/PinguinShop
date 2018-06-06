<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PingouinsDB
 *
 * @author Thoma
 */
class PingouinsDB extends Pingouins {
    private $_db;
    private $_infoArray = array();
    private $_variable="valeur";

    public function __construct($cnx) {
        $this->_db = $cnx;
    }

    public function updatePingouins($champ,$nouveau,$id){                
        try {
            $query="UPDATE PINGOUINS set ".$champ." = '".$nouveau."' where ID ='".$id."'";            
            $resultset = $this->_db->prepare($query);
            $resultset->execute();            
            
        }catch(PDOException $e){
            print $e->getMessage();
        }
    }
    
    public function addPingouin(array $data) {
        $query = "insert into PINGOUINS (NOM,DATE_NAISS,IMAGE)"
                . " values (:nom,:date_naiss,:image)";

        try {
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':nom',$data['nom'], PDO::PARAM_STR);
            $resultset->bindValue(':date_naiss',$data['date_naiss'], PDO::PARAM_STR);
            $resultset->bindValue(':image',$data['image'], PDO::PARAM_STR);
                      
            $resultset->execute();

        }catch(PDOException $e){
            print "<br/>Echec de l'insertion";
            print $e->getMessage();
        }        
    }
    
    public function suppPingouin($data) {
        $query = "DELETE FROM PINGOUINS WHERE ID = :id";

        try {
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':id',$data, PDO::PARAM_STR);
            
            $resultset->execute();

        }catch(PDOException $e){
            print "<br/>Echec de la suppression";
            print $e->getMessage();
        }        
    }
}

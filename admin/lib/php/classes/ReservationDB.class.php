<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ReservationDB
 *
 * @author Thoma
 */
class ReservationDB extends Reservation {
    private $_db;
    private $_clientArray = array();

    public function __construct($cnx) {
        $this->_db = $cnx;
    }
    
    public function getClient($email){
        $query="select * from RESERVATION where EMAIL_CLIENT=:email_client";
        try {
        $resultset = $this->_db->prepare($query);
        $resultset->bindValue(':email_client',$email, PDO::PARAM_STR);
        $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            try {
                //$_clientArray[] = new Client ($data);
                $_clientArray[]=$data;
            } catch (PDOException $e) {
                print $e->getMessage();
            }
        }
        return $_clientArray;
    }
    
   public function getClientJson($email,$nom){
        $query="select * from RESERVATION where EMAIL_CLIENT=:email_client and NOM_CLIENT=:nom";
        try {
        $resultset = $this->_db->prepare($query);
        $resultset->bindValue(':email_client',$email, PDO::PARAM_STR);
        $resultset->bindValue(':nom',$nom, PDO::PARAM_STR);
        $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }
       
        while ($data = $resultset->fetch()) {
            try {
                //$_clientArray[] = new Client ($data);
                $_clientArray[]=$data;
                return $_clientArray;
            } catch (PDOException $e) {
                print $e->getMessage();
            }
        }
        
    }
    
    public function addClient(array $data) {
//en commentaire : appel d'une fonction plpgsql stockée dans Postgresql, avec récupération
//de la valeur retournée
        /*$query="select ajout_client (:nom_client,:prenom_client,:email_client,:telephone,:adresse_client,"
                . ":numero,:codepostal,:localite) as retour";
         */
        $query = "insert into RESERVATION (NOM_CLIENT,PRENOM_CLIENT,EMAIL_CLIENT,TELEPHONE,RUE_CLIENT,NUMERO,CODEPOSTAL,LOCALITE,PINGOUIN)"
                . " values (:nom_client,:prenom_client,:email_client,:telephone,:rue_client,:numero,:codepostal,:localite,:pingouin)";

        try {
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':nom_client',$data['nom'], PDO::PARAM_STR);
            $resultset->bindValue(':prenom_client',$data['prenom'], PDO::PARAM_STR);
            
            $resultset->bindValue(':email_client',$data['email1'], PDO::PARAM_STR);
            $resultset->bindValue(':telephone',$data['telephone'], PDO::PARAM_STR);
            $resultset->bindValue(':rue_client',$data['rue_client'], PDO::PARAM_STR);
            
            $resultset->bindValue(':numero',$data['numero'], PDO::PARAM_STR);
            $resultset->bindValue(':codepostal',$data['codepostal'], PDO::PARAM_STR);
            $resultset->bindValue(':localite',$data['localite'], PDO::PARAM_STR); 
            $resultset->bindValue(':pingouin',$data['pingouin'], PDO::PARAM_STR);
            
            $resultset->execute();
            //$retour = $resultset->fetchColumn(0);
            
            //return $retour;
        }catch(PDOException $e){
            print "<br/>Echec de l'insertion";
            print $e->getMessage();
        }        
    }
}

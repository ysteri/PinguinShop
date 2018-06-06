<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AccueilBD
 *
 * @author Thoma
 */
class AccueilBD extends Accueil {
    private $_db;
    private $_array = array();
    
    public function __construct($db) {
       $this->_db = $db;
    }
    
    public function getTexteAccueil(){
        try{
            $query = "select * from admin_pension";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
            while($data = $resultset->fetch()){
                $_array[] = new Accueil($data);
            }
            return $_array;
        } catch (PDOException $e) {
            print $e->getMessage();
        }
        if(!empty($_array)){
            return $_array;
        }
        else{
            return null;
        }
    }
}

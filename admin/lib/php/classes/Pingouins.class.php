<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pingouins
 *
 * @author Thoma
 */
class Pingouins {
    private $_attributs = array();

    public function __construct(array $data) {
        $this->hydrate($data);
    }

    //hydrate
    public function hydrate(array $data) {
        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
    }
    //getters
    public function __get($nom) {
        if (isset($this->_attributs[$nom])) {
            // print_r($this->_attributs);
            return $this->_attributs[$nom];
        }
    }
    //setters
    public function __set($nom, $valeur) {
        $this->_attributs[$nom] = $valeur;
    }
}

<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Connexion
 *
 * @author Thoma
 */
class Connexion {
    private static $_instance = null;

    public static function getInstance($dsn, $user, $pass) {

        if (!self::$_instance) {
            try {
                self::$_instance = new PDO($dsn, $user, $pass);
                self::$_instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
            } catch (PDOException $e) {
                print "Echec de la connexion".$e->getMessage();
            }
        }
        return self::$_instance;
    }
}

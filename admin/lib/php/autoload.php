<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function autoload($nom_classe) {
    if (file_exists('admin/lib/php/classes/' . $nom_classe . '.class.php')) {
        require 'admin/lib/php/classes/' . $nom_classe . '.class.php';
    } else if (file_exists('lib/php/classes/' . $nom_classe . '.class.php')) {
        require 'lib/php/classes/' . $nom_classe . '.class.php';
    } else {
        print 'Aucune classe charg&eacute;e';
    }
}

spl_autoload_register('autoload');

<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (file_exists('admin/lib/php/pgConnect.php')) {
    require 'admin/lib/php/pgConnect.php';
    require 'admin/lib/php/autoload.php';
} else
if (file_exists('lib/php/pgConnect.php')) {
    require 'lib/php/pgConnect.php';
    require 'lib/php/autoload.php';
}
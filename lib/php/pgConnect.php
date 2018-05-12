<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$dsn='pgsql:host=localhost;dbname=pinguin;port=5432';
$user='thomas';
$pass='thomas';

$cnx = new PDO($dsn,$user,$pass);
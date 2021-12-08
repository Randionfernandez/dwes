<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
echo "constante dinámica";
var_dump(defined('SID'));  // bool(false) - Not defined...
session_start();
echo "iniciada sesión";
var_dump(defined('SID'));  // bool(true) - Defined now!
echo SID;
var_dump($_COOKIE);
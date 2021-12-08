<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();

echo "los ficheros de sesión están en: " .ini_get('session.save_path') . "<br/>";
echo  "los fichero temporales están en: " .sys_get_temp_dir ();
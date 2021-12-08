<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$con=mysqli_connect("localhost","dwes","abc123.","dwes");

var_dump($con);  // Return mysql object.

$conn = mysqli_connect(NULL, null, null);
$conn = mysqli_connect('NULL', NULL, NULL);
//Return Same object given before. Not thrown false or error.

$conn = mysqli_connect('NULLTest', null, NULL);
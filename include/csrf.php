<?php
session_start();
//CREATE CSRF TOKEN
$token = md5(uniqid(rand(), true));
$_SESSION['csrf_token'] = $token;
//ADDING CSRF TOKEN INTO FORM

//VALIDATING CSRF TOKEN
?>
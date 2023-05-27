<?php 

@include 'server.php';

session_start();
session_destroy();
session_destroy();

header('location:LoginPage.php');
?>
<?php
session_start();
    if($_SESSION['users']);{
        session_unset();
        header('Location:../index.php');
    }
?>
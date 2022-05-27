<?php
session_start();
if($_SESSION['users']['status']==0 ){
    header("Location: index.php");
}
?>
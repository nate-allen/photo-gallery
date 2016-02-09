<?php require_once("includes/header.php") ?>
<?php

$session->logout();
$session->redirect("login.php");
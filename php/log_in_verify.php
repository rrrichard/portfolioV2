<?php
session_start();
require_once 'functions.php';
require_once '../db/db_query.php';

$db = getDbConnection();
$logInDetails = getDetails($db);
$dbUsername = $logInDetails['username'];
$dbPassword = $logInDetails['password'];
$passwordCheck = password_verify($_POST['password'], $dbPassword);

if (isset($_POST['username']) && isset($_POST['password'])) {
    $postUsername = $_POST['username'];
    $postPassword = $_POST['password'];
    $passwordCheck = password_verify($_POST['password'], $dbPassword);
    if ($passwordCheck == true) {
        $_SESSION['valid'] = true;
        header('Location: admin_page.php');
    } else {
        header('Location: log_in.php');
    }
}
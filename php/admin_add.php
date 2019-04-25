<?php
require_once 'functions.php';
require_once '../db/db_query.php';

$db = getDbConnection();
session_start();

if ($_SESSION['valid'] == false){
    header('Location: log_in.php');
}

if (isset($_POST['add_form'])){
    $addSubmit = $_POST['add_form'];
    if (empty(trim($addSubmit)) || (strlen($addSubmit) > 1000)){
        header('Location: admin_page.php');
    } else {
        addParagraphToDb($db, $addSubmit);
    }
}

?>

Your new paragraph has been successfully added, click <a href="admin_page.php">here</a> if you want to do more.
Or click <a href="../index.php">here</a> to go view the portfolio.

<?php
require_once 'log_in_verify.php';

if ($_SESSION['valid'] == true){
    header('Location: admin_page.php');
}

if (isset($_POST['logout'])){
    $_SESSION['valid'] = false;
    session_unset();
    header('Location: log_in.php');
    exit;

}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Log In Page</title>
    <link rel= "stylesheet" type="text/css" href= "log_in_style.css">
</head>
<body>
    <div class="logIn">
        <form method="post" action="log_in_verify.php">
            <input class="inputBoxes" type="text" name="username" placeholder="username">
            <input class="inputBoxes" type="password" name="password" placeholder="password">
            <div>
                <input type="submit">
            </div>
        </form>
    </div>
</body>
</html>


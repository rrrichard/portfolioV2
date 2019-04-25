<?php
session_start();

require_once 'functions.php';
require_once '../db/db_query.php';

$db = getDbConnection();
$paragraphs = addAboutMe($db);
$editDropdownResults = editParagraphDropdown($paragraphs);

if (isset($_POST['logout'])){
    header('Location: log_in.php');
}

if ($_SESSION == false){
    header('Location: log_in.php');
}

if (isset($_POST['add_form'])){
    $addSubmit = $_POST['add_form'];
}

if (isset($_POST['edit'])){
    $submitButton = submitButton();
    $editChoice = $_POST['editSelect'];
    if ($editChoice == "choose") {
        header('Location: admin_page.php');
    } else {
        $getEdit = getEdit($db, $editChoice);
        $editHidden = '<input type="hidden" name="editId" value=' . $editChoice . ' />';
    }
    $pasteEdit = pasteEdit($getEdit);
}

if (isset($_POST['submit'])){
    if (isset($_POST['edit_form'])){
        $newParagraph = $_POST['edit_form'];
    }
    if (empty(trim($newParagraph)) || (strlen($newParagraph) > 1000) ) {
        header('Location: admin_page.php');
    } else {
        $submitChoice = $_POST['editId'];
        editParagraph($db, $submitChoice, $newParagraph);
        header('Location: admin_page.php');
    }
}

if (isset($_POST['delete'])){
    $deleteChoice = $_POST['deleteSelect'];
    deleteParagraph($db, $deleteChoice);
    header('Location: admin_page.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Secured Page Access</title>
    <link rel= "stylesheet" type="text/css" href= "../normalize.css">
    <link rel= "stylesheet" type="text/css" href= "../admin_style.css">
</head>
<body>
    <div class="mainText container">
            <h4>Welcome</h4>
        <h2><a href="../index.php">RICHARD</a></h2>
            <h3>'ABOUT ME'</h3>
    </div>
    <div class="forms container">
        <div class="formSize">
            <p>Add additional paragraphs</p>
            <form method="post" action="admin_add.php" class="formAdd editParaRight">
                <textarea name="add_form"  required></textarea>
                <div>
                <input type="submit" name="addSubmit">
                </div>
            </form>
        </div>
        <div class="formSize">
            <p>Edit paragraph</p>
            <form method="post" class="formText" action="admin_page.php">
                <h4>Choose which paragraph to edit</h4>
                <select name="editSelect">
                    <option selected="selected" value="choose">Choose Paragraph</option>
                    <?php  echo $editDropdownResults;  ?>
                </select>
                <div class="edit">
                    <input type="submit" name="edit" value="Edit">
                </div>
            </form>
            <form method="post" class="formText editParaRight" action="admin_page.php">
                <textarea class="edit_submit" name="edit_form" required><?php
                    if(isset($pasteEdit)){
                        echo $pasteEdit;
                    } ?></textarea>
                <?php
                if (isset($editChoice)){
                    echo $editHidden;
                }
                ?>
                <div class="submit_buttons">
                    <?php
                    if (isset($submitButton)) {
                        echo $submitButton;
                    }
                    ?>
                </div>
            </form>
        </div>
        <div class="formSize">
            <p>Delete paragraph</p>
            <form method="post" action="admin_page.php">
                <h4>Choose which paragraph to delete</h4>
                <select name="deleteSelect">
                    <option selected="selected" value="choose">Choose Paragraph</option>
                    <?php echo $editDropdownResults; ?>
                </select>
                <div class="submit_buttons submit">
                    <input type="submit" name="delete" value="Delete Paragraph">
                </div>
            </form>
        </div>
    </div>
    <form method="post" action="log_in.php">
        <input type="submit" name="logout" class="logout" value="logout">
    </form>
</body>
</html>

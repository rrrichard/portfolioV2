<?php


/**
 * this function selects the paragraphs in the database and fetches all the data
 *
 * @param $db PDO is the variable that connects the php to mysql and allows it to be called in functions
 *
 * @return mixed returns all the data in order of their id
 */
function addAboutMe(PDO $db) : array {
    $query = $db->prepare("SELECT `id`, `paragraph` FROM `about_me` WHERE `deleted` = '0';");
    $query->execute();
    return $query->fetchAll();
}

/**
 * this function enables the data to be returned as a <p> string in the website
 *
 * @param array $paragraphs calls in the method that contains all the arrays of the paragraphs
 *
 * @return string returns each paragraph in the database as a <p> string and enables it to be output in the website
 */
function addParagraphs(array $paragraphs) :string {
    $paragraphPlaceholder = '';
        foreach ($paragraphs as $paragraph) {
            if (is_string($paragraph['paragraph']) && array_key_exists('paragraph', $paragraph)) {
                $paragraphPlaceholder .= '<p>' . $paragraph['paragraph'] . '</p>';
            } else {
                $paragraphPlaceholder .= '';
            }
        }
        return $paragraphPlaceholder;
}

/**
 * this function adds the string input in the 'add' form to the database
 *
 * @param PDO $db calls the database from the db_query because this function requires it
 *
 * @param string $addSubmit inserts the string in the text area to the database and pairing it with an `id` and a `deleted` number
 */
function addParagraphToDb (PDO $db, string $addSubmit){
    $query = $db->prepare("INSERT INTO `about_me` (`paragraph`) VALUES (:newParagraph);");
    $query->bindParam(':newParagraph', $addSubmit);
    $query->execute();
}

/**this function returns an <option> tag with the paragraph value inside the opening tag and the content of that id
 *
 * @param array $paragraphs ignore the name, its a placeholder but it is the list of the paragraphs in the database
 *
 * @return string returns a list of <options> in  the dropdown
 */
function editParagraphDropdown (array $paragraphs) : string {
    $paragraphList = '';
    $i = 1 ;
    foreach ($paragraphs as $paragraph){
        if (is_string($paragraph['paragraph']) && array_key_exists('paragraph', $paragraph)) {
            $charPreview = substr($paragraph['paragraph'], 0, 20);
            $paragraphList .= '<option value=' . $paragraph['id'] . '>paragraph ' . $i++ . ' ' . $charPreview . '</option>';
        } else {
            $paragraphList .= '';
        }
    }
    return $paragraphList;
}

/**
 * this function retrieves the paragraph that is chosen in the dropdown list
 *
 * @param PDO $db calls the database from the db_query because this function requires it
 *
 * @param string $editChoice outputs a number of the id that will be used by the WHERE in MySQL
 *
 * @return mixed retrieves an array from one row of the result by the SELECT in MySQL
 */
function getEdit(PDO $db, string $editChoice) : array {
    $query = $db->prepare("SELECT `paragraph` FROM `about_me` WHERE `id` = :choiceId;");
    $query->bindParam(':choiceId', $editChoice);
    $query->execute();
    return $query->fetch();
}

/**
 * this function enables the html page to call and put the paragraph that is chosen from the dropdown and into the textarea for edit
 *
 * @param array $getEdit is the variable that retrieves the output of the getEdit function, which is the selected paragraph in the dropdown
 *
 * @return string returns a variable that can be assigned in the admin page and can be put into the textarea, the textarea will be populated by the chosen paragraph
 */
function pasteEdit(array $getEdit) : string {
    $editPopulate = '';
    if (array_key_exists('paragraph', $getEdit)) {
        $editPopulate .= $getEdit['paragraph'];
    } else {
        $editPopulate .= '';
    }
    return $editPopulate;
}

/**
 * this function updates the existing paragraph in the database with the text that was submitted in the edit form text area
 *
 * @param PDO $db calls the database from the db_query because this function requires it
 *
 * @param string $submitChoice outputs a number of the id that will be used by the WHERE in MySQL
 *
 * @param string $newParagraph is a variable that gets the text that was submitted in the 'edit paragraph' text area
 *
 * @return bool the function will only be called when the user press 'submit' and if true, will update the selected paragraph with the new paragraph
 */
function editParagraph(PDO $db, string $submitChoice, string $newParagraph) : bool {
    $query = $db->prepare("UPDATE `about_me` SET `paragraph`= :newParagraph WHERE `id`= :editChoice;");
    $query->bindParam(':newParagraph', $newParagraph);
    $query->bindParam(':editChoice', $submitChoice);
    return $query->execute();
}

/**
 * this function 'deletes' a function by changing the selected paragraph's `deleted` to 1 instead of the default 0
 *
 * @param $db PDO calls the database from the db_query because this function requires it
 *
 * @param $deleteChoice string retrieves the `id` of the selected choice
 *
 * @return mixed 'deletes' the paragraph and prevents it from showing in the portfolio
 */
function deleteParagraph(PDO $db, string $deleteChoice) : bool {
    $query = $db->prepare("UPDATE `about_me` SET `deleted`= '1' WHERE `id`= :deleteChoice;");
    $query->bindParam(':deleteChoice', $deleteChoice);
    return $query->execute();
}

/** this function returns an input button once edit is clicked and a paragraph is chosen
 *
 * @return string a html submit button
 */
function submitButton() : string {
    return '<input type="submit" name="submit" value="Submit">';
}

/**
 * this function gets the username and password from the database
 *
 * @param PDO $db calls the database from the db_query because this function requires it
 *
 * @return array of [['username'=>'password']], which will be needed for the password_verify
 */
function getDetails(PDO $db) : array {
    $query = $db->prepare("SELECT `username`,`password` FROM `accounts`;");
    $query->execute();
    return $query->fetch();
}

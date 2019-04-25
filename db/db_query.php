<?php

/**
 * this function allows the database to be called in any php while it being secured
 *
 * @return PDO returns the MySQL link, but you need to call and save the function in a variable when using it
 */
function getDbConnection() {
    $db = new PDO('mysql:host=127.0.0.1; dbname=richard_portfolio', 'root');
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $db;
}
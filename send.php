<?php
require_once("db.php");

if (isset($_POST['name']) && isset($_POST['data-birth']) && isset($_POST['text-comment'])) {
    $db = new Database();
    
    $data = date("Y-m-d H:i:s");
    
    $db->get_rows(
        "INSERT INTO `comments` (`name`, `date_birth`, `text`, `created_at`, `updated_at`) 
        VALUES (
        '" . $_POST['name'] . "',
        '" . $_POST['data-birth'] . "',
        '" . $_POST['text-comment'] . "',
        '" . $data . "',
        '" . $data . "')"
    );
}

?>
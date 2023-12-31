<?php
include("functions.php");

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["id"];
    deleteUser($id);
}

header("Location: home.php");
?>

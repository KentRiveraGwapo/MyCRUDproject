<?php
 session_start();
 $conn = mysqli_connect("localhost", "root", "", "crud2_db");
 if(!$conn){
    die(mysqli_error($conn));
 }
 ?>
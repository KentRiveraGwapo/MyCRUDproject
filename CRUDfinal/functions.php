<?php
include("config.php");

function getAllUsers() {
    global $conn;
    $sql = "SELECT * FROM student";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

function getUserById($id) {
    global $conn;
    $sql = "SELECT * FROM student WHERE id = $id";
    $result = $conn->query($sql);
    return $result->fetch_assoc();
}

function addUser($lastname, $firstname, $age, $gender, $course, $year_sec, $address) {
    global $conn;
    $sql = "INSERT INTO student (lastname, firstname, age, gender, course, year_sec, address) VALUES ('$lastname', '$firstname', '$age', '$gender', '$course', '$year_sec', '$address')";
    $conn->query($sql);
}

function updateUser($id, $lastname, $firstname, $age, $gender, $course, $year_sec, $address) {
    global $conn;
    $sql = "UPDATE student SET lastname='$lastname', firstname='$firstname', age='$age', gender='$gender', course='$course', year_sec='$year_sec', address='$address' WHERE id=$id";
    $conn->query($sql);
}

function deleteUser($id) {
    global $conn;
    $sql = "DELETE FROM student WHERE id=$id";
    $conn->query($sql);
}
?>

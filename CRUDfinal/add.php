<?php
include("functions.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lastname = $_POST["lastname"];
    $firstname = $_POST["firstname"];
    $age = $_POST["age"];
    $gender = $_POST["gender"];
    $course = $_POST["course"];
    $year_sec = $_POST["year_sec"];
    $address = $_POST["address"];


    addUser($lastname, $firstname, $age, $gender, $course, $year_sec, $address);
    

    header("Location: home.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<h2 class="d-block p-2 text-bg-primary">Add Student</h2>

<form class="mt-10" method="post" action="">
<input class="form-control" type="text" name="lastname" required placeholder="Lastname" aria-label="default input example">
<input class="form-control" type="text" name="firstname" required placeholder="Firstname" aria-label="default input example">
<input class="form-control" type="text" name="age" required placeholder="Age" aria-label="default input example">
<input class="form-control" type="text" name="gender" required placeholder="Gender" aria-label="default input example">
<input class="form-control" type="text" name="course" required placeholder="Course" aria-label="default input example">
<input class="form-control" type="text" name="year_sec" required placeholder="Year_sec" aria-label="default input example">
<input class="form-control" type="text" name="address" required placeholder="Address" aria-label="default input example">
<div class="float-end mt-5">
<a href="home.php" class="btn btn-danger">Back to student List</a>
<input type="submit" value="Add Student" class=" btn btn-primary">


</div>
</form>


</body>
</html>

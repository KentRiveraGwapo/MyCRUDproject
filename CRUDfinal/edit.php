<?php
include("functions.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $lastname = $_POST["lastname"];
    $firstname = $_POST["firstname"];
    $age = $_POST["age"];
    $gender = $_POST["gender"];
    $course = $_POST["course"];
    $year_sec = $_POST["year_sec"];
    $address = $_POST["address"];

    updateUser($id, $lastname, $firstname, $age, $gender, $course, $year_sec, $address,);

    header("Location: home.php");
} else {
    $id = $_GET["id"];
    $user = getUserById($id);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<h2 class="d-block p-2 text-bg-primary">Edit User</h2>

<form method="post" action="">
    <input type="hidden" name="id" value="<?= $user['id']; ?>">
    <label>lastname: <input class="form-control" type="text" name="lastname" value="<?= $user['lastname']; ?>" required></label><br>
    <label>firstname: <input class="form-control" type="text" name="firstname" value="<?= $user['firstname']; ?>" required></label><br>
    <label>age: <input class="form-control" type="text" name="age" value="<?= $user['age']; ?>" required></label><br>
    <label>gender: <input class="form-control" type="text" name="gender" value="<?= $user['gender']; ?>" required></label><br>
    <label>course: <input class="form-control" type="text" name="course" value="<?= $user['course']; ?>" required></label><br>
    <label>year_sec: <input class="form-control" type="text" name="year_sec" value="<?= $user['year_sec']; ?>" required></label><br>
    <label>address: <input class="form-control" type="text" name="address" value="<?= $user['address']; ?>" required></label><br>
  <div class="float-end">
  <a href="home.php" class="btn btn-danger">Cancel</a>
   <input type="submit" value="Update information" class=" btn btn-primary">
  </div>
</form>

</body>
</html>

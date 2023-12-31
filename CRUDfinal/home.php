<?php
include("functions.php");

$users = getAllUsers();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Listahan123</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="m">
<div>
<h2 class=" text-center mb-4 d-block p-2 text-bg-primary mt-3">Student List<form action="logout.php" method="post" class="float-end">
        <button type="submit" class="btn btn-danger">Logout</button>
    </form></h2>

</div>


<a class="btn btn-primary btn-lg " href="add.php" role="button">Add Student</a><hr>

<table class=" text-center table table-bordered">
    <tr>
        <th>ID</th>
        <th>Lastname</th>
        <th>Firstname</th>
        <th>Age</th>
        <th>Gender</th>
        <th>Course</th>
        <th>Year and Section</th>
        <th>Address</th>
        <th>Action</th>
    </tr>

    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= $user['id']; ?></td>
            <td><?= $user['lastname']; ?></td>
            <td><?= $user['firstname']; ?></td>
            <td><?= $user['age']; ?></td>
            <td><?= $user['gender']; ?></td>
            <td><?= $user['course']; ?></td>
            <td><?= $user['year_sec']; ?></td>
            <td><?= $user['address']; ?></td>
            <td>      
                <a class="btn btn-info" href="edit.php?id=<?= $user['id']; ?>" role="button">Edit</a>
                <a class="btn btn-danger"  href="delete.php?id=<?= $user['id']; ?>" role="button" onclick="return confirm('Are you sure you want to delete items?')">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.js" integrity="sha512-HkAISJ55u/2jGG42Bet54ZmPM+7+XKCY84JsDoKGYK98EeVGg5Ka/NcvnE4lYCzbX3+aGN46rpShBtDLg1wo9w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
</body>
</html>

<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $course = $_POST['course'];
    $year_sec = $_POST['year_sec'];
    $address = $_POST['address'];

    $sql = "UPDATE student SET lastname='$lastname', firstname='$firstname', age='$age', gender='$gender', course='$course', year_sec='$year_sec', address='$address' WHERE id='$id'";
    $conn->query($sql);
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM student WHERE id='$id'");
$student = $result->fetch_assoc();
?>
<style>
    form{
        margin: 5% 30% 1% 30%;
        padding: 2% 5% 5% 5%;
        border: 1px black solid;
        border-radius: 10px;
        align-items: center;
        background-color:  #4d94ff;
        color: white;

    }
    h2{
        padding-top: 0;
        text-align: center;
    }
    input{
        margin-top: 3%;
        width: 100%;
    }
    button{
        margin: 0 30% 0 0;
        padding: 5px;
        width: 10%;
        border-radius: 5px;
    }
    textarea{
        width: 100%
    }
    .submit{
        background-color: blue;
        color: white;
        height: 30px;
        border-radius: 10%;
    }
</style>

<form method="post" action="">
    <h2>Edit Product</h2>
    <input type="hidden" name="id" value="<?= $student['id'] ?>">
    Lastname: <input type="text" name="lastname" value="<?= $student['lastname'] ?>" required><br>
    Firstname: <input type="text" name="firstname" value="<?= $student['firstname'] ?>" required><br>
    Age: <input type="text" name="age" value="<?= $student['age'] ?>" required><br>
    Gender: <input type="text" name="gender" value="<?= $student['gender'] ?>" required><br>
    Course: <input type="text" name="course" value="<?= $student['course'] ?>" required><br>
    Year and Section: <input type="text" name="year_sec" value="<?= $student['year_sec'] ?>" required><br>
    Address: <input type="text" name="address" value="<?= $student['address'] ?>" required><br>
    <input class="submit" type="submit" value="Update Information">
</form>
<button style="float: right; margin-top: 0;" onclick="document.location='index.php'">Cancel</button>

<?php
include 'footer.php';

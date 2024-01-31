<?php
include 'config.php';

// CREATE
if(isset($_POST['submit'])) {
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $course = $_POST['course'];
    $year_sec = $_POST['year_sec'];
    $address = $_POST['address'];

    $sql = "INSERT INTO student (lastname, firstname, age, gender, course, year_sec, address ) VALUES ('$lastname', '$firstname', '$age', '$gender', '$course', '$year_sec', '$address')";
    $result = $conn->query($sql);

    if ($result) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
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
<!-- Add this form at the beginning of your HTML file -->
<form action="" method="post">
    <label for="lastname">Lastname:</label>
    <input type="text" name="lastname" required>
    <label for="firstname">Firstname:</label>
    <input type="text" name="firstname" required>
    <label for="age">Age:</label>
    <input type="text" name="age" required>
    <label for="gender">Gender:</label>
    <input type="text" name="gender" required>
    <label for="course">Course:</label>
    <input type="text" name="course" required>
    <label for="year_sec">Year and Section:</label>
    <input type="text" name="year_sec" required>
    <label for="address">Address:</label>
    <input type="text" name="address" required>


    <input class="submit" type="submit" name="submit" value="Add Record">
</form>
<button style="float: right; margin-top: 0;" onclick="document.location='index.php'">Cancel</button>
<?php
include 'footer.php';

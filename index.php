<?php
session_start();
include 'config.php';


if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE id='$user_id'";
$result = $conn->query($sql);
$user = $result->fetch_assoc();
?>
  <script>
        function confirmLogout() {
            return confirm("Are you sure you want to logout?");
        }
    </script>
    <style>
        .title{
            display: block;
            float: left;
            width: 100%;
            background-color:  #4d94ff;
            color: white;
        }
        ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color:  #4d94ff;
}

li {
  float: right;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}
h1{
    margin-left: 3%;
}

/* Change the link color to #111 (black) on hover */
li a:hover {
  background-color: blue;
}

.product{
    padding-top: 3%;
}
table{
    width: 93%;
    margin: 3%;
    text-align: center;
}
h2{
    margin: 2% 0 3% 2%;
    color: black;
    font-size: 50px;
    text-align: center;
    
}
.add{
  background-color: 4d94ff;
  border: none;
  color: white;
  padding: 15px 32px;
  margin: 2%;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}
.delete{
    background-color: red;
  border: none;
  color: white;
  padding: 15px 32px;
  margin: 2%;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 10px;
}
.edit{
    background-color: blue;
  border: none;
  color: white;
  padding: 15px 32px;
  margin: 2%;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 10px;
}
h4{
    text-align: center;
}
p{
    margin: 0;
}
.result{
    border: 2px black solid;
    width: 93%;
    text-align: center;
    padding: 2%;
    width: 80%;
}
.pagination{
    margin:0 0 20% 10%;
     display: inline-block;
}
.pagination a{
    float: left;
    margin: 2px;
    color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
  border: 1px solid #ddd; /* Gray */
}
.pagination a:first-child {
  border-top-left-radius: 5px;
  border-bottom-left-radius: 5px;
}

.pagination a:last-child {
  border-top-right-radius: 5px;
  border-bottom-right-radius: 5px;
}

.pagination a:hover:not(.active) {background-color: grey;}
    </style>

<div class="title">
    
<h1>Welcome, <?php echo $user['username']; ?>!</h1>
<ul>
    <li><?php
if (isset($_SESSION['user_id'])) {
    echo '<a onclick="if(confirmLogout()) window.location.href=\'logout.php\';">Logout</a>';
} else {
    header("Location: login.php");
    exit();
}?></li>
 <li><a href="profile.php">View Profile</a></li>
 <li><a href="about.php">About Us</a></li>

 <form style="margin: 10px; text-align: center;" action="search.php" method="GET">
        <label for="search">Search:</label>
        <input type="text" name="search" id="search" required>
        <button type="submit">Search</button>
    </form>
</ul>
</div>

<div class="product">
    <h2>Student List</h2>
<a class="add" href="add_student.php">Add Sudent</a>

<?php

// READ
$records_per_page = 10;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $records_per_page;

$sql = "SELECT * FROM student LIMIT $offset, $records_per_page";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
 ?>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Last name</th>
        <th>First name</th>
        <th>Age</th>
        <th>Gender</th>
        <th>Course</th>
        <th>Year & Section</th>
        <th>Address</th>
        <th>Actions</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()) : ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['lastname'] ?></td>
            <td><?= $row['firstname'] ?></td>
            <td><?= $row['age'] ?></td>
            <td><?= $row['gender'] ?></td>
            <td><?= $row['course'] ?></td>
            <td><?= $row['year_sec'] ?></td>
            <td><?= $row['address'] ?></td>
            <td>
                <a class="edit" href="edit_student.php?id=<?= $row['id'] ?>">Edit</a>
                <a class="delete" href="delete_student.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure you want to delete student?')">Delete</a>

            </td>
        </tr>
    <?php endwhile; ?>
        </table>
 <?php
} else {
    echo "No records found";
}

// Pagination
$sql_count = "SELECT COUNT(*) AS total_records FROM student";
$result_count = $conn->query($sql_count);
$row_count = $result_count->fetch_assoc();
$total_records = $row_count['total_records'];

$total_pages = ceil($total_records / $records_per_page);

echo "<div class='pagination'>";
for ($i = 1; $i <= $total_pages; $i++) {
    echo "<a href='index.php?page=$i'>$i</a> ";
}
echo "</div>";

// CLOSE DATABASE CONNECTION
$conn->close();
?>



<?php
include 'footer.php';
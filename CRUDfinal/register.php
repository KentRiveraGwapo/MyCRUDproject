<?php
require 'config.php';
if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    $duplicate = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' OR email = '$email'");

    if(mysqli_num_rows($duplicate)>0){
        echo
        "<script> alert('Username or Email already Taken'); </script>";
    }
    else{
        if($password == $confirmpassword){
            $query = "INSERT INTO user VALUES('','$name','$username','$email','$password')";
            mysqli_query($conn,$query);
           
            header("location: home.php");
            
        }
        else{
            echo
            "<script> alert('Password not match'); </script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
    body {
    margin: 0;
    padding: 0;
}

nav {
    background-color: rgb(138, 107, 233);
    overflow: hidden;
    padding: 0 10px 0 10px;
    color: white;
}

nav a {
    float: right;
    display: block;
    color: rgb(255, 255, 255);
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

nav a:hover {
    background-color: #ddd;
    color: black;
}
.form1{
    margin-top: 40px;
    align-items: center;
    width: 300px;
	height: 500px;
	background-color: rgb(41, 39, 39 , 0.3);
	box-shadow: 0 5px 30px black;
    border: 1px blue solid;
}
.login{
	color: rgb(255, 255, 255);
    background-color: blue;
    height: 50px;
    padding-top: 10px;
	box-shadow: 0 5px 30px rgb(83, 69, 216);
    margin: 0 0 0 0;

}
.form2{
  border: none;
  padding-top:20px;
  width: 80%;
  padding: 10px;
  margin-bottom: 20px;
  font-size: 14px;
  font-weight: bold;
  background-color: transparent;
  color: white;
}
.form2 input{
	border: none;
  width: 80%;
  border-bottom: 2px solid white;
  padding: 10px;
  margin-bottom: 20px;
  font-size: 14px;
  font-weight: bold;
  background-color: transparent;
  color: white;
}
.btn{
	padding: 10px;
  width: 150px;
  border-radius: 20px;
  background-color: rgb(29, 10, 136);
  border-style: none;
  color: white;
  font-weight: 600;
}
.error{
  background: orange;
  color: red;
  margin-top: 0;
  padding: 5px;
  weight: 95%;
}
   </style>
</head>
<body>
    <center><form action="" method="POST" autocomplete="off" class="form1">
        <h1>Register</h1>
        <div class="form2">
            <label for="name"></label>
            <input type="text" name="name" id = "name" placeholder="Name" value=""><br>
            <label for="user_name"></label>
            <input type="username" name="username" id = "username" placeholder="Username" value=""><br>
            <label for="email"></label>
            <input type="email" name="email" id = "email" placeholder="Email" value=""><br>
            <label for="password"></label>
            <input type="password" name="password" id = "password" placeholder="Password" value=""><br>
            <label for="confirmpassword"></label>
            <input type="password" name="confirmpassword" id = "confirmpassword" placeholder="Confirmpassword" value=""><br>
        </div>
        <button class="btn" type="submit" name="submit">Save</button>
        <a href="index.php">login</a>
    </form></center>
</body>
</html>
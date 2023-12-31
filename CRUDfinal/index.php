<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
	height: 350px;
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
   <h1 class="d-block p-2 text-bg-primary">Student List</h1>
    <center><div>
        <form action="logconfig.php" method="POST" class="form1">
           <h3 class="login">Log in</h3>
           <?php 
           if (isset($_GET['error'])){ ?>
           <p class="error"><?php echo $_GET['error'];
           ?></p>
           <?php } ?>
           <div class="form2">
            <label for="email">User name:</label>
           <input type="text" name="email" placeholder="Email">
           <label for="password">User password:</label>
           <input type="password" name="password" placeholder="User password">
           <button class="btn" type="submit">Log in</button>
           <a href="register.php">Register</a>
           </div>
        </form>
    </div ></center>
</body>
</html>

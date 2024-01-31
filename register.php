<?php
include 'config.php';
include 'header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];

    $sql = "INSERT INTO users (name, username, password, email) VALUES ('$name', '$username', '$password', '$email')";
    $conn->query($sql);
    header("Location: login.php");
    exit();
}
?>

</style>
<div class="py-5 bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow rounded-4">

                    <div class="p-5">
                        <h4 class="text-dark mb-3">Register to StudentListahan</h4>
                          <form method="post" action="">
                          Name: <input type="text" name="name" class="form-control" required><br>
                          Username: <input type="text" name="username" class="form-control" required><br>
                          Email: <input type="email" name="email" class="form-control" required><br>
                          Password: <input type="password" name="password" class="form-control" required><br>
                          
                          <input class="btn btn-primary" type="submit" value="Register">
                          <a href="login.php">Login</a>
                          </form>
                        
                    </div>
                </div>
            </div>
           
        </div> 
    </div>
</div>


<?php
include 'footer.php';

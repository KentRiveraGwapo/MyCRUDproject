<?php
session_start();
include 'config.php';
include 'header.php';
include 'function.php';

if(isset($_SESSION['login'])){
    ?><script>window.location.href='index.php'</script> <?php
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['login'] = true;
            redirect('index.php','Logged in Successfully!');
            exit();
        } else {
            redirect('login.php','Invalid Password!');
        }
    } else {
        redirect('login.php','User not Found!');
    }
}
?>
<div class="py-5 bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow rounded-4">

                    <?php alertMessages(); ?>

                    <div class="p-5">
                        <h4 class="text-dark mb-3">Log in to StudentListahan</h4>

                        <form action="" method="POST">
                            
                           <div class="mb-3">
                            <label for="">Enter Email</label>
                            <input type="email" name="email" class="form-control" required/>
                           </div> 
                           <div class="mb-3">
                            <label for="">Enter Pasword</label>
                            <input type="password" name="password" class="form-control" required/>
                           </div> 
                           <div class="my-3">
                            <button type="submit" name="loginBtn" class="btn btn-primary w-100 mt-2">Log in</button>
                           </div>
                        </form>
                    </div>
                </div>
            </div>
           
        </div> 
    </div>
</div>

<?php
include 'footer.php';

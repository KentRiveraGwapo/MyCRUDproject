<?php
require 'config.php';
if (isset($_POST['email']) && isset($_POST['password'])) {
    function validate($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;   
    }
      $email = validate($_POST['email']);
      $password = validate($_POST['password']);
 
      if (empty($email)) {
        header("location: index.php?error=Email is required!");
        exit();
      }else if(empty($password) ){
        header("location: index.php?error=Password is required!");
        exit();
      }else{
        $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
        $result = mysqli_query ($conn, $sql);
       
        if (mysqli_num_rows($result) === 1){
          $row = mysqli_fetch_assoc($result); 

          if ($row['email'] === $email && ($row['password'] === $password)){
            header("location: home.php");
          }else{
            header("location: index.php?error=Incorrect Password!");
            exit();
          }
        }else{
          header("location: index.php?error=Incorrect Password!");
          exit();
        }
      }

}else{
    header("location: index.php");
    exit();
}
?>
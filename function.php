<?php

//redirect from one page to another
function redirect($url, $status){
    $_SESSION['status'] = $status;
    header('location: '.$url);
    exit(0);
}
//show the messages or status
function alertMessages(){
    if(isset($_SESSION['status'])){
        $_SESSION['status'];
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
       <h6>'.$_SESSION['status'].'</6>
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>';
        unset($_SESSION['status']);

    }
}
?>
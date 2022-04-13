<?php
$page_title = "delete admin";

include "../config/constants.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "delete from users where id = $id";
    $result = mysqli_query($con , $sql);
    if ($result){
        $_SESSION['user'] = "<div class='success'>user deleted</div>";
        header("location:manage-user.php");
    }else{
        $_SESSION['user'] = "<div class='error'>user not deleted</div>";
        header("location:manage-user.php");
    }
}else{
    header("location:manage-user.php");
}
?>
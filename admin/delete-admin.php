<?php
$page_title = "delete admin";

include "../config/constants.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "delete from admins where id = $id";
    $result = mysqli_query($con , $sql);
    if ($result){
        $_SESSION['admin'] = "<div class='success'>admin deleted</div>";
        header("location:manage-admin.php");
    }else{
        $_SESSION['admin'] = "<div class='error'>admin not deleted</div>";
        header("location:manage-admin.php");
    }
}else{
    header("location:manage-admin.php");
}
?>
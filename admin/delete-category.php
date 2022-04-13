<?php
$page_title = "delete category";

include "../config/constants.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "delete from categories where id = $id";
    $result = mysqli_query($con , $sql);
    if ($result){
        $_SESSION['category'] = "<div class='success'>category deleted</div>";
        header("location:manage-category.php");
    }else{
        $_SESSION['category'] = "<div class='error'>category not deleted</div>";
        header("location:manage-category.php");
    }
}else{
    header("location:manage-category.php");
}
?>
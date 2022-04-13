<?php
$page_title = "delete admin";

include "../config/constants.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "delete from books where id = $id";
    $result = mysqli_query($con , $sql);
    if ($result){
        $_SESSION['book'] = "<div class='success'>book deleted</div>";
        header("location:manage-book.php");
    }else{
        $_SESSION['book'] = "<div class='error'>book not deleted</div>";
        header("location:manage-book.php");
    }
}else{
    header("location:manage-book.php");
}
?>
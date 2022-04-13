<?php
$page_title = "delete admin";

include "../config/constants.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "delete from authors where id = $id";
    $result = mysqli_query($con , $sql);
    if ($result){
        $_SESSION['author'] = "<div class='success'>author deleted</div>";
        header("location:manage-author.php");
    }else{
        $_SESSION['author'] = "<div class='error'>author not deleted</div>";
        header("location:manage-author.php");
    }
}else{
    header("location:manage-author.php");
}
?>
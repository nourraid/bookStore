<?php
include "../config/constants.php";
?>


<html>
<head>
    <title>Login - book store System</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>

<div class="login">
    <h1 class="text-center">Login</h1>
    <br><br>
    <?php
    if(isset($_SESSION['login_faild'])){
        echo $_SESSION['login_faild'];
        unset($_SESSION['login_faild']);
    }
    ?>
    <br><br>

    <!-- Login Form Starts HEre -->
    <form action="" method="POST" class="text-center">
        Username: <br>
        <input type="text" name="username" placeholder="Enter Username" required><br><br>

        Password: <br>
        <input type="password" name="password" placeholder="Enter Password" required><br><br>

        <input type="submit" name="submit" value="Login" class="btn-primary">
        <br><br>
    </form>
    <!-- Login Form Ends HEre -->

</div>

<?php
//if (isset($_POST['submit'])) {
//    $userName = $_POST['username'];
//    $password = $_POST['password'];
//    $sql = "select * from admins where userName = '$userName' and password = '$password'";
//    $result = mysqli_query($conn, $sql);
//    if ($result->num_rows > 0) {
//        $_SESSION['login'] = $userName;
//        $_SESSION['timestamp'] = time();
//        header("location:".SITEURL."admin/index.php");
//    }else{
//        $_SESSION['login'] = "<span style='color:red'> incorrect user ?!</span>";
//        header("location:".SITEURL."admin/partial/check_login.php");
//    }
//}

if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $password=md5($_POST['password']);
    $sql="select * from admins where name ='$username' and password='$password'";
    $res=mysqli_query($con,$sql);
    if($res && $res->num_rows>0){
        $_SESSION['login']=$username;
        header("location:manage-admin.php");
    }else{
        $_SESSION['login_faild'] ="username or password is incorrect";
    }

}
?>

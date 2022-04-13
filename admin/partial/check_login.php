<?php

if($_SESSION['login']){

}else{
    $_SESSION['login_faild']=" please sign in first";
    header("location:login.php");
}
//if (time() - $_SESSION['timestamp'] < 5) {
//
//    $_SESSION['login_faild'] = "session expired";
//    header("location:" . SITEURL . "admin/login.php");
//} else {
//    $_SESSION['timestamp'] = time();
//}
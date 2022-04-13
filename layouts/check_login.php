<?php
if ($_SESSION['login']){

}else{
    header("location:before_login.php");
}
?>
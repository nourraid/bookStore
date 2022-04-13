<?php
include "../config/constants.php";
include "check_login.php";
?>
<html>
<head>
    <title>Book Store Website - <?php echo $page_title; ?> </title>

    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
<!-- Menu Section Starts -->
<div class="menu text-center">
    <div class="wrapper">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="manage-admin.php">Admin</a></li>
            <li><a href="manage-user.php">User</a></li>
            <li><a href="manage-category.php">Category</a></li>
            <li><a href="manage-author.php">Author</a></li>
            <li><a href="manage-book.php">Book</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
</div>

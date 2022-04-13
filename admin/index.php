<?php
$page_title = "index";

include "partial/menu.php";

$sql1 = "select * from books";
$result1 = mysqli_query($con, $sql1);
$books_numbers = $result1->num_rows;


$sql2 = "select * from categories";
$result2 = mysqli_query($con, $sql2);
$categories_numbers = $result2->num_rows;


$sql3 = "select * from authors";
$result3 = mysqli_query($con, $sql3);
$witters_numbers = $result3->num_rows;


$sql4 = "select * from users";
$result4 = mysqli_query($con, $sql4);
$users_numbers = $result4->num_rows;
?>


<!-- Main Content Section Starts -->
<div class="main-content">
    <div class="wrapper">
        <h1>Dashboard</h1>
        <br><br>

        <br><br>

        <div class="col-4 text-center">



            <h1> <?php echo $categories_numbers?></h1>
            <br />

            Categories
        </div>

        <div class="col-4 text-center">


            <h1><?php echo $books_numbers ?></h1>
            <br />
            Books
        </div>

        <div class="col-4 text-center">



            <h1><?php echo $witters_numbers ?></h1>
            <br />
            Authors
        </div>

        <div class="col-4 text-center">



            <h1><?php echo $users_numbers ?></h1>
            <br />
            Users
        </div>

        <div class="clearfix"></div>

    </div>
</div>
<!-- Main Content Setion Ends -->


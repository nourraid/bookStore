<?php
include('config/constants.php');
include "check_login.php";
?>
<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>PlayBook <?php echo $page_title ; ?></title>
    <!-- custom-theme -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="Mastering Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"/>
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <!-- //custom-theme -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="css/JiSlider.css" rel="stylesheet">
    <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property=""/>

    <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>

    <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property=""/>
    <!-- font-awesome-icons -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- //font-awesome-icons -->
    <link href="//fonts.googleapis.com/css?family=Raleway:400,400i,500,500i,600,600i,700,700i,800" rel="stylesheet">
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic'
          rel='stylesheet' type='text/css'>
</head>

<body>
<!-- banner -->
<div class="main_section_agile">
    <div class="w3_agile_banner_top">
        <div class="agile_phone_mail">
            <ul class="agile_forms">
                <li><a class="active" href="logout.php"></i>Log Out</a></li>
                <li><a class="active" href="profile.php"></i><span class="fa fa-user"></span>welcome <?php echo $_SESSION['login'] ?> </a></li>
            </ul>
            <ul>
                <li><i class="fa fa-phone" aria-hidden="true"></i>+(970) 592 212 481 </li>
                <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:education@w3layouts.com">nrayd633@gmail.com</a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="agileits_w3layouts_banner_nav">
        <nav class="navbar navbar-default">
            <div class="navbar-header navbar-left">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <h1><a class="navbar-brand" href="index.php"><img src="images/logo.png" width="100" height="50"/></a></h1>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
                <nav class="menu--iris">
                    <ul class="nav navbar-nav menu__list">
                        <li class="menu__item menu__item--current"><a href="index.php" class="menu__link">Home</a></li>
                        <li class="menu__item"><a href="mail.php" class="menu__link">Mail Us</a></li>
                        <li class="menu__item"><a href="categories.php" class="menu__link">Categories</a></li>

                        <li class="dropdown menu__item" >
                            <a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown">Authors <b
                                        class="caret"></b></a>
                            <ul class="dropdown-menu agile_short_dropdown" style="width: 200px; height: 200px; overflow: auto">
                                <?php
                                $sql = "select * from authors";
                                $result = mysqli_query($con , $sql);
                                if ($result && $result->num_rows >0){
                                    while ($author = $result->fetch_assoc()){
                                        $author_name = $author['name'];
                                        $author_id = $author['id'];
                                         echo " <li><a href=\"book_author.php?id=$author_id\">$author_name</a></li>";
                                    }
                                }
                                ?>
                            </ul>
                        </li>


                        <li class="menu__item"><a href="books.php" class="menu__link">Books</a></li>
                    </ul>
                    <div class="w3_agileits_search">
                        <form action="book_search.php" method="post">
                            <input type="search" name="Search" placeholder="Search here..." required="">
                            <input type="submit" value=" ">
                        </form>
                    </div>
                </nav>
            </div>
        </nav>
    </div>
</div>
<!-- banner -->
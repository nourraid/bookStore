<?php
$page_title = "";
include('config/constants.php');
?>
<?php
if(isset($_POST['signin'])){
    $username=$_POST['username'];
    $password=md5($_POST['password']);
    $sqll="select * from users where userName ='$username' and password='$password'";
    $res=mysqli_query($con,$sqll);
    if($res && $res->num_rows>0){
        $_SESSION['login']=$username;
        header("location:index.php");
    }
}
?>

<?php
//if (isset($_POST['signup'])) {
//    $name = $_POST['name'];
//    $Address = $_POST['Address'];
//    $passwordd = md5($_POST['passwordd']);
//    $phoneNumber = $_POST['phoneNumber'];
//    $email = $_POST['email'];
//
//    if (!mysqli_connect_error()) {
//        echo "connected";
//        $sql = "insert into users set userName = '$name' , Address = '$Address' , password = '$passwordd' , phoneNumber = '$phoneNumber' ,  email='$email' ";
//        $result = mysqli_query($con, $sql);
//        if ($result) {
//            $_SESSION['users'] = "<div class='success'>register success</div>";
//            header("location:before_login.php");
//        }
//    } else {
//        $_SESSION['login_faild'] = "<div class='error'>register fail</div>";
//    }
//}

if (isset($_POST['signup'])) {
    $userName = $_POST['name'];
    $Address = $_POST['Address'];
    $password = md5($_POST['password']);
    $phoneNumber = $_POST['phoneNumber'];
    $email = $_POST['email'];

    if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != "") {
        $name = $_FILES['image']['name'];
        $temp = $_FILES['image']['tmp_name'];
        $ext = explode(".", $name);
        $ext = end($ext);
        $userImage = "images/users/" . $userName . "." . $ext;
        echo $userImage;
        move_uploaded_file($temp, $userImage);
    } else {
        $userImage = "../images/logo.png";
    }

        if (!mysqli_connect_error()) {
            echo "connected";
            $sql = "insert into users set userName = '$userName' , Address = '$Address' , password = '$password' , phoneNumber = '$phoneNumber' ,  email='$email' , userImage =  '$userImage'";
            $result = mysqli_query($con, $sql);
            if ($result) {
                $_SESSION['users'] = "<div class='success'>register success</div>";
                header("location:before_login.php");
            }
        } else {
            $_SESSION['login_faild'] = "<div class='error'>register fail</div>";
            header("location:before_login.php");
        }


}

//include "partial/footer.php";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Mastering an Education Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>
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
                <li><a class="active" href="#" data-toggle="modal" data-target="#myModal2"><i class="fa fa-sign-in" aria-hidden="true"></i>Sign In</a></li>
                <li><a href="#" data-toggle="modal" data-target="#myModal3"><i class="fa fa-pencil-square-o"
                                                                               aria-hidden="true"></i> Sign Up</a></li>
            </ul>
            <ul>
                <li><i class="fa fa-phone" aria-hidden="true"></i>+(970) 592 212 481 </li>
                <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:education@w3layouts.com">nrayd633@gmail.com</a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
    </div>

</div>
<!-- banner -->
<div class="banner-silder">
    <div id="JiSlider" class="jislider">
        <ul>
            <li>
                <div class="w3layouts-banner-top">

                    <div class="container">
                        <div class="agileits-banner-info">
                            <span>Education</span>
                            <h3>For the Creatives</h3>
                            <p>You can learn anything</p>

                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="w3layouts-banner-top w3layouts-banner-top1">
                    <div class="container">
                        <div class="agileits-banner-info">
                            <span>Free</span>
                            <h3>Premium Courses</h3>
                            <p>You only have to know one thing</p>

                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="w3layouts-banner-top w3layouts-banner-top2">
                    <div class="container">
                        <div class="agileits-banner-info">
                            <span>Education</span>
                            <h3>For the Creatives</h3>
                            <p>You can learn anything.</p>

                        </div>

                    </div>
                </div>
            </li>

        </ul>
    </div>
</div>
<!-- //banner -->
<!-- Modal1 -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>

                <div class="signin-form profile">
                    <h3 class="agileinfo_sign">Sign In</h3>

                    <div class="login-form">
                        <form action="#" method="post">
                            <br>
                            <br>
                            <input type="text" name="username" placeholder="user name" required="">
                            <input type="password" name="password" placeholder="Password" required="">
                            <div class="tp">
                                <input type="submit" value="Sign In" name="signin">
                            </div>
                        </form>
                    </div>
                    <div class="login-social-grids">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-rss"></i></a></li>
                        </ul>
                    </div>
                    <p><a href="#" data-toggle="modal" data-target="#myModal3"> Don't have an account?</a></p>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- //Modal1 -->
<!-- Modal2 -->
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>

                <div class="signin-form profile">
                    <h3 class="agileinfo_sign">Sign Up</h3>
                    <div class="login-form">
                        <form action="#" method="post" enctype="multipart/form-data">
                            <br>
                            <br>
                            <input type="text" name="name" placeholder="Username" required="">
                            <input type="text" name="Address" placeholder="Address" required="">
                            <input type="password" name="password" placeholder="Password" required="">
                            <input type="text" name="phoneNumber" placeholder="phone Number" required="">
                            <input type="email" name="email" placeholder="Email" required="">
                            <input type="file" name="image" required="">
                            <input type="submit" value="Sign Up" name="signup">
                        </form>
                    </div>
                    <p><a href="#"> By clicking register, I agree to your terms</a></p>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- //Modal2 -->

<!-- bootstrap-pop-up -->
<div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <section>
                <div class="modal-body">
                    <h5>Mastering</h5>
                    <img src="images/2.jpg" alt=" " class="img-responsive"/>
                    <p>Ut enim ad minima veniam, quis nostrum
                        exercitationem ullam corporis suscipit laboriosam,
                        nisi ut aliquid ex ea commodi consequatur? Quis autem
                        vel eum iure reprehenderit qui in ea voluptate velit
                        e.
                        <i>" Quis autem vel eum iure reprehenderit qui in ea voluptate velit
                            esse quam nihil molestiae consequatur.</i></p>
                </div>
            </section>
        </div>
    </div>
</div>
<!-- //bootstrap-pop-up -->

<!-- start-smoth-scrolling -->
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- //js -->
<script src="js/JiSlider.js"></script>
<script>
    $(window).load(function () {
        $('#JiSlider').JiSlider({color: '#fff', start: 3, reverse: true}).addClass('ff')
    })
</script>
<script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36251023-1']);
    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    _gaq.push(['_trackPageview']);

    (function () {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
    })();

</script>
<!-- stats -->
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery.countup.js"></script>
<script>
    $('.counter').countUp();
</script>
<!-- //stats -->
<!-- //footer -->
<!-- flexSlider -->
<script defer src="js/jquery.flexslider.js"></script>
<script type="text/javascript">
    $(window).load(function () {
        $('.flexslider').flexslider({
            animation: "slide",
            start: function (slider) {
                $('body').removeClass('loading');
            }
        });
    });
</script>
<!-- //flexSlider -->


<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $(".scroll").click(function (event) {
            event.preventDefault();
            $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
        });
    });
</script>
<!-- start-smoth-scrolling -->
<!-- for bootstrap working -->
<script src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->
<!-- here stars scrolling icon -->
<script type="text/javascript">
    $(document).ready(function () {
        /*
            var defaults = {
            containerID: 'toTop', // fading element id
            containerHoverID: 'toTopHover', // fading element hover id
            scrollSpeed: 1200,
            easingType: 'linear'
            };
        */

        $().UItoTop({easingType: 'easeOutQuart'});

    });
</script>

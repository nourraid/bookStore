<?php
include "config/constants.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "select * from users where id = '$id'";
    $result = mysqli_query($con, $sql);
    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $id = $user['id'];
        $fullName = $user['userName'];
        $Address = $user['Address'];
        $phoneNumber = $user['phoneNumber'];
        $email = $user['email'];
        $userImage = $user['userImage'];
    }
}

?>

<?php
if (isset($_POST['edite'])) {
    $new_userName = $_POST['full_name'];
    $new_Address = $_POST['address'];
    $new_phoneNumber = $_POST['phoneNumber'];
    $new_email = $_POST['email'];

    if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != "") {
        $name = $_FILES['image']['name'];
        $temp = $_FILES['image']['tmp_name'];
        $ext = explode(".", $name);
        $ext = end($ext);
        $new_image ="images/users/" . $new_userName . "." . $ext;
        move_uploaded_file($temp, $new_image);
    } else {
        $new_image = $userImage;
    }

    $sql = "update users set userName = '$new_userName' , Address = '$new_Address' , phoneNumber = '$new_phoneNumber' , email = '$new_email' , userImage = '$new_image'  where id = '$id'";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $_SESSION['user'] = "<div class='success'>user updated </div>";
        $_SESSION['login'] = $new_userName;
        header("location:profile.php");
    } else {
        $_SESSION['user'] = "<div class='error'>user not updated</div>";
    }
}
?>
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

    <style>

        body {
            margin-top: 20px;
            background: #f5f5f5;
        }

        /**
         * Panels
         */
        /*** General styles ***/
        .panel {
            box-shadow: none;
        }

        .panel-heading {
            border-bottom: 0;
        }

        .panel-title {
            font-size: 17px;
        }

        .panel-title > small {
            font-size: .75em;
            color: #999999;
        }

        .panel-body *:first-child {
            margin-top: 0;
        }

        .panel-footer {
            border-top: 0;
        }

        .panel-default > .panel-heading {
            color: #333333;
            background-color: transparent;
            border-color: rgba(0, 0, 0, 0.07);
        }

        form label {
            color: #999999;
            font-weight: 400;
        }

        .form-horizontal .form-group {
            margin-left: -15px;
            margin-right: -15px;
        }

        @media (min-width: 768px) {
            .form-horizontal .control-label {
                text-align: right;
                margin-bottom: 0;
                padding-top: 7px;
            }
        }

        .profile__contact-info-icon {
            float: left;
            font-size: 18px;
            color: #999999;
        }

        .profile__contact-info-body {
            overflow: hidden;
            padding-left: 20px;
            color: #999999;
        }

        .profile-avatar {
            min-height: 168px;
            min-width: 191px;
            width: 200px;
            position: relative;
            margin: 0px auto;
            margin-top: 196px;
            border: 4px solid #f3f3f3;
        }
    </style>

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <div class="container bootstrap snippets bootdeys">
        <div class="row">
            <div class="col-xs-12 col-sm-9">
                <form class="form-horizontal" action=" " method="post" enctype="multipart/form-data">
                    <div class="panel panel-default">
                        <div class="panel-body text-center">
                            <img src="<?php echo $userImage ?>" class="img-circle profile-avatar" alt="User avatar">
                        </div>
                        <div class="panel-body text-center">
                            <input type="file" name="image" style=" margin: auto;">
                        </div>
                    </div>

                    <div class="panel panel-default">

                        <div class="panel-heading">
                            <h4 class="panel-title">User info</h4>
                        </div>

                        <div class="panel-body">

                            <div class="form-group">
                                <label class="col-sm-2 control-label">user name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="full_name" class="form-control"
                                           value="<?php echo $fullName ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Address</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="address"
                                           value="<?php echo $Address ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">phoneNumber</label>
                                <div class="col-sm-10">
                                    <input type="text" name="phoneNumber" class="form-control"
                                           value="<?php echo $phoneNumber ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" name="email" class="form-control" value="<?php echo $email ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-10 col-sm-offset-2">
                                    <a href="profile.php"> <i class="fa fa-arrow-circle-left"></i> back to profile </a>
                                   <input type="submit" name="edite" class="btn btn-primary" value="Edit">
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
$page_title = "mail us";

include "layouts/menu.php";
?>
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
                            <input type="text" name="email" placeholder="E-mail" required="">
                            <input type="password" name="password" placeholder="Password" required="">
                            <div class="tp">
                                <input type="submit" value="Sign In">
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
                        <form action="#" method="post">
                            <input type="text" name="name" placeholder="Username" required="">
                            <input type="email" name="email" placeholder="Email" required="">
                            <input type="password" name="password" placeholder="Password" required="">
                            <input type="password" name="password" placeholder="Confirm Password" required="">
                            <input type="submit" value="Sign Up">
                        </form>
                    </div>
                    <p><a href="#"> By clicking register, I agree to your terms</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //Modal2 -->

<!-- mail -->
<div class="contact">
    <div class="container">
        <h3 class="w3l_header w3_agileits_header1">Get in <span>Touch</span></h3>
        <div class="w3layouts_mail_grid">
            <div class="col-md-4 w3layouts_mail_grid_left">
                <div class="w3layouts_mail_grid_left1 hvr-radial-out">
                    <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                </div>
                <div class="w3layouts_mail_grid_left2">
                    <h3>Mail Us</h3>
                    <a href="mailto:info@example.com">nrayd633@gmail.com</a>
                </div>
            </div>
            <div class="col-md-4 w3layouts_mail_grid_left">
                <div class="w3layouts_mail_grid_left1 hvr-radial-out">
                    <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                </div>
                <div class="w3layouts_mail_grid_left2">
                    <h3>Address</h3>
                    <p>Gaza , palestine</p>
                </div>
            </div>
            <div class="col-md-4 w3layouts_mail_grid_left">
                <div class="w3layouts_mail_grid_left1 hvr-radial-out">
                    <span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>
                </div>
                <div class="w3layouts_mail_grid_left2">
                    <h3>Phone</h3>
                    <p>+(970) 592 212 481</p>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>


<div class="w3_agile_map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d50416.99204102258!2d144.93732617279937!3d-37.83543431360044!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1saustralia+real+estate!5e0!3m2!1sen!2sin!4v1470915593791"
            style="border:0"></iframe>
</div>

<?php
include "layouts/footer.php"
?>
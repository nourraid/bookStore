<?php
$page_title = "categories";

include "layouts/menu.php";
?>


<!--header end here-->
<!--banner end here-->
<!--gallery start here-->
<div class="team-w3ls-row">
    <h3 class="w3l_header w3_agileits_header"><span>all Categories</span></h3>

    <div class="agileits_banner_bottom_grids">

        <?php
        $sql = "select * from categories";
        $result = mysqli_query($con, $sql);
        if ($result && $result->num_rows > 0) {
            while ($category = $result->fetch_assoc()) {
                $id = $category['id'];
                $title = $category['title'];
                $imgName = $category['imageName'];
                echo "
                     <div class=\"col-md-3 col-sm-6 team-grids\">
                         <a href='book_cat.php?id=$id'>
                            <img src=\"$imgName\" height='450'/>
                            <div class=\"img-caption w3-agileits\" >
                            <div class=\"img-agileinfo-text\">
                                    <h4>$title</h4>
                                </div>
                            </div>     
                        </a>
               
                    </div>
               ";
            }
        }
        ?>


        <div class="clearfix"></div>
    </div>
</div>
<!--gallery end here-->
<link rel="stylesheet" type="text/css" href="css/magnific-popup.css">
<script type="text/javascript" src="js/nivo-lightbox.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#nivo-lightbox-demo a').nivoLightbox({effect: 'fade'});
    });
</script>


<?php
include "layouts/footer.php"
?>

<!--gallery end here-->
<!--footer start here-->

<?php
$page_title = "Books";

include "layouts/menu.php";

?>

<div class="container">
    <h3 class="w3l_header w3_agileits_header"><span>all books</span></h3>
    <div class="agileits_banner_bottom_grids">

        <?php
        $sql = "select * from books";
        $result = mysqli_query($con, $sql);
        if ($result && $result->num_rows > 0) {
            while ($book = $result->fetch_assoc()) {
                $id = $book['id'];
                $titlee = $book['title'];
                $imgName = $book['imageName'];
                echo "
        <div class=\"col-md-3 agileits_banner_bottom_grid\">
            <a href='book_info.php?id=$id'>
               <div class=\"hovereffect w3ls_banner_bottom_grid\">
                <img src=\"$imgName\" class=\"img-responsive\" style='width: 100%'/>
    
                <div class=\"overlay\">
                    <h4>$titlee</h4>                   
                    <p>learn more</p>
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


<?php

include "layouts/footer.php"
?>

<?php
$page_title = "book search";

include "layouts/menu.php";
if (isset($_POST['Search'])) {
    $search_term = $_POST['Search'];
} else {
    header("location:categories.php");
}
?>

<div class="container">
    <h3 class="w3l_header w3_agileits_header">Search result : <span> <?php echo $search_term ?></span></h3>
    <div class="agileits_banner_bottom_grids">

        <?php
        $sql = "select * from books where title like '%$search_term%' or description like '%$search_term%'";
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
        }else{
            echo "there is no result ?!";
        }
        ?>


        <div class="clearfix"></div>
    </div>

</div>


<?php
include "layouts/footer.php"
?>

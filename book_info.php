<?php
$page_title = "book information";

include "layouts/menu.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "select * from books where id = $id";
    $result = mysqli_query($con, $sql);
    $book = $result->fetch_assoc();

    $id = $book['id'];
    $title = $book['title'];
    $description = $book['description'];
    $author_id = $book['author_id'];
    $publisher = $book['publisher'];
    $edition = $book['edition'];
    $language = $book['language'];
    $page_number = $book['page_number'];
    $available = $book['available'];
    $price = $book['price'];
    $category_id = $book['category_id'];
    $imageName = $book['imageName'];
    $bookPDF = $book['bookPDF'];

    $cat_sql = "select title from categories where id = $category_id";
    $cat_result = mysqli_query($con, $cat_sql);
    $cat = $cat_result->fetch_assoc();
    $cat_title = $cat['title'];

    $author_sql = "select name from authors where id = $author_id";
    $author_result = mysqli_query($con, $author_sql);
    $author = $author_result->fetch_assoc();
    $author_name = $author['name'];

}
?>
<?php
if (isset($_POST['t'])){
    $userName = $_SESSION['login'];
    $s="select id from users where  userName ='$userName'";
    $r = mysqli_query($con , $s);
    $user = $r->fetch_assoc();
    $user_id =$user['id'];
    $_SESSION['user_id']=$user_id ;

    $concat = $id.$user_id;
    $ss = "SELECT book_id , user_id FROM favorite";
    $rr = mysqli_query($con , $ss);

    $match = true ;
    while ($t = $rr->fetch_assoc()){
        $book_id1 = $t['book_id'];
        $user_id1 = $t['user_id'];
        $concat1 = $book_id1.$user_id1;
        if ($concat==$concat1){
            $match = false ;
        }}


    if ($match){
        $user_id =$user['id'];
        $fav_sql = "insert into favorite set book_id='$id' , user_id = '$user_id'";
        $fav_result = mysqli_query($con , $fav_sql);
        if ($result){
            echo "<script type='text/javascript'>alert('book added');</script>";
        }
    }else{
        echo "<script type='text/javascript'>alert('book favorit alredy');</script>";
    }

}
?>
<div class="colorlib-shop">
    <div class="container">
        <div class="row row-pb-lg">
            <div class="col-md-10 col-md-offset-1">
                <div class="product-detail-wrap">
                    <div class="row">
                        <div class="col-md-5 col-sm-12 col-xs-12">
                            <div class="product-entry">
                                <div class="product-img">
                                    <img src="<?php echo $imageName ?>" style="width: 100%">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-12 col-xs-12">


                            <div class="desc">

                                <p class="book_info_text price title_book">Title: <?php echo "  " . $title ?></p>

                                <p class="price"> From Category: <span class="book_info_text"><?php echo "  " . $cat_title ?></span>  </p>
                                <p class="price">Written By: <span class="book_info_text"><?php echo "  " . $author_name ?></span></p>
                                <p class="price">Price: <span class="book_info_text"><?php echo "  $" . $price ?></span></p>

                                <p class="price">Publisher: <span class="book_info_text"><?php echo "  " . $publisher ?></span></p>

                                <p class="price">Edition: <span class="book_info_text"><?php echo "  " . $edition ?></span></p>

                                <p class="price">Language:<span class="book_info_text"> <?php echo "  " . $language ?></span></p>

                                <p class="price">Page_number: <span class="book_info_text"><?php echo "  " . $page_number ?></span></p>

                                <p class="price">Available: <span class="book_info_text"><?php echo "  " . $available ?></span></p>
                                <p class="book_info_text">Description: <?php echo "  ".$description ?>

                                <?php
                                $bookPDF =  substr($bookPDF , 3);
                                echo $bookPDF ;
                                if ($price == 0){
                                    echo "
                                           <p><a href=\"$bookPDF\" class=\"btn btn-primary btn-addtocart\" target='_blank'><i class=\"icon-shopping-cart\"></i>Press To Download Book</a></p>
                                ";
                                }else{
                                    echo "<p class=\"price\">Book not free we are sorry try another books :(</p>";
                                }
                                ?>

                                <form action='' method='post'>
                                    <button name="t">add to favorite<i class="fa fa-heart" style='color: red'></i></button>
                                </form>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include "layouts/footer.php"
?>

<?php
$page_title = "update book";
include "partial/menu.php";
?>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "select * from books where id = '$id'";
    $result = mysqli_query($con, $sql);
    if ($result && $result->num_rows > 0) {
        $book = $result->fetch_assoc();
        $id = $book['id'];
        $title = $book['title'];
        $description = $book['description'];
        $publisher = $book['publisher'];
        $edition = $book['edition'];
        $language = $book['language'];
        $page_number = $book['page_number'];
        $available = $book['available'];
        $price = $book['price'];
        $category_id = $book['category_id'];
        $author_id = $book['author_id'];
        $imageName = $book['imageName'];
        $bookPDF = $book['bookPDF'];

    } else {
        header("location:manage-book.php");
    }
} else {
    header("location:manage-book.php");
}
?>

<?php
if (isset($_POST['submit'])) {

    $new_edition = $_POST['edition'];
    $new_language = $_POST['language'];
    $new_page_number = $_POST['page_number'];
    $new_available = $_POST['available'];
    $new_price = $_POST['price'];
    $new_category_id = $_POST['categoryId'];
    $new_author_id = $_POST['authorId'];

    if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != "") {
        $name = $_FILES['image']['name'];
        $temp = $_FILES['image']['tmp_name'];
        $ext = explode(".", $name);
        $ext = end($ext);
        $new_image = "../images/book/" . $title . "." . $ext;
        echo $new_image;
        move_uploaded_file($temp, $new_image);
    } else {
        $new_image = $imageName;
    }


    if (isset($_FILES['bookPDF'])) {
        if ($_FILES['bookPDF']['type'] == "application/pdf") {
            $source_file = $_FILES['bookPDF']['tmp_name'];
            $pdf_ext = explode(".", $source_file);
            $new_dest_file = "../bookPDF/" . $title . ".pdf";
            move_uploaded_file($source_file, $new_dest_file)
            or die ("Error!!");
            if ($_FILES['bookPDF']['error'] == 0) {
                print "Pdf file uploaded successfully!";
                print "<b><u>Details : </u></b><br/>";
                print "File Name : " . $_FILES['bookPDF']['name'] . "<br.>" . "<br/>";
                print "File Size : " . $_FILES['bookPDF']['size'] . " bytes" . "<br/>";
                print "File location : " . $new_dest_file . "<br/>";
            }

        } else {
            $new_dest_file = $bookPDF;
        }
    }

    $sqll = "update books set  edition ='$new_edition' , language = '$new_language' , available = '$new_available' , price = '$new_price' , imageName ='$new_image' ,
    bookPDF = '$new_dest_file' ,  category_id = '$new_category_id' , author_id = '$new_author_id' , page_number = '$new_page_number' where id = $id";
    $resultt = mysqli_query($con , $sqll);
    if ($resultt){
        $_SESSION['book']="<div class='success'>book updated </div>";
        header("location:manage-book.php");
    }else{
        $_SESSION['book']="<div class='error'>book not updated</div>";
    }
}
?>
    <div class="main-content">
        <div class="wrapper">
            <h1>Add book</h1>

            <br><br>


            <form action="" method="POST" enctype="multipart/form-data">

                <table class="tbl-30">
                    <tr>
                        <td>Title:</td>
                        <td><b><?php echo $title ?> </b></td>
                    </tr>


                    <tr>
                        <td>description:</td>
                        <td><b><?php echo $description ?> </b></td>
                    </tr>

                    <tr>
                        <td>publisher:</td>
                        <td><b><?php echo $publisher ?> </b></td>

                    </tr>

                    <tr>
                        <td>edition:</td>
                        <td>
                            <input type="number" name="edition" value="<?php echo $edition ?>" required>
                        </td>
                    </tr>


                    <tr>
                        <td>language:</td>
                        <td>
                            <input type="text" name="language" value="<?php echo $language ?>" required>
                        </td>
                    </tr>


                    <tr>
                        <td>page number:</td>
                        <td>
                            <input type="number" name="page_number" value="<?php echo $page_number ?>" required>
                        </td>
                    </tr>

                    <tr>
                        <td>available:</td>
                        <td>
                            <input type="number" name="available" value="<?php echo $available ?>" required>
                        </td>
                    </tr>

                    <tr>
                        <td>price:</td>
                        <td>
                            <input type="number" name="price" value="<?php echo $price ?>" required>
                        </td>
                    </tr>

                    <tr>
                        <td>currant image:</td>
                        <td>
                            <img src="<?php echo $imageName ?>" width="100" height="120">
                        </td>
                    </tr>

                    <tr>
                        <td>new image:</td>
                        <td>
                            <input type="file" name="image">
                        </td>
                    </tr>


                    <tr>
                        <td>currant PDF:</td>
                        <td>
                            <a href="<?php echo $bookPDF ?>" target="_blank"> <?php echo $title . ".pdf" ?> </a>
                        </td>
                    </tr>

                    <tr>
                        <td>new PDF:</td>
                        <td>
                            <input type="file" name="bookPDF">
                        </td>
                    </tr>

                    <tr>
                        <td>Category:</td>
                        <td>
                            <select name="categoryId" required>
                                <?php
                                $cat_sql = "select id , title from categories";
                                $cat_result = mysqli_query($con, $cat_sql);
                                if ($cat_result && $cat_result->num_rows > 0) {
                                    while ($category = $cat_result->fetch_assoc()) {
                                        $cat_id = $category['id'];
                                        $cat_title = $category['title'];
                                        if ($category_id == $cat_id) {
                                            echo "<option value='$cat_id' selected> $cat_title </option>";
                                        } else {
                                            echo "<option value='$cat_id' > $cat_title </option>";
                                        }
                                    }
                                } else {
                                    echo "<option value='0' > no category found </option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Author:</td>
                        <td>
                            <select name="authorId" required>
                                <?php
                                $author_sql = "select id , name from authors";
                                $author_result = mysqli_query($con, $author_sql);
                                if ($author_result && $author_result->num_rows > 0) {
                                    while ($author = $author_result->fetch_assoc()) {
                                        $auth_id = $author['id'];
                                        $author_name = $author['name'];
                                        if ($auth_id == $author_id) {
                                            echo "<option value='$auth_id' selected> $author_name </option>";
                                        } else {
                                            echo "<option value='$auth_id' > $author_name </option>";
                                        }
                                    }
                                } else {
                                    echo "<option value='0'> no author found </option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>


                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="update book" class="btn-secondary">
                        </td>
                    </tr>

                </table>

            </form>


        </div>
    </div>
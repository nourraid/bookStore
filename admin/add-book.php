<?php
$page_title = "add book";
include "partial/menu.php";
?>

<?php
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $publisher = $_POST['publisher'];
    $edition = $_POST['edition'];
    $language = $_POST['language'];
    $page_number = $_POST['page_number'];
    $available = $_POST['available'];
    $price = $_POST['price'];
    $category_id = $_POST['categoryId'];
    $author_id = $_POST['authorId'];

    if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != "") {
        $name = $_FILES['image']['name'];
        $temp = $_FILES['image']['tmp_name'];
        $ext = explode(".", $name);
        $ext = end($ext);
        $image = "../images/book/" . $title . "." . $ext;
        echo $image;
        move_uploaded_file($temp, $image);
    } else {
        echo "nooooooooo";
        $image = "../images/logo.png";
    }


    if (isset($_FILES['bookPDF'])) {
        if ($_FILES['bookPDF']['type'] == "application/pdf") {
            $source_file = $_FILES['bookPDF']['tmp_name'];
            $pdf_ext = explode(".", $source_file);
            $dest_file = "../bookPDF/" .$title.".pdf";
            move_uploaded_file($source_file, $dest_file)
            or die ("Error!!");
            if ($_FILES['bookPDF']['error'] == 0) {
                print "Pdf file uploaded successfully!";
                print "<b><u>Details : </u></b><br/>";
                print "File Name : " . $_FILES['bookPDF']['name'] . "<br.>" . "<br/>";
                print "File Size : " . $_FILES['bookPDF']['size'] . " bytes" . "<br/>";
                print "File location : " .$dest_file . "<br/>";
            }

        } else {
            if ($_FILES['bookPDF']['type'] != "application/pdf") {
                print "Error occured while uploading file : " . $_FILES['bookPDF']['name'] . "<br/>";
                print "Invalid  file extension, should be pdf !!" . "<br/>";
                print "Error Code : " . $_FILES['bookPDF']['error'] . "<br/>";
                $dest_file = "../bookPDF/logo.pdf";
            }
        }
    }


    if (!mysqli_connect_error()) {
        $sql = "insert into books set title = '$title' , description = '$description' , publisher = '$publisher' ,
        edition =$edition , language = '$language' , available = $available , price = $price , imageName ='$image' ,
         bookPDF = '$dest_file' ,  category_id = $category_id , author_id = $author_id , page_number = $page_number";
        $result = mysqli_query($con, $sql);
        if ($result) {
            $_SESSION['book'] = "<div class='success'>book added</div>";
            header("location:manage-book.php");
        }
    } else {
        $_SESSION['book'] = "<div class='error'>book not added</div>";
        header("location:manage-book.php");
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
                    <td>
                        <input type="text" name="title" placeholder="Enter book title" required>
                    </td>
                </tr>


                <tr>
                    <td>description:</td>
                    <td>
                            <textarea name="description" cols="30" rows="5"
                                      placeholder="Description of the book." required></textarea>
                    </td>
                </tr>

                <tr>
                    <td>publisher:</td>
                    <td>
                        <input type="text" name="publisher" placeholder="Enter book publisher" required>
                    </td>
                </tr>

                <tr>
                    <td>edition:</td>
                    <td>
                        <input type="number" name="edition" placeholder="Enter book edition" required>
                    </td>
                </tr>


                <tr>
                    <td>language:</td>
                    <td>
                        <input type="text" name="language" placeholder="Enter book language" required>
                    </td>
                </tr>


                <tr>
                    <td>page number:</td>
                    <td>
                        <input type="number" name="page_number" placeholder="Enter book available" required>
                    </td>
                </tr>

                <tr>
                    <td>available:</td>
                    <td>
                        <input type="number" name="available" placeholder="Enter book available" required>
                    </td>
                </tr>

                <tr>
                    <td>price:</td>
                    <td>
                        <input type="number" name="price" placeholder="Enter book price" required>
                    </td>
                </tr>


                <tr>
                    <td>book image:</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>book PDF:</td>
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
                                    echo "<option value='$cat_id'> $cat_title </option>";
                                }
                            } else {
                                echo "<option value='0'> no category found </option>";
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
                                    $author_id = $author['id'];
                                    $author_name = $author['name'];
                                    echo "<option value='$author_id'> $author_name </option>";
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
                        <input type="submit" name="submit" value="Add book" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>


    </div>
</div>
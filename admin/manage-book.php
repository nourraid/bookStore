<?php
$page_title = "manage book";
include "partial/menu.php";
?>

<!-- Main Content Section Starts -->
<div class="main-content">
    <div class="wrapper">
        <h1>Manage Book</h1>

        <br/>
        <?php
        if (isset($_SESSION['book'])) {
            echo $_SESSION['book'];
            unset($_SESSION['book']);
        }
        ?>

        <br><br><br>

        <!-- Button to Add Admin -->
        <a href="add-book.php" class="btn-primary">Add Book</a>

        <br/><br/><br/>
        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Title</th>
                <th>description</th>
                <th>publisher</th>
                <th>edition</th>
                <th>language</th>
                <th>page number</th>
                <th>available</th>
                <th>price</th>
                <th>imageName</th>
                <th>bookPDF</th>
                <th>Category</th>
                <th>Author</th>
                <th>Action</th>
            </tr>


            <?php
            $sql = "select * from books";
            $result = mysqli_query($con, $sql);
            $counter = 0;
            if ($result && $result->num_rows > 0) {
                while ($book = $result->fetch_assoc()) {
                    $counter++;
                    echo "<tr>";

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

                    echo "<td> $counter </td>";
                    echo "<td> $title </td>";
                    echo "<td> $description </td>";
                    echo "<td> $publisher </td>";
                    echo "<td> $edition </td>";
                    echo "<td> $language </td>";
                    echo "<td> $page_number </td>";
                    echo "<td> $available </td>";
                    echo "<td> $price </td>";
                    echo "<td><img src=\"$imageName\" width=\"100\" height=\"100\"></td>";
                    echo "<td><a href='$bookPDF' target='_blank' >$title.pdf</a></td>";
                    echo "<td> $cat_title </td>";
                    echo "<td> $author_name </td>";
                    echo "
                           <td>
                        <a href=\"update-book.php?id=$id\" class=\"btn-secondary\"> update </a> &nbsp;
                        <a href=\"delete-book.php?id=$id\" class=\"btn-danger\"> delete </a>&nbsp;
                    </td>
                        ";
                    echo "</tr>";
                }
            } else {
                echo "
            <tr>
                <td>
                    <p> no Book yet ! </p>
                </td>
            </tr>
               ";
            }
            ?>


        </table>

    </div>
</div>
<!-- Main Content Setion Ends -->
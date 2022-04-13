<?php
$page_title = "manage category";

include "partial/menu.php";

?>
<script>
    function pop_up(){

    }
</script>
    <div class="main-content">
        <div class="wrapper">
            <h1>Manage Category</h1>

            <br>

            <?php
            if (isset($_SESSION['category'])) {
                echo $_SESSION['category'];
                unset($_SESSION['category']);
            }
            ?>
            <br><br><br>

            <!-- Button to Add Admin -->
            <a href="add-category.php" class="btn-primary">Add Category</a>


            <table class="tbl-full">
                <tr>
                    <th>S.N.</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>


                <?php
                $sql = "select * from categories";
                $result = mysqli_query($con, $sql);
                if ($result && $result->num_rows > 0) {
                    $counter = 0;
                    while ($category = $result->fetch_assoc()) {
                        $counter++;
                        echo "<tr>";

                        $id = $category['id'];
                        $title = $category['title'];
                        $imageName = $category['imageName'];

                        echo "<td> $counter </td>";
                        echo "<td> $title </td>";
                        echo "<td>
                                <img src=\"$imageName\" width=\"80\" height=\"60\">
                                 </td>";
                        echo "
                           <td>
                            <a href=\"update-category.php?id=$id\" class=\"btn-secondary\">Update Category</a>
                    <a href=\"delete-category.php?id=$id\" class=\"btn-danger\" onclick='pop_up()'>Delete Category</a>
                    </td>
                        ";
                        echo "</tr>";
                    }
                } else {
                    echo "
            <tr>
                <td>
                    <p> no category yet ! </p>
                </td>
            </tr>
               ";
                }
                ?>

            </table>
        </div>

    </div>
<?php
?>
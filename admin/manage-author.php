<?php
$page_title = "manage author";
include "partial/menu.php";
?>

<!-- Main Content Section Starts -->
<div class="main-content">
    <div class="wrapper">
        <h1>Manage Author</h1>

        <br/>
        <?php
        if (isset($_SESSION['author'])) {
            echo $_SESSION['author'];
            unset($_SESSION['author']);
        }
        ?>

        <br><br><br>

        <!-- Button to Add Admin -->
        <a href="add-author.php" class="btn-primary">Add Author</a>

        <br/><br/><br/>
        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Name</th>
                <th>Birth Date</th>
                <th>Address</th>
                <th>email</th>
                <th>Action</th>
            </tr>


            <?php
            $sql = "select * from authors";
            $result = mysqli_query($con, $sql);
            if ($result && $result->num_rows > 0) {
                while ($author = $result->fetch_assoc()) {
                    echo "<tr>";

                    $id = $author['id'];
                    $name = $author['name'];
                    $Address = $author['Address'];
                    $BD = $author['BD'];
                    $email = $author['email'];

                    echo "<td> $id </td>";
                    echo "<td> $name </td>";
                    echo "<td> $BD </td>";
                    echo "<td> $Address </td>";
                    echo "<td> $email </td>";
                    echo "
                           <td>
                        <a href=\"update-author.php?id=$id\" class=\"btn-secondary\"> update </a> &nbsp;
                        <a href=\"delete-author.php?id=$id\" class=\"btn-danger\"> delete </a>&nbsp;
                    </td>
                        ";
                    echo "</tr>";
                }
            } else {
                echo "
            <tr>
                <td>
                    <p> no Author yet ! </p>
                </td>
            </tr>
               ";
            }
            ?>


        </table>

    </div>
</div>
<!-- Main Content Setion Ends -->
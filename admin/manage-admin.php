<?php
$page_title = "manage admin";
include "partial/menu.php";
?>

    <!-- Main Content Section Starts -->
    <div class="main-content">
        <div class="wrapper">
            <h1>Manage Admin</h1>

            <br/>
            <?php
            if (isset($_SESSION['admin'])) {
                echo $_SESSION['admin'];
                unset($_SESSION['admin']);
            }
            ?>
            <br><br><br>

            <!-- Button to Add Admin -->
            <a href="add-admin.php" class="btn-primary">Add Admin</a>

            <br/><br/><br/>

            <table class="tbl-full">
                <tr>
                    <th>S.N.</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>


                <?php
                $sql = "select * from admins";
                $result = mysqli_query($con, $sql);
                if ($result && $result->num_rows > 0) {
                    while ($admin = $result->fetch_assoc()) {
                        echo "<tr>";

                        $id = $admin['id'];
                        $fullName = $admin['name'];

                        echo "<td> $id </td>";
                        echo "<td> $fullName </td>";
                        echo "
                           <td>
                        <a href=\"update-admin.php?id=$id\" class=\"btn-secondary\"> update </a> &nbsp;
                        <a href=\"delete-admin.php?id=$id\" class=\"btn-danger\"> delete </a>&nbsp;
                        <a href=\"update-password.php?id=$id\" class=\"btn-primary\"> change password </a>&nbsp;
                    </td>
                        ";
                        echo "</tr>";
                    }
                } else {
                    echo "
            <tr>
                <td>
                    <p> no admin yet ! </p>
                </td>
            </tr>
               ";
                }
                ?>


            </table>

        </div>
    </div>
    <!-- Main Content Setion Ends -->
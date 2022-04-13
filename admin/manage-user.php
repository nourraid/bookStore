<?php
$page_title = "manage user";
include "partial/menu.php";
?>

<!-- Main Content Section Starts -->
<div class="main-content">
    <div class="wrapper">
        <h1>Manage User</h1>

        <br/>
        <?php
        if (isset($_SESSION['user'])) {
            echo $_SESSION['user'];
            unset($_SESSION['user']);
        }
        ?>

        <br/><br/><br/>

        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Name</th>
                <th>Address</th>
                <th>phoneNumber</th>
                <th>email</th>
                <th>image</th>
                <th>Action</th>
            </tr>


            <?php
            $sql = "select * from users";
            $result = mysqli_query($con, $sql);
            if ($result && $result->num_rows > 0) {
                $counter = 0;
                while ($user = $result->fetch_assoc()) {
                    $counter++;
                    echo "<tr>";

                    $id = $user['id'];
                    $fullName = $user['userName'];
                    $Address = $user['Address'];
                    $phoneNumber = $user['phoneNumber'];
                    $email = $user['email'];
                    $userImage = $user['userImage'];
                    echo "<td> $counter </td>";
                    echo "<td> $fullName </td>";
                    echo "<td> $Address </td>";
                    echo "<td> $phoneNumber </td>";
                    echo "<td> $email </td>";
                    echo "<td> <img src=\"../$userImage\" width=\"80\" height=\"60\"> </td>";
                    echo "
                           <td>
                        <a href=\"delete-user.php?id=$id\" class=\"btn-danger\"> delete </a>&nbsp;
                    </td>
                        ";
                    echo "</tr>";
                }
            } else {
                echo "
            <tr>
                <td>
                    <p> no user yet ! </p>
                </td>
            </tr>
               ";
            }
            ?>


        </table>

    </div>
</div>
<!-- Main Content Setion Ends -->
<?php
$page_title = "add admin";
include "partial/menu.php";

?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>

        <br><br>


        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td>
                        <input type="text" name="full_name" placeholder="Enter Your Name" required>
                    </td>
                </tr>

                <tr>
                    <td>Password:</td>
                    <td>
                        <input type="password" name="password" placeholder="Your Password" required>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>


    </div>
</div>
<?php
if (isset($_POST['submit'])) {
    $name = $_POST['full_name'];
    $password = md5($_POST['password']);

    if (!mysqli_connect_error()) {
        echo "connected";
        $sql = "insert into admins set name = '$name' , password = '$password'";
        $result = mysqli_query($con, $sql);
        if ($result) {
            $_SESSION['admin'] = "<div class='success'>admins added</div>";
            header("location:manage-admin.php");
        }
    } else {
        $_SESSION['admin'] = "<div class='error'>admins not added</div>";
        header("location:manage-admin.php");
    }
}

//include "partial/footer.php";
?>


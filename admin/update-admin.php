<?php
$page_title = "update admin";

include "partial/menu.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "select * from admins where id = '$id'";
    $result = mysqli_query($con, $sql);
    if ($result && $result->num_rows > 0) {
        $admin = $result->fetch_assoc();
        $fullName = $admin['name'];
    } else {
        header("location:manage-admin.php");
    }
} else {
    header("location:manage-admin.php");
}
?>
    <div class="main-content">
        <div class="wrapper">
            <h1>Update Admin</h1>

            <br><br>


            <form action="" method="POST">

                <table class="tbl-30">
                    <tr>
                        <td>Full Name:</td>
                        <td>
                            <input type="text" name="full_name" value="<?php echo $fullName ?>" required>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="id" value="">
                            <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
                        </td>
                    </tr>

                </table>

            </form>


        </div>
    </div>
<?php
if (isset($_POST['submit'])) {
    $name = $_POST['full_name'];
    $sql = "update admins set name = '$name' where id = '$id'";
    $result = mysqli_query($con , $sql);
    if ($result){
        $_SESSION['admin']="<div class='success'>admin updated </div>";
        header("location:manage-admin.php");
    }else{
        $_SESSION['admin']="<div class='error'>admin not updated</div>";
    }
}
?>
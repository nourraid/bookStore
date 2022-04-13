<?php
$page_title = "add author";
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
                    <td>Birth Date:</td>
                    <td>
                        <input type="Date" name="BD" placeholder="Enter Your Name" required>
                    </td>
                </tr>

                <tr>
                    <td>Address:</td>
                    <td>
                        <input type="text" name="Address" placeholder="Enter Your address" required>
                    </td>
                </tr>

                <tr>
                    <td>email:</td>
                    <td>
                        <input type="email" name="email" placeholder="Enter Your email" required>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add author" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>


    </div>
</div>
<?php
if (isset($_POST['submit'])) {
    $name = $_POST['full_name'];
    $BD = $_POST['BD'];
    $Address = $_POST['Address'];
    $email = $_POST['email'];

    if (!mysqli_connect_error()) {
        echo "connected";
        $sql = "insert into authors set name = '$name' , BD = '$BD' , Address = '$Address' ,  email='$email' ";
        $result = mysqli_query($con, $sql);
        if ($result) {
            $_SESSION['author'] = "<div class='success'>author added</div>";
            header("location:manage-author.php");
        }
    } else {
        $_SESSION['author'] = "<div class='error'>author not added</div>";
        header("location:manage-author.php");
    }
}

//include "partial/footer.php";
?>


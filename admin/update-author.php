<?php
$page_title = "update author";

include "partial/menu.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "select * from authors where id = '$id'";
    $result = mysqli_query($con, $sql);
    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $id = $user['id'];
        $name = $user['name'];
        $Address = $user['Address'];
        $BD = $user['BD'];
        $email = $user['email'];

    } else {
        header("location:manage-author.php");
    }
} else {
    header("location:manage-author.php");
}
?>
    <div class="main-content">
        <div class="wrapper">
            <h1>Update Author</h1>

            <br><br>


            <form action="" method="POST">

                <table class="tbl-30">
                    <tr>
                        <td>Full Name:</td>
                        <td>
                            <input type="text" name="full_name" placeholder="Enter Your Name" value="<?php echo $name ?>" required>
                        </td>
                    </tr>


                    <tr>
                        <td>Birth Date:</td>
                        <td>
                            <input type="Date" name="BD" placeholder="Enter Your Name" value="<?php echo $BD ?>" required>
                        </td>
                    </tr>

                    <tr>
                        <td>Address:</td>
                        <td>
                            <input type="text" name="Address" placeholder="Enter Your address" value="<?php echo $Address ?>" required>
                        </td>
                    </tr>

                    <tr>
                        <td>email:</td>
                        <td>
                            <input type="email" name="email" placeholder="Enter Your email" value="<?php echo $email ?>" required>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="id" value="">
                            <input type="submit" name="submit" value="Update User" class="btn-secondary">
                        </td>
                    </tr>

                </table>

            </form>


        </div>
    </div>
<?php
if (isset($_POST['submit'])) {
    $name = $_POST['full_name'];
    $Address = $_POST['Address'];
    $BD = $_POST['BD'];
    $email = $_POST['email'];

    $sql = "update authors set name = '$name' , Address = '$Address' , BD = '$BD' , email = '$email'  where id = '$id'";
    $result = mysqli_query($con , $sql);
    if ($result){
        $_SESSION['author']="<div class='success'>author updated </div>";
        header("location:manage-author.php");
    }else{
        $_SESSION['author']="<div class='error'>author not updated</div>";
    }
}
?>
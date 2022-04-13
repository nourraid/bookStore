<?php
$page_title = "update category";

include "partial/menu.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "select * from categories where id = '$id'";
    $result = mysqli_query($con, $sql);
    if ($result && $result->num_rows > 0) {
        $category = $result->fetch_assoc();
        $id = $category['id'];
        $title = $category['title'];
        $imageName = $category['imageName'];

    } else {
        header("location:manage-category.php");
    }
} else {
    header("location:manage-category.php");
}
?>
    <style>
        * {
            height: ;
        }
    </style>
    <div class="main-content">
        <div class="wrapper">
            <h1>Update Category</h1>

            <br><br>


            <form action="" method="POST" enctype="multipart/form-data">

                <table class="tbl-30">
                    <tr>
                        <td>Title:</td>
                        <td>
                            <input type="text" name="title" value="<?php echo $title ?>">
                        </td>
                    </tr>

                    <tr>
                        <td>Current Image:</td>
                        <td>
                            <img src="<?php echo $imageName ?>" widthwidth="150" height="200">
                        </td>
                    </tr>

                    <tr>
                        <td>New Image:</td>
                        <td>
                            <input type="file" name="image">
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <input type="hidden" name="current_image" value="">
                            <input type="hidden" name="id" value="">
                            <input type="submit" name="submit" value="Update Category" class="btn-secondary">
                        </td>
                    </tr>

                </table>

            </form>


        </div>
    </div>

<?php
if (isset($_POST['submit'])) {
    $new_title = $_POST['title'];

    if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != ""){
        $name =  $_FILES['image']['name'];
        $temp = $_FILES['image']['tmp_name'];
        $ext = explode(".",$name);
        $ext = end($ext);
        $new_image = "../images/category/".$title.".".$ext;
        echo $new_image;
        move_uploaded_file($temp , $new_image);
    }else{
        $new_image = $imageName;
    }
    $sql = "update categories set title = '$new_title' , imageName = '$new_image' where id = '$id'";
    $result = mysqli_query($con , $sql);
    if ($result){
        $_SESSION['category']="<div class='success'>category updated </div>";
        header("location:manage-category.php");
    }else{
        $_SESSION['category']="<div class='error'>category not updated</div>";
        header("location:manage-category.php");
    }
}
?>
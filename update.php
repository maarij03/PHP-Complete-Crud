<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<?php

include 'connection.php';

$id = $_GET['id'];
$query = "SELECT * FROM `crud_images` where `id` = '$id'";
$run = mysqli_query($conn, $query);
$total_Rows = mysqli_num_rows($run);
$getdata;
if ($total_Rows == 1) {
    $getdata = mysqli_fetch_assoc($run);
} else {
    echo "<script>alert('No Record Found')</script>";
}
?>

<body class="bg-dark text-light">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 mt-5 border shadow">
                <div class="row">
                    <div class="col-md-8">
                        <h3 class="display-6 mt-2 mb-4"><u> Update Your Info</u></h3>
                    </div>
                    <div class="col-md-4 mt-3">
                        <a class="btn btn-light" href="view.php">
                            Back
                        </a>
                    </div>
                </div>
                <form method="post" enctype="multipart/form-data">
                    <label>Name</label>
                    <input class="form-control" type="text" name="name" placeholder="Enter Your Name" required value=<?php echo $getdata['name']; ?>>
                    <br>
                    <label>Select Gender</label>
                    <select name="gender" required class="form-control">
                        <?php

                        if ($getdata['gender'] == "male") {
                            echo "<option value=''>Select Gender</option>
                            <option value='male' selected>Male</option>
                            <option value='female'>Female</option>";
                        } else {
                            echo "<option value=''>Select Gender</option>
                            <option value='male'>Male</option>
                            <option value='female'selected>Female</option>";
                        }

                        ?>
                    </select>
                    <br>
                    <label>age</label>
                    <input type="number" class="form-control" min="3" max="25" name="age" placeholder="Enter Your Age" required value=<?php echo $getdata['age']; ?>>
                    <br>
                    <label>Class</label>
                    <input type="number" class="form-control" name="class" placeholder="Enter Your Class" required value=<?php echo $getdata['class']; ?>>
                    <br>
                    <?php

                    if ($getdata['image_path'] != "" || $getdata['image_path'] != null) {
                        echo "<img src= '$getdata[image_path]' width = '200' height = '150' class='mb-2' >";
                    }
                    ?>
                    <input type="hidden" name="oldimage" value="<?php echo $getdata['image_path'];?>">
                    <br>
                    <label>Choose Image</label>
                    <input type="file" name="image" class="form-control">
                    <br>
                    <input type="submit" value="Submit" name="btnsubmit" class="btn btn-success">
                    <br>
                    <br>
                </form>
                <?php

                if (isset($_POST['btnsubmit'])) {
                    $name = $_POST['name'];
                    $gender = $_POST['gender'];
                    $age = $_POST['age'];
                    $class = $_POST['class'];
                    $oldimage = $_POST['oldimage'];
                    $image_name = $_FILES['image']['name'];
                    $tmp_name = $_FILES['image']['tmp_name'];
                    $image_type = $_FILES['image']['type'];
                    $image_size = $_FILES['image']['size'];
                    $folder = "student_images/";
                    if (is_uploaded_file($_FILES['image']['tmp_name'])) {

                        if (
                            strtolower($image_type) == 'image/jpg' || strtolower($image_type) == 'image/jpeg' ||
                            strtolower($image_type) == 'image/png'
                        ) {
                            if ($image_size <= 1000000) {
                                $folder .=  $image_name;
                                if (strpos($folder, ' ') !== false) {
                                    $folder = str_replace(' ', '', $folder);
                                }
                                $query = mysqli_query($conn, "UPDATE `crud_images` SET `name` = '$name' ,`gender` = '$gender',`age` = $age,`class` = '$class',`image_path` = '$folder' where `id` = '$id'");
                                if ($query) {
                                    unlink($oldimage);
                                    move_uploaded_file($tmp_name, $folder);
                                    echo "<script>
                                    alert('Data Updated successfully');
                                    window.location.href = 'view.php';
                                 </script>";

                                    echo "<br>";
                                } else {
                                    echo "<script>alert('Data updation Failed')</script>";
                                }
                            } else {
                                echo "<script>alert('Image should be less than 1mb ')</script>";
                            }
                        } else {
                            echo "<script>
                                    alert('Format not supported');
                                    window.location.href = 'update.php';
                                 </script>";
                        }
                    } else {
                        $query = mysqli_query($conn, "UPDATE `crud_images` SET `name` = '$name' ,`gender` = '$gender',`age` = $age,`class` = '$class' where `id` = '$id'");
                        if ($query) {
                           
                            move_uploaded_file($tmp_name, $folder);
                            echo "<script>
                            alert('Data Updated successfully');
                            window.location.href = 'view.php';
                         </script>";

                            echo "<br>";
                        } else {
                            echo "<script>alert('Data updation Failed')</script>";
                        }
                    }
                }

                ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>
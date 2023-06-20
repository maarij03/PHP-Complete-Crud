<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Record</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <?php
    include 'connection.php';

    $id = $_GET['id'];
    $query = "SELECT * FROM `crud_images` where `id` = '$id'";
    $run = mysqli_query($conn, $query);
    $getdata = mysqli_fetch_assoc($run);
    ?>
    <div class="container">
        <div class="card text-center shadow">
            <div class="card-header display-6">
                Are You Sure You Want To Delete This <a href="view.php" class="btn btn-warning">Back</a>
            </div>
            <div class="card-body">
                <h5 class="card-title">Student Name</h5>
                <p class="card-text"><?php echo $getdata['name']; ?></p>
                <h5 class="card-title">Student Gender</h5>
                <p class="card-text"><?php echo $getdata['gender']; ?></p>
                <h5 class="card-title">Student Age</h5>
                <p class="card-text"><?php echo $getdata['age']; ?></p>
                <h5 class="card-title">Student Class</h5>
                <p class="card-text"><?php echo $getdata['class']; ?></p>
                <h5 class="card-title">Student Image</h5>
                <?php

                if ($getdata['image_path'] != "" || $getdata['image_path'] != null) {
                    echo "<img src= '$getdata[image_path]' width = '200' height = '150' class='rounded mx-auto d-block'>";
                }

                ?>
                <form action="" method="post">
                    <button type="submit" class="btn btn-danger mt-3" name="deletebtn">Delete</button>
                </form>
                <?php

                if (isset($_POST['deletebtn'])) {
                    $query = mysqli_query($conn, "DELETE FROM `crud_images` where `id` = '$id'");

                    if ($query) {

                        if (unlink($getdata['image_path'])) {
                            echo "<script>
                            alert('Data Deleted successfully');
                            window.location.href = 'view.php';
                         </script>";
                        } else {
                            echo "<script>alert('Data Deletion Failed')</script>";
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>


</body>

</html>
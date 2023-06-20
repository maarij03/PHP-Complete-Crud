<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <?php

    include 'connection.php';

    $query = "SELECT * FROM `crud_images`";
    $run = mysqli_query($conn, $query);
    $total_Rows = mysqli_num_rows($run);

    if ($total_Rows > 0) {

    ?>

        <div class="container mt-5">
            <table class="table table-bordered table-hover ">
                <tr>
                    <th colspan="7" class="text-center">
                      <h3 class="display-6">Student Details <a href="images_crud.php" class="btn btn-warning">Back to form</a></h3> 
                    </th>
                </tr>
                <tr>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Age</th>
                    <th>Class</th>
                    <th>Image</th>
                    <th colspan="2">Operations</th>
                </tr>
                <tbody>
        

        <?php

        while ($row = mysqli_fetch_assoc($run)) {
            echo " <tr><td>$row[name]</td><td>$row[gender]</td><td>$row[age]</td><td>$row[class]</td><td><img src = $row[image_path] width='200' height='150'></td><td><a href = 'update.php?id=$row[id]' class='btn btn-outline-primary'>Edit</a></td><td><a href = 'delete.php?id=$row[id]' class='btn btn-outline-danger'>Delete</a></td></tr>";
        }


        ?>
        </tbody>
         </div>
        </table>

    <?php
    } else {
    }

    ?>
</body>

</html>
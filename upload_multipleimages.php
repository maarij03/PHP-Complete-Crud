<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>

<body>
    <?php
    $conn = mysqli_connect("localhost", "root", "", "images_Crud");
    if (!$conn) {
        echo "connection failed";
    }
    ?>
    <form method="post" enctype="multipart/form-data">
        <label>Upload Image</label>
        <input type="file" name="uploadimage[]" multiple required>
        <br>
        <br>
        <input type="submit" value="Upload" name="uploabtn">
    </form>

    <?php

    function getdata()
    {
        global $conn;
        $query = "SELECT * FROM `images`";
        $run = mysqli_query($conn, $query);
        $total_Rows = mysqli_num_rows($run);
        if ($total_Rows > 0) {
            echo "<table id='customers'> <tr><th>Id</th> <th>Image</th></tr>";
            while ($data = mysqli_fetch_assoc($run)) {
                echo "
                       <tr>
                       <th>$data[img_id]</th>
                       <th><img src = $data[image_path]></th>
                       </tr>
                      ";
            }
            echo "</table>";
        }
    }

    if (isset($_POST['uploabtn'])) {
        // print_r($_FILES['uploadimage']);
        for($i = 0; $i < count($_FILES['uploadimage']['name']); $i++){ 
             
            $image_name = $_FILES['uploadimage']['name'][$i];
            $temp_name = $_FILES['uploadimage']['tmp_name'][$i];
            $image_type = $_FILES['uploadimage']['type'][$i];
            $image_size = $_FILES['uploadimage']['size'][$i];
            $folder = 'images/';
    
            if (strtolower($image_type) == 'image/jpg' || strtolower($image_type) == 'image/jpeg' || strtolower($image_type) == 'image/png') {
                if ($image_size <= 1000000) {
                    $folder = 'images/' . $image_name;
                    if (strpos($folder, ' ') !== false) {
                        // Remove whitespaces from the file name
                        $folder = str_replace(' ', '', $folder);
                    }
                    $query = mysqli_query($conn, "INSERT INTO `images` (`img_name`,`img_size`,`image_path`) values ('$image_name','$image_size','$folder')");
    
                    if ($query) {
    
                        move_uploaded_file($temp_name, $folder);
                       
                        echo "<br>";
                        // echo "<img src= '$folder' width='100' height='100'>";
                        
                    } else {
                        echo "<script>alert('File Upload Failed')</script>";
                    }
                } else {
                    echo "<script>alert('Image should be less than 1mb ')</script>";
                }
            } else {
                echo "<script>alert('Format not supported')</script>";
            }

        }
        echo "<script>alert('File Uploaded Successfully ')</script>";
        getdata();
    }
    ?>
</body>

</html>
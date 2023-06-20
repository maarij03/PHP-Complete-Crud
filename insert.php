<?php

include 'connection.php';

if(isset($_POST['btnsubmit'])){
  
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $class = $_POST['class'];
    $image_name = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $image_type = $_FILES['image']['type'];
    $image_size = $_FILES['image']['size'];
    $folder = "student_images/";
    if(strtolower($image_type) == 'image/jpg' || strtolower($image_type) == 'image/jpeg' || 
    strtolower($image_type) == 'image/png'){
        if ($image_size <= 1000000) {
            $folder .=  $image_name;
            if (strpos($folder, ' ') !== false) {
                $folder = str_replace(' ', '', $folder);
            }
            $query = mysqli_query($conn, "INSERT INTO `crud_images` (`name`,`gender`,`age`,`class`,`image_path`) values ('$name','$gender','$age','$class','$folder')");
            if ($query) {

                move_uploaded_file($tmp_name, $folder);
                echo "<script>
                alert('File uploaded successfully');
                window.location.href = 'view.php';
             </script>";

                echo "<br>";
            } else {
                echo "<script>alert('File Upload Failed')</script>";
            }
        }
        else {
            echo "<script>alert('Image should be less than 1mb ')</script>";
        }
    }
    else {
        echo "<script>
                alert('Format not supported');
                window.location.href = 'images_crud.php';
             </script>";
    }
}

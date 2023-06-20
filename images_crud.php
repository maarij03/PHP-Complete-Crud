<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body class="bg-dark text-light">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 mt-5 border shadow">
                <div class="row">
                    <div class="col-md-10">
                        <h3 class="display-6 mt-2 mb-4" ><u> Get Admission In Our Institute</u></h3>
                    </div>
                    <div class="col-md-2 mt-3">
                        <a class="btn btn-primary" href="view.php">
                         View Records
                        </a>
                    </div>
                </div>
                <form action="insert.php" method="post" enctype="multipart/form-data">
                    <input class="form-control" type="text" name="name" placeholder="Enter Your Name" required >
                    <br>
                    <select name="gender" required class="form-control">
                        <option value="">Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                    <br>
                    <input type="number" class="form-control" min="3" max="25" name="age" placeholder="Enter Your Age" required >
                    <br>
                    <input type="number" class="form-control" name="class" placeholder="Enter Your Class" required >
                    <br>
                    <input type="file" name="image" class="form-control" required>
                    <br>
                    <input type="submit" value="Submit" name="btnsubmit" class="btn btn-success">
                    <br>
                    <br>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>
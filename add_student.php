<?php
$massage = '';
if (isset($_POST['btn'])) {
    require_once 'student.php';
    $student = new Student();
    $massage = $student->saveStudentInfo($_POST);
    //->$student->saveStudentInfo($data)
}
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="css/bootstrap.min.css">

        <title>Home</title>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="add_student.php">Add Student <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="view_student.php">View Student</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>

        <div>&nbsp;</div>
        <div class="container">
            <div id="row">

                <div class="col-lg-12">

                    <h3 class="text-center text-success"> <?php echo $massage; ?></h3>
                    <hr/>
                    <div class="well">
                        <form action="" method="post" class="form-horizontal">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Student Name</label>
                                <input type="text" class="form-control" name="student_name" placeholder="Student Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Phone Number</label>
                                <input type="number" class="form-control" name="phone_number" placeholder="Phone Number">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" name="email_address" placeholder="Enter email">

                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Address</label>
                                <textarea type="text" name="address" class="form-control"></textarea>


                            </div>

                            <button type="submit" name="btn" class="btn btn-info btn-block">Save Student Info</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>






        <script src="js/squrey-3.3.1.min.js"></script>
        <script src="js/bootstrap.min.js" ></script>
    </body>
</html>

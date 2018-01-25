<?php
$massage = '';
$student_id = $_GET['id'];
require_once 'student.php';
$student = new Student();
$query_result = $student->select_student_info_by_id($student_id);
$student_info = mysqli_fetch_assoc($query_result);

if (isset($_POST['btn'])) {
    
    $massage = $student->updateStudentInfo($_POST);
}
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="css/bootstrap.min.css">

        <title>Student Edit</title>
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
                                <input type="hidden" class="form-control" name="student_id" value="<?php echo $student_info['student_id']; ?>">
                                <input type="text" class="form-control" name="student_name" value="<?php echo $student_info['student_name']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Phone Number</label>
                                <input type="number" class="form-control" name="phone_number" value="<?php echo $student_info['phone_number']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" name="email_address" value="<?php echo $student_info['email_address']; ?>">

                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Address</label>
                                <textarea type="text" name="address" class="form-control"><?php echo $student_info['address']; ?></textarea>


                            </div>

                            <button type="submit" name="btn" class="btn btn-danger btn-block">Update Student Info</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>






        <script src="js/squrey-3.3.1.min.js"></script>
        <script src="js/bootstrap.min.js" ></script>
    </body>
</html>
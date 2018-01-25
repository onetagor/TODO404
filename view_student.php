<?php
session_start();
$massage = '';
require_once 'student.php';
$student = new Student();

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $massage = $student->deleteStudentInfo($id);
}


if (isset($_SESSION['massage'])) {
    $massage = $_SESSION['massage'];
    unset($_SESSION['massage']);
}
$query_result = $student->select_all_student_info();
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="css/bootstrap.min.css">

        <title>Student View</title>


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
                    <h3 class="text-center text-success"> <?php echo $massage; ?> </h3>
                    <hr/>
                    <div class="well">
                        <table class="table table-bordered table-hover">
                            <tr>
                                <th>Sl No</th>
                                <th>Student Name</th>
                                <th>Phone Number</th>
                                <th>E-mail ID</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>

                            <?php
                            $serial = 1;
                            while ($student_info = mysqli_fetch_assoc($query_result)) {
                                $std_id = $student_info['student_id'];
                                $sl = $serial;
                                $serial ++;
                                ?>
                                <tr>
                                    <td><?php echo $sl; ?></td>
                                    <td contenteditable="true"><?php echo $student_info['student_name']; ?></td>
                                    <td contenteditable="true"><?php echo $student_info['phone_number']; ?></td>
                                    <td contenteditable="true"><?php echo $student_info['email_address']; ?></td>
                                    <td contenteditable="true"><?php echo $student_info['address']; ?></td>
                                    <td>

                                        <a href="student_edit.php?id=<?php echo $std_id; ?>" class="btn btn-success" title="Edit">Edit</a>

                                        <a href="?delete=<?php echo $std_id; ?>" class="btn btn-danger" title="Delete" onclick="return confirm("Are You Sure To Delete This !");">Delete</a>


                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </table>
                    </div>

                </div>
            </div>
        </div>


        <script src="js/squrey-3.3.1.min.js"></script>
        <script src="js/bootstrap.min.js" ></script>
    </body>
</html>
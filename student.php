<?php

class Student {
    protected $db_connection;
    public function __construct() {
        $host = 'localhost';
        $user = 'root';
        $password = '';
        $db = 'dbstudent';


        $this->db_connection = mysqli_connect($host, $user, $password, $db);

        if (!$this->db_connection) {
            die('Connection Fail' . mysqli_error($this->db_connection));
        }
    }

    public function saveStudentInfo($data) {

        $sql = "INSERT INTO tbl_student (student_name, phone_number, email_address, address)" . "VALUES ('$data[student_name]','$data[phone_number]','$data[email_address]','$data[address]')";

        if (mysqli_query($this->db_connection, $sql)) {
            $massage = "Student Info Save Successfully";
            return $massage;
        } else {
            die('Query Problem' . mysqli_error($this->db_connection));
        }
    }

    public function select_all_student_info() {
        $sql= "SELECT * FROM tbl_student ORDER BY student_id DESC";
        if (mysqli_query($this->db_connection, $sql)){
            $query_result = mysqli_query($this->db_connection, $sql);
            return $query_result;
        }else{
            die('Qurey Problem' . mysqli_error($this->db_connection));
        }
    }
    public function select_student_info_by_id($student_id) {
        $sql= "SELECT * FROM tbl_student WHERE student_id = '$student_id'";
        if (mysqli_query($this->db_connection, $sql)){
            $query_result = mysqli_query($this->db_connection, $sql);
            return $query_result;
            echo'<pre>';
            print_r($query_result);
        }else{
            die('Qurey Problem' . mysqli_error($this->db_connection));
        }
    }
    public function updateStudentInfo($data) {

        $sql = "UPDATE tbl_student SET student_name = '$data[student_name]', phone_number = '$data[phone_number]', email_address = '$data[email_address]', address = '$data[address]' WHERE student_id ='$data[student_id]'";
 
        if (mysqli_query($this->db_connection, $sql)) {
            session_start();
            $_SESSION['massage']='Student Info Update Successfully';
            //$massage = "Student Info Update Successfully";
            header('Location:view_student.php');
        } else {
            die('Query Problem' . mysqli_error($this->db_connection));
        }
    }
    public function deleteStudentInfo($id){
        $sql = "DELETE FROM tbl_student WHERE student_id ='$id'";
        if (mysqli_query($this->db_connection, $sql)) {
            $massage = "Student Info Delete Successfully";
            return $massage;
        } else {
            die('Query Problem' . mysqli_error($this->db_connection));
        }
    }
}

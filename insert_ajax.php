<?php 

    include('db_config.php');

    $course_name = $_POST['course_name'];

    if($_POST) {
        $ins = "INSERT INTO courses (course_name) VALUES ('$course_name')";
       if(mysqli_query($con, $ins)) {
           echo "1";
       } else {
           echo "0";
       }


    }


?>
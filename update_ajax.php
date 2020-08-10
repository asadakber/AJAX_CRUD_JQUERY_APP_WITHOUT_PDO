<?php 

    include('db_config.php');

    if($_POST) {
        $update = "UPDATE courses SET course_name='".$_POST['course_name']."' WHERE id='".$_POST['ids']."'";
        if(mysqli_query($con, $update)) {
            echo "1";
        } else {
            echo "0";
        }
    }

?>
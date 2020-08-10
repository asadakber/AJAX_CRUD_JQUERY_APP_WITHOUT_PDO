<?php 

    include('db_config.php');

    if($_POST) {
        $del = "DELETE FROM courses WHERE id='".$_POST['ids']."'";
        if(mysqli_query($con, $del)) {
            echo "1";
        } else {
            echo "0";
        }
    }

?>
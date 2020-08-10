<?php 

    include('db_config.php');

    $sel = "SELECT * FROM courses ORDER BY id DESC";
    $qry = mysqli_query($con, $sel);
    echo "<div class='container'>";
    echo "<div class='row'>";
    echo "<div class='col-md-12'>";
    echo "<table class='table'>";
    echo "<tr>";
        echo "<th>Course Name</th>";
        echo "<th scope='col'>Edit</th>";
        echo "<th scope='col'>Delete</th>";
    echo "</tr>";
    while($res = mysqli_fetch_array($qry)) {
    ?>
    <tr>
       <td><?php echo $res['course_name'].','.'<br>'; ?></td> 
       <td><button class="btn btn-success edit" id="<?php echo $res['id'] ?>">EDIT</button></td>
       <input type="hidden" name="course_data" value="<?php echo $res['course_name'] ?>"  id="course_data_<?php echo $res['id'] ?>">
       <td><button class="btn btn-danger delete" id="<?php echo $res['id'] ?>">DELETE</button></td>
    </tr>

<?php
    }
?>
</table>
</div>
</div>
</div>
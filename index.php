<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
   
    <h3 id="result"></h3>
    <h2>CRUD OPERATION</h2>
    <table class="table">
        <tr>
            <td>Course Name</td>
            <td><input class="form-control" type="text" name="course_name" id="course_name">
            <input class="form-control" type="hidden" name="course_id" id="course_id">
            </td>
        </tr>

        <tr>
            <td><input class="btn btn-success" type="button" name="submit" id="submit" value="Add_course">
            <input class="btn btn-info" type="button" name="submit" id="btn_edit" value="Edit_course" style="display:none;">
            </td>
        </tr>
    </table>
    <div id="result_set"></div>

    <script src="./jquery/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>  
   
    <script>
        $(document).ready(function() {

            $('#result_set').load('course_list.php');

            $("#submit").click(function(event) {
                // if("#result").load('course_list.php');
                var course_name = $("#course_name").val();
                // alert(course_name);
                $.post(
                    "insert_ajax.php",
                    {
                        course_name: course_name,
                    },
                    
                    function(data) {
                        // alert(data);
                        if(data == '1') {
                            $('#result_set').load('course_list.php');
                            document.getElementById('result').innerHTML = "Insert Data Successfully";
                        } else {
                            document.getElementById('result').innerHTML = "There is something wrong please try later";
                        }
                      
                    }
                );
            });
            
            //$(".delete").click(function(event) {

                // alert('Hi');
                // var ids = $(this).attr('id');
                // alert(ids);
            $('body').on('click', '.delete', function () {
                var ids = $(this).attr('id');
                $.post(
                    "delete_ajax.php",
                    {
                        ids: ids,
                    },
                    
                    function(data) {
                        // alert(data);
                        if(data == '1') {
                            $('#result_set').load('course_list.php');
                            document.getElementById('result').innerHTML = "Data Successfully Deleted";
                        } else {
                            document.getElementById('result').innerHTML = "There is something wrong please try later";
                        }
                      
                    }
                );

            });

            $('body').on('click', '.edit', function () {
                var ids = $(this).attr('id');
                var course_data = $("#course_data_" + ids).val();
               // alert(course_data);
                document.getElementById('course_name').value = course_data;
                document.getElementById('course_id').value = ids;
                $('#btn_edit').fadeIn(1000);
                //$('#submit').fadeOut(1000);
                // alert(ids);
                // $.post(
                //     "delete_ajax.php",
                //     {
                //         ids: ids,
                //     },
                    
                //     function(data) {
                //         // alert(data);
                //         if(data == '1') {
                //             $('#result_set').load('course_list.php');
                //             document.getElementById('result').innerHTML = "Data Successfully Deleted";
                //         } else {
                //             document.getElementById('result').innerHTML = "There is something wrong please try later";
                //         }
                      
                //     }
                // );

            });

            $('body').on('click', '#btn_edit', function () {
                var ids = $("#course_id").val();
                var course_name = $("#course_name").val();
                //alert(ids);
                //$('#btn_edit').fadeIn(1000);
                //$('#submit').fadeOut(1000);
                // alert(ids);
                $.post(
                    "update_ajax.php",
                    {
                        ids: ids,
                        course_name: course_name,
                    },
                    
                    function(data) {
                        // alert(data);
                        if(data == '1') {
                            $('#result_set').load('course_list.php');
                            $('#btn_edit').fadeOut(1000);
                            document.getElementById('result').innerHTML = "Data Successfully Updated";
                        } else {
                            document.getElementById('result').innerHTML = "There is something wrong please try later";
                        }
                      
                    }
                );

            });
        });
    </script>
</body>
</html>
<?php include './../includes/session.php'; ?>
<?php include './../includes/navbar.php';

if($_SESSION['user'] == 'lessor'){
    header('location: ./../lessor/welcome.php');
}
?>


     <!DOCTYPE html> 
     <html lang="en"> 
     <head>
      <meta charset="UTF-8"> 
      <title>Welcome</title>
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css"> 
       <style type="text/css"> body{ font: 14px sans-serif; 
       text-align: center; }
</style>
</head> 
<body> 
<div class="page-header">


 <h1>ADMINISTRATION CENTER</h1> 
 
 </div> 

 <div class="bs-example w3layouts">
                        <?php
                        $conn = $pdo->open();

                        $stmt = $conn->prepare("SELECT * FROM admin ");
                        $stmt->execute();

                        if($stmt->rowCount() > 0) {
                            echo '
                                    <table class="table" id="orderTable">
                                        <tr>
                                            <th>No#</th>
                                            <th>First Nane</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                        </tr>
                                        ';
                            foreach ($stmt as $key=> $row) {

                                echo '<tr>
                                <td>' . $key . '</td>
                                <td>' . $row['first_name'] . '</td>
                                 <td>' . $row['last_name'] . '</td>
                                   <td>' . $row['email'] . '</td>
                                </tr>';
                            }
                            echo ' </table>';
                            $pdo->close();
                        }else{
                            echo '<tr>No Users Found ...</tr>' ;
                        }
                        ?>

 </div>
 
 </body> 
 </html>
    <script src="./../assets/js/main.js"></script>
<?php include ('./../admin/files/students_modal.php')?>

<script>
    $(function() {

        $(document).on('click', '.courses', function (e) {

            e.preventDefault();
            $('#courses').modal('show');
        });
        $(document).on('click', '.announcements', function (e) {

            e.preventDefault();
            $('#announcements').modal('show');
        });
        $(document).on('click', '.materials', function (e) {

            e.preventDefault();
            $('#materials').modal('show');
        });


        $(document).on('click', '.add-course', function (e) {

            e.preventDefault();
            $('.add-btn').attr('disabled',false);
            $('.input-course').html(
                '<div class="form-group">\n' +
                '                    <label for="photo" class="col-sm-3 control-label">Course Name</label>\n' +
                '\n' +
                '                    <div class="col-sm-9">\n' +
                '                      <input type="text" id="course_name" placeholder="Enter Course Name" name="course_name" onkeypress="return /[a-z]/i.test(event.key)" required>\n' +
                '                    </div>\n' +
                '                </div>'+


                '<div class="form-group">\n' +
                '                    <label for="photo" class="col-sm-3 control-label">Fee Amount</label>\n' +
                '\n' +
                '                    <div class="col-sm-9">\n' +
                '                      <input type="text" id="fee" placeholder="Enter Fee Amount In Integer Format" name="fee" onkeypress="return /[0-9]/i.test(event.key)" required>\n' +
                '                    </div>\n' +
                '                </div>'
            )
        });
    });


</script>

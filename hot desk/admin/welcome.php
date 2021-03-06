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

                        $stmt = $conn->prepare("SELECT * FROM space WHERE status_id=0 ");
                        $stmt->execute();

                        if($stmt->rowCount() > 0) {
                            echo '
                                    <table class="table" id="orderTable">
                                         <tr style="background: cornflowerblue;">
                                            <th>No #</th>
                                            <th>Type</th>
                                            <th>Location</th>
                                            <th>Rental Date (from)</th>
                                            <th>Rental Date (to)</th>
                                            <th>Action</th>
                                        </tr>
                                        ';
                            foreach ($stmt as $key=> $row) {

                                echo '<tr>
                                <td>' . $key . '</td>
                                <td>' . $row['type'] . '</td>
                                 <td>' . $row['address'] . '</td>
                                   <td>' . $row['from'] . '</td>
                                    <td>' . $row['to'] . '</td>
                                   
                                    <td><button class="btn-success approve" id="'.$row['id'].'"><i class="fa fa-check-circle-o"></i> Approve</button>
                                         <button class="btn-danger decline" id="'.$row['id'].'"><i class="fa fa-trash-o"></i> Decline</button>
                                     </td>
                                </tr>';
                            }
                            echo ' </table>';
                            $pdo->close();
                        }else{
                            echo '<tr>No Records Found ...</tr>' ;
                        }
                        ?>

 </div>
 
 </body> 
 </html>
<?php include('./../includes/scripts.php') ?>

<script>
    $(function() {

        $(document).on('click', '.approve', function (e) {

            e.preventDefault();
            var id = this.id;
            approve(id);
        });
        $(document).on('click', '.decline', function (e) {

            e.preventDefault();
            var id = this.id;
            decline(id);
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

    function approve(id){
        $.ajax({
            type: 'POST',
            url: './../admin/admin_handle.php',
            data: {approve:id},
            dataType: 'json',
            success: function(response){


            }
        });
    }

    function decline(id){

        $.ajax({
            type: 'POST',
            url: './../admin/admin_handle.php',
            data: {decline:id},
            dataType: 'json',
            success: function(response){

            }
        });
    }
</script>

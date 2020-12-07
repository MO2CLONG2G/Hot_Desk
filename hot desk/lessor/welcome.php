<?php include './../includes/session.php'; ?>
<?php include './../includes/navbar.php';

if($_SESSION['user'] == 'admin'){
    header('location: ./../admin/welcome.php');
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

    <?php
    if(isset($_SESSION['error'])){
        echo "
                        <div class='alert alert-warning beautiful' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                            </button>
                           ".$_SESSION['error']."</div>
                        ";
        unset($_SESSION['error']);
    }

    if(isset($_SESSION['success'])){
        echo "
                        <div class='alert alert-warning beautiful' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                            </button>
                           ".$_SESSION['success']."</div>
                        ";
        unset($_SESSION['success']);
    }
    ?>
</head>
<body>
<div class="page-header">

    <h1>Lessor Dashboard</h1>
    <button class="btn btn-secondary addnew">Book Space</button>
</div>


<div class="bs-example w3layouts" style="padding: 20px;color: white;" align="center">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <?php
        $conn = $pdo->open();

        $stmt = $conn->prepare("SELECT * FROM space,status WHERE space.status_id=status.status_id");
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            echo '
                                    <table class="table" id="orderTable">
                                         <tr style="background: orange;">
                                            <th>No #</th>
                                            <th>Type</th>
                                            <th>Location</th>
                                            <th>Rental Date (from)</th>
                                            <th>Rental Date (to)</th>
                                            <th>Status</th>
                                        </tr>
                                        ';
            foreach ($stmt as $key=> $row) {

                echo '<tr>
                                <td>' . $key . '</td>
                                <td>' . $row['type'] . '</td>
                                 <td>' . $row['address'] . '</td>
                                   <td>' . $row['from'] . '</td>
                                    <td>' . $row['to'] . '</td>
                                    <td>' . $row['name'] . '</td>   
                                </tr>';
            }
            echo ' </table>';
            $pdo->close();
        }else{
            echo '<tr>No Records Found ...</tr>' ;
        }
        ?>
    </div>

</div>

</body>
</html>

<?php include('./../lessor/files/lessor_modal.php') ?>
<?php include('./../includes/scripts.php') ?>

<script>
    $(function() {

        $(document).on('click', '.addnew', function (e) {

            e.preventDefault();
            $('#addnew').modal('show');
        });


        $(document).on('click', '.tools', function (e) {

            e.preventDefault();
            $('#tools').modal('show');
        });

        $(document).on('click', '.marks', function (e) {

            e.preventDefault();
            $('#marks').modal('show');
        });

        $(document).on('click', '.view', function (e) {

            e.preventDefault();
            $('#view').modal('show');
            var id = this.id;
            getRow(id);
        });
    });
    function getCourse(){
        $.ajax({
            type: 'POST',
            url: './../lessor/students_handle.php',
            data: {stud_id:1},
            dataType: 'json',
            success: function(response){

                $('.userid').val(response.id);
                $('#id').val(response.id);
                $('#edit_email').val(response.email);
                $('#edit_password').val(response.password);
                $('#edit_firstname').val(response.first_name);
                $('#edit_lastname').val(response.last_name);
                $('.fullname').val(response.first_name+' '+response.last_name);
            }
        });
    }

    function getRow(){

        $.ajax({
            type: 'POST',
            url: './../lessor/students_handle.php',
            data: {stud_id:1},
            dataType: 'json',
            success: function(response){

                $('#id').html(response.id);
                $('#email').html(response.email);
                $('#password').html(response.password);
                $('#firstname').html(response.first_name);
                $('#lastname').html(response.last_name);
                $('.fullname').html(response.first_name+' '+response.last_name);
            }
        });
    }
</script>
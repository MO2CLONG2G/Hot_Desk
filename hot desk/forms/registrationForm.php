<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Hot Desk for venues</title>
    <meta name="description" content="The system will allow the user to register online, then the information of the user will be validated. After registration the user will be allowed to login into the system. The user will then be allowed to choose the kind of truck she/he want to use, then the user will be required to enter the current location of his/her staff and destination location.">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kaushan+Script">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/beautiful-dismissable-alert.css">
    <link rel="stylesheet" href="assets/css/Button-Outlines---Pretty.css">
    <link rel="stylesheet" href="assets/css/Google-Style-Login.css">
    <link rel="stylesheet" href="assets/css/top-alert-ie-E-Mail-Confirmation.css">

</head>

<body id="page-top">
<?php include 'includes/navbar.php';?>
<?php include 'includes/session.php'; ?>

    <header class="masthead" style="background-image:url('./assets/img/map-image.png');">
        <div class="container">
            <div class="intro-text" style="padding-top: 20px">
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
                
                <div class="intro-lead-in"></div>
                <div class="intro-heading text-uppercase"></div>
                <form class="bootstrap-form-with-validation" action="signup.php" method="POST" onsubmit="sendForm();">
                    <h2 class="text-center">Register Lessor</h2>
                    <div class="form-group"><label for="firstname">Firstname</label><input class="form-control" type="text" id="firstname" name="firstName" onkeypress="return /[a-z]/i.test(event.key)" required></div>
                    <div class="form-group"><label for="lastname">Lastname</label><input class="form-control" type="text" id="lastname" name="lastName" onkeypress="return /[a-z]/i.test(event.key)" required></div>
                    <div class="form-group"><label for="companyName">Company Name</label><input class="form-control" type="text" id="companyName" name="companyName" onkeypress="return /[a-z]/i.test(event.key)" required></div>
                    <div class="form-group"><label for="companyNo">Company Reg no.</label><input class="form-control" type="text" id="companyNo" name="companyNo" onkeypress="return /[a-z]/i.test(event.key)" required></div>
                    <div class="form-group"><label for="pNumber">Contact no.</label><input class="form-control" type="text" id="pNumber" name="pNumber"  placeholder="Cellphone no." onkeypress="return /[a-z]/i.test(event.key)" required></div>
                    <div class="form-group"><label for="address">Address</label><input class="form-control" type="text" id="address" name="address" onkeypress="return /[a-z]/i.test(event.key)" required></div>
                    <div class="form-group"><label for="email">Email&nbsp;</label><input class="form-control" type="email" id="email" name="email" onkeyup="emailValidate('register')" required></div>
                    <div class="form-group"><label for="password">Password&nbsp;</label><input class="form-control inputTxt" type="password" id="password" name="password" onkeyup="CheckPassword()" required><span class="fa fa-eye eyespan" style="margin-top: -30px;"></span></div>
                    <span class="tooltiptext"><label id="miniCharacters">* 8 Characters minimum</label><br><label id="special_character" >* Has special character</label><br><label id="lowercase" >* Has lowercase character</label><br><label id="uppercase" >* Has uppercase character</label><br><label id="hasNumber" >* Has a number</label></span>
                    <div class="form-group"><label for="password-input">Confirm Password&nbsp;</label><input class="form-control inputTxt" type="password" id="password-input" name="current_password" onkeyup="matchPassword()" required></div>
                    <span id="passwordMatch"></span>
                    <div class="form-group"><label for="bankDetails">Bank Details</label><input class="form-control inputTxt" type="text" id="bankDetails" name="bankDetails" onkeypress="return /[a-z]/i.test(event.key)" required></div>
                    <div class="form-group"><label for="idCopy">Attach Copy Id</label><input class="form-control inputTxt" type="file" id="idCopy" name="idCopy" class="input-file" required></div>
                    <div class="form-group"><button class="btn btn-primary" name="signup" type="submit">Register</button></div>
                </form><a class="btn btn-link border-pretty" role="button" style="color: rgb(254,209,54);" href="index.php">Home&nbsp;<i class="icon ion-android-arrow-forward"></i></a></div>
        </div>
    </header>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4"><span class="copyright">Copyright&nbsp;© Hot Desk 2020</span></div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                        <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
                        <li class="list-inline-item"><a href="#">Terms of Use</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="assets/js/agency.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>
<?php /* Attempt MySQL server connection. Assuming you are running MySQL server with default setting (user 'root' with no password) */
 $link = mysqli_connect("localhost", "root", "", "collage_system");
 // Check connection 
 if($link === false){ 
     die("ERROR: Could not connect. " . mysqli_connect_error()); 
    }
  // Attempt create table query execution
   $sqllessor = "CREATE TABLE lessor(
             id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
             first_name VARCHAR(30) NOT NULL,
             last_name VARCHAR(30) NOT NULL,
             email VARCHAR(70) NOT NULL UNIQUE,
             course_name VARCHAR(30) NOT NULL,
             mark int(11) NOT NULL,
             fees int(11) NOT NULL,
             passwords varchar(30) NOT NULL)";

      if(mysqli_query($link, $sqllessor))
            { echo "Table lessor created successfully."; }
            else
            { echo "ERROR: table lessor not executed $sqllessor. " . mysqli_error($link); }
            

     $sqlcourse = "CREATE TABLE course(
     course_id   INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
     course_name VARCHAR(30) NOT NULL,
     fee(11) int NOT NULL
                    )";
        
        if(mysqli_query($link, $sqlcourse))
        { echo "Table course created successfully."; } 
        else
        { echo "ERROR: table course not executed $sqlcourse. " . mysqli_error($link); }
        


                $sqladmin ="CREATE TABLE admins(
                    admin_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                    first_name VARCHAR(30) NOT NULL,
                    last_name VARCHAR(30) NOT NULL,
                    email VARCHAR(70) NOT NULL UNIQUE,
                    passwords varchar(30) NOT NULL)";

        if(mysqli_query($link, $sqladmin))
        { echo "Table admins created successfully."; } 
        else
        { echo "ERROR:  table admin not executed $sqladmin. " . mysqli_error($link); }
        
        //Insert admin credentials
        $sqlInsert = "INSERT INTO admin (admin_id, first_name, last_name, email, password) 
        VALUES ('0', 'South', 'Africa', 'south.africa@gmail.com', 'South@21S')";

        if(mysqli_query($link, $sqlInsert))
        { echo "Table admins created successfully."; } 
        else
        { echo "ERROR:  table admin not executed $sqladmin. " . mysqli_error($link); }

        $sql2 = "CREATE TABLE results (
            resultid INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
            studid VARCHAR(50) NOT NULL UNIQUE,
            mark int )";
        
        if(mysqli_query($link, $sql2)){
            echo "Table created successfully.";
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);

        $sql2 = "CREATE TABLE users (
            id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
            username VARCHAR(50) NOT NULL UNIQUE,
            password VARCHAR(255) NOT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
        )";
        
        if(mysqli_query($link, $sql2)){
            echo "Table created successfully.";
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }

        $sqlAnnounce ="CREATE TABLE announcement (
            id INT(11) NOT NULL,
            news VARCHAR(800) NOT NULL,
            date_created DATE NOT NULL)";
           
        if(mysqli_query($link, $sqlAnnounce)){
            echo "Table created successfully.";
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }

        $sqlMaterial ="CREATE TABLE material (
            id INT(11) NOT NULL,
            date_created DATE NOT NULL,
            tool VARCHAR(500) NOT NULL,
            file VARCHAR(255) NOT NULL)";

        if(mysqli_query($link, $sqlMaterial)){
            echo "Table created successfully.";
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }

        $sqlSubject = "CREATE TABLE subject (
            sub_code VARCHAR(7) NOT NULL,
            sub_name VARCHAR(25) NOT NULL,
            course_id INT(11) NOT NULL)";

        if(mysqli_query($link, $sqlSubject)){
            echo "Table created successfully.";
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }

            // Close connection 
            mysqli_close($link); 
?>
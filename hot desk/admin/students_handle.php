<?php
include './../includes/session.php';

$conn = $pdo->open();

if (isset($_POST['stud_id'])) {
    $id = $_POST['stud_id'];

    $stmt = $conn->prepare("SELECT * FROM lessor WHERE id=:id");
    $stmt->execute(['id' => $id]);
    $row = $stmt->fetch();

    echo json_encode($row);
}

if (isset($_POST['course_add'])) {

    $course_name = $_POST['course_name'];
    $fee =$_POST['fee'];

    $stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM course WHERE course_name=:course_name");
    $stmt->execute(['course_name'=>$course_name]);
    $row = $stmt->fetch();
    if($row['numrows'] > 0){
        $_SESSION['error'] = 'Course Name Already Exits';
    }else {

        $stmt = $conn->prepare("INSERT INTO course(course_name,fee) VALUES(:course_name,:fee)");
        $stmt->execute(['fee' => $fee, 'course_name' => $course_name]);
        $_SESSION['success'] = 'Course added successfully';

    }
    header('location: '.$_SERVER['HTTP_REFERER']);
}

if (isset($_POST['announce'])) {

    $news =$_POST['news'];
    $date = date('Y-m-d');

    $stmt = $conn->prepare("INSERT INTO announcement(news,date_created) VALUES(:news,:date_created)");
    $stmt->execute(['news' => $news, 'date_created' => $date]);
    $_SESSION['success'] = 'Announcement posted successfully';


    header('location: '.$_SERVER['HTTP_REFERER']);
}

if (isset($_FILES['file'])) {

    $file =$_FILES['file']['name'];
    $tool =$_POST['tool'];
    $date = date('Y-m-d');

    try {

        $stmt = $conn->prepare("INSERT INTO material(date_created,tool,file) VALUES(:date_created,:tool,:file)");
        $stmt->execute(['date_created' => $date, 'tool' => $tool, 'file' => $file]);
        $_SESSION['success'] = 'Material posted successfully';
    }
  catch(PDOException $e){
        $_SESSION['error'] = $e->getMessage();
    }

    header('location: '.$_SERVER['HTTP_REFERER']);
}

if (isset($_POST['edit_id'])) {
    $id = $_POST['edit_id'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $course_name =$_POST['course_name'];
    $email = $_POST['email'];
    $mark = $_POST['mark'];

    $stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM lessor WHERE email=:email AND id <>:id");
    $stmt->execute(['email'=>$email, 'id'=>$id]);
    $row = $stmt->fetch();
    if($row['numrows'] > 0){
        $_SESSION['error'] = 'Email already exits';
    }
    else {

        $stmt = $conn->prepare("UPDATE lessor SET email=:email,
    password=:password, first_name=:first_name, last_name=:last_name,course_name=:course_name,mark=:mark WHERE id=:id");
        $stmt->execute(['email' => $email, 'password' => $password, 'first_name' =>
            $firstname, 'last_name' => $lastname, 'course_name' => $course_name,'mark'=>$mark, 'id' => $id]);

        $_SESSION['success'] = 'Student updated successfully';
    }
    header('location: students.php');
}

if (isset($_POST['course_id'])) {

    $stmt = $conn->prepare("SELECT * FROM course");
    $stmt->execute();
    $row = $stmt->fetch();

    echo json_encode($row);
}


if(isset($_POST['addnew'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $course_name = $_POST['course_name'];

    $stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM lessor WHERE email=:email");
    $stmt->execute(['email' => $email]);
    $row = $stmt->fetch();
    if ($row['numrows'] > 0) {
        $_SESSION['error'] = 'Email already exits';
    } else {

        $stmt = $conn->prepare("INSERT INTO lessor(email, password, first_name,last_name,course_name) VALUES(:email, :password, :first_name,:last_name,:course_name)");
        $stmt->execute(['email' => $email, 'password' => $password, 'first_name' =>
            $firstname, 'last_name' => $lastname, 'course_name' => $course_name]);
        $_SESSION['success'] = 'Student updated successfully';

    }
    header('Location: students.php');
}


if(isset($_POST['id_delete'])){
    $id = $_POST['id_delete'];

    try{
        $stmt = $conn->prepare("DELETE FROM lessor WHERE id=:id");
        $stmt->execute(['id'=>$id]);

        $_SESSION['success'] = 'Student deleted successfully';
    }
    catch(PDOException $e){
        $_SESSION['error'] = $e->getMessage();
    }
    header('Location: students.php');

}
$pdo->close();

?>
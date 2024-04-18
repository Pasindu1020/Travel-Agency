<?php
     $UName = $_POST['Name'];
     $email = $_POST['email'];
     $MobNo = $_POST['MobileNumber'];
     $Message = $_POST['Message'];


     //Database Connection

     $conn = mysqli_connect('localhost', 'root', '', 'travelagency');
     if($conn->connect_error){
        die('Connection Failed :'.$conn->connect_error);
     } else {
        $stmt = $conn->prepare("insert into Joinus(Uname, UEmail, UContactno, Message) values (?,?,?,?)");
        $stmt->bind_param("ssss", $UName, $email, $MobNo, $Message);
        $stmt->execute();
        echo "<script>alert('Your Message has been Send'); window.location.href='Home.html';</script>";
        $stmt->close();
        $conn->close();
     }

?>



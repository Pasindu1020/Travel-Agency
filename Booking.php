<?php
     $email = $_POST['email'];
     $mobilenum = $_POST['mobileno'];
     $checkin = $_POST['checkin'];
     $adults = $_POST['adults'];
     $child = $_POST['children'];


     //Database Connection

     $conn = mysqli_connect('localhost', 'root', '', 'travelagency');
     if($conn->connect_error){
        die('Connection Failed :'.$conn->connect_error);
     } else {
        $getUserIdQuery = "SELECT UserID FROM users WHERE email = ?";
        $stmt = $conn->prepare($getUserIdQuery);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($userId);
        $stmt->fetch();
        $stmt->close();

        $stmt = $conn->prepare("insert into Booking(Contact_No, Checkin_date, Adult, Children, User_id) values (?,?,?,?,?)");
        $stmt->bind_param("isiii", $mobilenum, $checkin, $adults, $child, $userId);
        $stmt->execute();
        header("Location: Payment.html");
        $stmt->close();
        $conn->close();
     }

?>
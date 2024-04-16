<?php
     $email = $_POST['email'];
     $mobilenum = $_POST['mobileno'];
     $checkin = $_POST['checkin'];
     $checkout = $_POST['checkout'];


     //Database Connection

     $conn = mysqli_connect('localhost', 'root', '', 'travelagency');
     if($conn->connect_error){
        die('Connection Failed :'.$conn->connect_error);
     } else {
        $getUserIdQuery = "SELECT id FROM users WHERE email = ?";
        $stmt = $mysqli->prepare($getUserIdQuery);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($userId);
        $stmt->fetch();
        $stmt = $conn->prepare("insert into Booking(Contact_No, Checkin_date, Checkout_date, User_id) values (?,?,?,?)");
        $stmt->bind_param("issi", $mobilenum, $checkin, $checkout, $userId);
        $stmt->execute();
        $stmt->close();
        $conn->close();
     }

?>
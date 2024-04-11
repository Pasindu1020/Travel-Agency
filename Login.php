<?php
     $firstname = $_POST['fname'];
     $lastname = $_POST['lname'];
     $email = $_POST['email'];
     $password = $_POST['password'];

     //Database Connection

     $conn = mysqli_connect('localhost', 'root', '', 'travelagency');
     if($conn->connect_error){
        die('Connection Failed :'.$conn->connect_error);
     } else {
        $stmt = $conn->prepare("insert into Users(Firstname, Lastname, Email, Password) values (?,?,?,?)");
        $stmt->bind_param("ssss", $firstname, $lastname, $email, $password);
        $stmt->execute();
        echo "Registration Succcessfully";
        $stmt->close();
        $conn->close();
     }

?>
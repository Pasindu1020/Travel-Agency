<?php
   
     $useremail = $_POST['logemail'];
     $userpassword = $_POST['logpassword'];

     //Database Connection

     $conn = mysqli_connect('localhost', 'root', '', 'travelagency');
     if($conn->connect_error){
        die('Connection Failed :'.$conn->connect_error);
     } else {
        $useremail = mysqli_real_escape_string($conn, $useremail);
        $userpassword = mysqli_real_escape_string($conn, $userpassword);
    
        if ($useremail === 'silkroadodessy@gmail.com' && $userpassword === 'admin') {
            // Redirect to homeadmin page
            header("Location: HomeAdmin.html");
            exit;
        } else {
            $sql = "SELECT * FROM Users WHERE Email='$useremail' AND Password='$userpassword'";
            $result = $conn->query($sql);
    
            if ($result->num_rows > 0) {
                $_SESSION['logemail'] = $useremail;
                header("Location: HomeLogged.html");
                exit;
            } else {
                echo "<script>alert('Invalid username or password'); window.location.href='Login.html';</script>";
            }
        }
        $conn->close();
     }

?>



<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to your database (replace these with your actual database credentials)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "travelagency";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get form data
    $rating = $_POST['rating'];
    $review = $_POST['opinion'];
    $email = $_POST['email'];
    
    $getUserIdQuery = "SELECT UserID FROM users WHERE email = ?";
        $stmt = $conn->prepare($getUserIdQuery);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($userId);
        $stmt->fetch();
        $stmt->close();

    // Prepare and bind SQL statement
    $stmt = $conn->prepare("insert into review(review_text, Email, rating, User_id) values (?,?,?,?)");
    $stmt->bind_param("sssi", $review, $email, $rating, $userId);

    // Execute the statement
    if ($stmt->execute() === TRUE) {
        echo "<script>alert('Review submitted successfully.'); window.location.href='Home.html';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
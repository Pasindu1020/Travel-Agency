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
    $review = $_POST['option'];
    $email = $_POST['email'];
    
    $getUserIdQuery = "SELECT UserID FROM users WHERE email = ?";
        $stmt = $conn->prepare($getUserIdQuery);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($userId);

    // Prepare and bind SQL statement
    $stmt = $conn->prepare("INSERT INTO review (review_text, email, rating, User_id) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssii", $review, $email, $rating, $User_id);

    // Execute the statement
    if ($stmt->execute() === TRUE) {
        echo "Review submitted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
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
    $review = $_POST['review'];
    $name = $_POST['name'];
    $opinion = $_POST['opinion'];

    // Prepare and bind SQL statement
    $stmt = $conn->prepare("INSERT INTO review (rating, review, name, opinion) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $rating, $review, $name, $opinion);

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
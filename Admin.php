
<?php
// Establishing a connection to the database
$servername = "localhost";
$username = "root";
$password = '';
$dbname = "travelagency";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to select data from the database
$sql = "SELECT UserID, Firstname, Lastname, Email FROM Users";
$result = $conn->query($sql);

$sql2 = "SELECT * FROM booking";
$result2 = $conn->query($sql2);

$sql3 = "SELECT * FROM review";
$result3 = $conn->query($sql3);

$sql4 = "SELECT * FROM family_package_details";
$result4 = $conn->query($sql4);

$sql5 = "SELECT * FROM otherpackage";
$result5 = $conn->query($sql5);

// Check if the query executed successfully
if (!$result) {
    die("Error fetching data: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Database Data</title>
    <style>
        h1 {
            font-size: 30px;
            color: #fff;
            text-transform: uppercase;
            font-weight: 300;
            text-align: center;
            margin-bottom: 15px;
        }

        table {
            width: 100%;
            table-layout: fixed;
        }

        .row {
            display: flex;
            margin-left:-5px;
            margin-right:-5px;
        }

        .column {
            flex: 50%;
            padding: 5px;
        }

        .tbl-header {
            background-color: rgba(255, 255, 255, 0.3);
        }

        .tbl-content {
            height: 300px;
            overflow-x: auto;
            margin-top: 0px;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        th {
            padding: 20px 15px;
            text-align: left;
            font-weight: 500;
            font-size: 20px;
            color: #fff;
            text-transform: uppercase;
        }

        td {
            padding: 15px;
            text-align: left;
            vertical-align: middle;
            font-weight: 300;
            font-size: 18px;
            color: #fff;
            border-bottom: solid 1px rgba(255, 255, 255, 0.1);
        }


        /* demo styles */

        @import url(https://fonts.googleapis.com/css?family=Roboto:400,500,300,700);

        body {
            background: -webkit-linear-gradient(left, #25c481, #25b7c4);
            background: linear-gradient(to right, #25c481, #25b7c4);
            font-family: 'Roboto', sans-serif;
        }

        section {
            margin: 50px;
        }
    </style>
</head>

<body>


    <section>

        <h1>User Data</h1>
        <div class="tbl-header">
            <table cellpadding="0" cellspacing="0" border="0">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                    </tr>
                </thead>
            </table>
        </div>

        <div class="tbl-content">
            <table cellpadding="0" cellspacing="0" border="0">
                <tbody>
                    <?php

        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row["UserID"]."</td>";
            echo "<td>".$row["Firstname"]."</td>";
            echo "<td>".$row["Lastname"]."</td>";
            echo "<td>".$row["Email"]."</td>";
            echo "</tr>";
        }
        ?>
                </tbody>
            </table>
        </div>
    </section>

    <section>

        <h1>Booking Data</h1>
        <div class="tbl-header">
            <table cellpadding="0" cellspacing="0" border="0">
                <thead>
                    <tr>
                        <th>Booking ID</th>
                        <th>Contact Number</th>
                        <th>Checkin Date</th>
                        <th>No. of Adults</th>
                        <th>No. of Children</th>
                        <th>User ID</th>
                    </tr>
                </thead>
            </table>
        </div>

        <div class="tbl-content">
            <table cellpadding="0" cellspacing="0" border="0">
                <tbody>
                    <?php

        while($row = $result2->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row["Booking_id"]."</td>";
            echo "<td>".$row["Contact_No"]."</td>";
            echo "<td>".$row["Checkin_date"]."</td>";
            echo "<td>".$row["Adult"]."</td>";
            echo "<td>".$row["Children"]."</td>";
            echo "<td>".$row["User_id"]."</td>";
            echo "</tr>";
        }
        ?>
                </tbody>
            </table>
        </div>
    </section>

    <section>

        <h1>Review Data</h1>
        <div class="tbl-header">
            <table cellpadding="0" cellspacing="0" border="0">
                <thead>
                    <tr>
                        <th>Review ID</th>
                        <th>Review Text</th>
                        <th>Email</th>
                        <th>Rating</th>
                        <th>User ID</th>
                        <th>Package ID</th>
                    </tr>
                </thead>
            </table>
        </div>

        <div class="tbl-content">
            <table cellpadding="0" cellspacing="0" border="0">
                <tbody>
                    <?php

        while($row = $result3->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row["review_id"]."</td>";
            echo "<td>".$row["review_text"]."</td>";
            echo "<td>".$row["Email"]."</td>";
            echo "<td>".$row["rating"]."</td>";
            echo "<td>".$row["User_id"]."</td>";
            echo "<td>".$row["Package_id"]."</td>";
            echo "</tr>";
        }
        ?>
                </tbody>
            </table>
        </div>
    </section>

    <section>

        <h1>Package Details</h1>
        <div class="tbl-header">
        <div class="row">
        <div class="column">
            <table cellpadding="0" cellspacing="0" border="0">
                <thead>
                    <tr>
                        <th>Family Package ID</th>
                        <th>Family Package Name</th>
                        <th>Price</th>
                    </tr>
                </thead>
            </table>
        </div>

        <div class="tbl-content">
            <table cellpadding="0" cellspacing="0" border="0">
                <tbody>
                    <?php

        while($row = $result4->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row["Fpackage_id"]."</td>";
            echo "<td>".$row["Fpackage_name"]."</td>";
            echo "<td>".$row["Price"]."</td>";
            echo "</tr>";
        }
        ?>
                </tbody>
            </table>
    </div>
    <div class="column">
            <table cellpadding="0" cellspacing="0" border="0">
                <thead>
                    <tr>
                        <th>Other Package ID</th>
                        <th>Other Package Name</th>
                        <th>Price</th>
                    </tr>
                </thead>
            </table>
        </div>

        <div class="tbl-content">
            <table cellpadding="0" cellspacing="0" border="0">
                <tbody>
                    <?php

        while($row = $result5->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row["Opackage_ID"]."</td>";
            echo "<td>".$row["Opackage_name"]."</td>";
            echo "<td>".$row["Price"]."</td>";
            echo "</tr>";
        }
        ?>
                </tbody>
            </table>
    </div>
        </div>
        </div>
    </section>


    <?php
 
    $conn->close();
    ?>

</body>

</html>
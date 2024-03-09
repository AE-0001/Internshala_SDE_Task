<?php
require_once 'config.php'; // Include database configuration

// Check if car details are provided in the URL
if (isset($_GET['car_model'])) {
    $car_model = $_GET['car_model'];

    // Retrieve bookings associated with the selected car details from the database
    $stmt = $conn->prepare("SELECT car_model, booking_duration, booking_date, customer_name, email, driver_license, ending_date, customer_id FROM bookings WHERE car_model = :car_model");
    $stmt->bindParam(':car_model', $car_model);
    $stmt->execute();

    // Check if there are any matching records
    if ($stmt->rowCount() > 0) {
        // Start the HTML output with CSS styles
        echo "<!DOCTYPE html>
                <html lang='en'>
                <head>
                    <meta charset='UTF-8'>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                    <title>Bookings for Car Model: $car_model</title>
                    <style>
                        /* General Styles */
                        body {
                            font-family: Arial, sans-serif;
                            background-color: #f2f2f2;
                            margin: 0;
                            padding: 0;
                        }
                        .container {
                            max-width: 100%; /* Adjust max-width to fit the table */
                            margin: 50px auto;
                            background-color: #fff;
                            padding: 20px;
                            border-radius: 8px;
                            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
                            overflow-x: auto; /* Add horizontal scroll for overflow */
                        }
                        h2 {
                            text-align: center;
                            color: #333;
                        }
                        table {
                            width: 100%;
                            border-collapse: collapse;
                        }
                        th, td {
                            padding: 10px;
                            text-align: left;
                            border-bottom: 1px solid #ddd;
                        }
                        th {
                            background-color: #f2f2f2;
                        }
                    </style>
                </head>
                <body>";
        
        // Display the bookings
        echo "<div class='container'>";
        echo "<h2>Bookings for Car Model: $car_model</h2>";
        echo "<table border='1'>
                <tr>
                    <th>Car Model</th>
                    <th>Booking Duration</th>
                    <th>Booking Date</th>
                    <th>Customer Name</th>
                    <th>Email</th>
                    <th>Driver License</th>
                    <th>Ending Date</th>
                    <th>Customer ID</th>
                </tr>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row['car_model'] . "</td>";
            echo "<td>" . $row['booking_duration'] . "</td>";
            echo "<td>" . $row['booking_date'] . "</td>";
            echo "<td>" . $row['customer_name'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['driver_license'] . "</td>";
            echo "<td>" . $row['ending_date'] . "</td>";
            echo "<td>" . $row['customer_id'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
        
        // End the HTML output
        echo "</body>
              </html>";
    } else {
        echo "No bookings found for car model: $car_model";
    }
} else {
    echo "Please enter car details.";
}
?>

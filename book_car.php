<?php
require_once 'config.php'; // Include database configuration

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $customer_name = $_POST['customer_name'] ?? '';
    $email = $_POST['email'] ?? '';
    $driver_license = $_POST['driver_license'] ?? '';
    $car_model = $_POST['car_model'] ?? '';
    $booking_date = $_POST['booking_date'] ?? '';
    $ending_date = $_POST['ending_date'] ?? '';

    // Calculate booking duration
    $booking_duration = ($booking_date && $ending_date) ? floor((strtotime($ending_date) - strtotime($booking_date)) / (60 * 60 * 24)) : 0;

    // Ensure driver_license is not empty
    if (empty($driver_license)) {
        echo "Error: Driver's license number cannot be empty.";
        exit; // Exit the script to prevent further execution
    }

    try {
        // Check if the driver_license already exists in the bookings table
        $stmt = $conn->prepare("SELECT * FROM bookings WHERE driver_license = :driver_license");
        $stmt->bindParam(':driver_license', $driver_license);
        $stmt->execute();
        $existing_booking = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($existing_booking) {
            echo "Error: Driver's license number already exists in the bookings table.";
            exit; // Exit the script to prevent further execution
        }

        // Prepare and execute the SQL query
        $stmt = $conn->prepare("INSERT INTO bookings (customer_name, email, driver_license, car_model, booking_date, ending_date, booking_duration) VALUES (:customer_name, :email, :driver_license, :car_model, :booking_date, :ending_date, :booking_duration)");
        $stmt->bindParam(':customer_name', $customer_name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':driver_license', $driver_license);
        $stmt->bindParam(':car_model', $car_model);
        $stmt->bindParam(':booking_date', $booking_date);
        $stmt->bindParam(':ending_date', $ending_date);
        $stmt->bindParam(':booking_duration', $booking_duration);
        $stmt->execute();

        // Booking successful
        echo "Car booked successfully!";
    } catch(PDOException $e) {
        // Booking failed
        echo "Error: " . $e->getMessage();
    }
}
?>

<?php
require_once 'config.php'; // Include database configuration

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $driver_license = $_POST['driver_license'];

    // Insert data into database (you need to adjust this query according to your database schema)
    $stmt = $conn->prepare("INSERT INTO cust_reg (name, email, password, driver_license) VALUES (:name, :email, :password, :driver_license)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password); // Note: You should hash the password before storing it in the database
    $stmt->bindParam(':driver_license', $driver_license);

    // Execute the query
    if ($stmt->execute()) {
        // Registration successful
        echo "Registration successful!";
    } else {
        // Registration failed
        echo "Error: Unable to register.";
    }
}
?>

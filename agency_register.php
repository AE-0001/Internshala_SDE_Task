<?php
require_once 'config.php'; // Include database configuration

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $agency_name = $_POST['agency_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $contact_number = $_POST['contact_number'];
    $address = $_POST['address'];

    echo "Contact Number: " . $contact_number . "<br>";

    // Insert data into database (you need to adjust this query according to your database schema)
    $stmt = $conn->prepare("INSERT INTO agency_register (`Agency Name`, `Email Address`, `Password`, `Contact Number`, `Address`) VALUES (:agency_name, :email, :password, :contact_number, :address)");
    $stmt->bindParam(':agency_name', $agency_name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password); // Note: You should hash the password before storing it in the database
    $stmt->bindParam(':contact_number', $contact_number);
    $stmt->bindParam(':address', $address);

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

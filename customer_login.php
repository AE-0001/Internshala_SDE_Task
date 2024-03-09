<?php
require_once 'config.php'; // Include database configuration

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare and execute a query to check if the email and password combination exists in the registration table
    $stmt = $conn->prepare("SELECT * FROM cust_reg WHERE `email` = :email AND `password` = :password");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password); // Note: You should hash the password before storing it in the database
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        header("Location: book_car2.html");
        exit();
    } else {
        // If no matching record is found, display an error message
        echo "Invalid email or password. Please try again.";
    }
}
?>

<?php
require_once 'config.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $stmt = $conn->prepare("SELECT * FROM agency_register WHERE `Email Address` = :email AND `Password` = :password");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password); 
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        header("Location: view_bookings.html");
        exit();
    } else {
        echo "Invalid email or password. Please try again.";
    }
}
?>


<?php
require_once 'config.php'; // Include database configuration

try {
    // Fetch available cars from the database with their counts
    $stmt = $conn->query("SELECT model, CAST(available AS UNSIGNED) AS available FROM available_cars");
    $availableCars = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Prepare data array
    $data = [];

    // Iterate through each row and format the data
    foreach ($availableCars as $car) {
        $data[] = [
            'model' => $car['model'],
            'available' => $car['available']
        ];
    }

    // Output formatted data as JSON
    header('Content-Type: application/json');
    echo json_encode($data);
} catch(PDOException $e) {
    // Handle database errors
    echo json_encode(['error' => 'Failed to fetch available cars.']);
}
?>

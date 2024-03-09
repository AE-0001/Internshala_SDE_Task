document.addEventListener("DOMContentLoaded", function() {
    const availableCarsContainer = document.getElementById("available-cars");

    // Fetch available cars from the server
    fetch("get_available_cars.php")
    .then(response => {
        if (!response.ok) {
            throw new Error("Unable to fetch available cars.");
        }
        return response.json(); // Parse JSON response
    })
    .then(data => {
        // Check if data is an error response
        if (data.error) {
            availableCarsContainer.innerHTML = `<p>${data.error}</p>`;
        } else {
            // Display available cars
            const availableCarsList = data.map(car => `<p>${car.model} - Available: ${car.available}</p>`).join('');
            availableCarsContainer.innerHTML = availableCarsList;
        }
    })
    .catch(error => {
        // Handle errors
        console.error(error);
        availableCarsContainer.innerHTML = "<p>Error fetching available cars.</p>";
    });
});

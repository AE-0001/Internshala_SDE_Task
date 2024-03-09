document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("car-booking-form");

    form.addEventListener("submit", function(event) {
        event.preventDefault(); // Prevent the default form submission

        // Send the booking data to the server using FormData
        fetch("book_car.php", {
            method: "POST",
            body: new FormData(form) // Send form data as FormData object
        })
        .then(response => {
            if (!response.ok) {
                throw new Error("Unable to book the car.");
            }
            return response.text();
        })
        .then(data => {
            // Display booking status
            alert(data);
            // Optionally, redirect to another page or perform other actions
        })
        .catch(error => {
            // Handle errors
            alert(error.message);
        });
    });
});

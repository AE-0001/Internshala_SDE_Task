// Function to handle renting a car
function rentCar(button) {
    const vehicleNumber = button.getAttribute('data-vehicle');
    const rentDaysInput = document.getElementById(`rentDays${vehicleNumber}`);
    const startDateInput = document.getElementById(`startDate${vehicleNumber}`);
    
    const rentDays = rentDaysInput ? rentDaysInput.value : null;
    const startDate = startDateInput ? startDateInput.value : null;

    if (!rentDays || !startDate) {
        alert("Please fill in all required fields.");
        return;
    }

    // Submit form data to PHP script
    const form = document.createElement('form');
    form.method = 'post';
    form.action = 'book_car.php'; // Replace 'book_car.php' with your PHP script URL

    const vehicleNumberField = document.createElement('input');
    vehicleNumberField.type = 'hidden';
    vehicleNumberField.name = 'vehicleNumber';
    vehicleNumberField.value = vehicleNumber;
    form.appendChild(vehicleNumberField);

    const rentDaysField = document.createElement('input');
    rentDaysField.type = 'hidden';
    rentDaysField.name = 'rentDays';
    rentDaysField.value = rentDays;
    form.appendChild(rentDaysField);

    const startDateField = document.createElement('input');
    startDateField.type = 'hidden';
    startDateField.name = 'startDate';
    startDateField.value = startDate;
    form.appendChild(startDateField);

    document.body.appendChild(form);
    form.submit();
}

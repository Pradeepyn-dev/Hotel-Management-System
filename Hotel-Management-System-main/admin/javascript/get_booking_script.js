// get_booking_script.js
function getBookingDetails() {
    const bookingId = document.getElementById('bookingId').value;

    // Make a request to the backend to get booking details
    fetch(`/api/getBookingDetails.php?bookingId=${bookingId}`)
        .then(response => response.json())
        .then(data => {
            // Display the booking details on the page
            const bookingDetailsDiv = document.getElementById('bookingDetails');
            bookingDetailsDiv.innerHTML = `<h3>Booking Details</h3>${JSON.stringify(data)}`;
        })
        .catch(error => {
            console.error('Error:', error);
        });
}

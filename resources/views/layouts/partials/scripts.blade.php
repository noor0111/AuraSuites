<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Simple booking functionality
    let bookings = JSON.parse(localStorage.getItem('hotelBookings')) || [];
    
    function bookRoom(roomType, price, nights = 1) {
        const booking = {
            roomType,
            price,
            nights,
            total: price * nights,
            bookingId: Date.now()
        };
        bookings.push(booking);
        localStorage.setItem('hotelBookings', JSON.stringify(bookings));
        updateBookingCount();
        alert('Room booked successfully!');
    }
    
    function updateBookingCount() {
        const bookingCount = document.getElementById('bookingCount');
        if (bookingCount) {
            bookingCount.textContent = bookings.length;
        }
    }
    
    // Initialize on page load
    document.addEventListener('DOMContentLoaded', function() {
        updateBookingCount();
    });

    function updateGlobalBookingCount() {
    const bookings = JSON.parse(localStorage.getItem('hotelBookings')) || [];
    const bookingCountElements = document.querySelectorAll('.booking-count');
    bookingCountElements.forEach(element => {
        element.textContent = bookings.length;
    });
}

// Update booking count on page load
document.addEventListener('DOMContentLoaded', function() {
    updateGlobalBookingCount();
});
</script>
@extends('layouts.app')

@section('title', 'My Bookings - Aura Suites')

@section('content')
<!-- Page Header -->
<section class="bg-dark text-white py-5">
    <div class="container">
        <h1 class="text-center">My Bookings</h1>
        <p class="text-center lead">Review and manage your room bookings</p>
    </div>
</section>

<!-- Booking Summary -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-warning">
                        <h4 class="mb-0"><i class="fas fa-calendar-check me-2"></i>Booking Summary</h4>
                    </div>
                    <div class="card-body">
                        <div id="bookingsList">
                            <!-- Bookings will be dynamically inserted here -->
                            <div class="text-center py-4" id="emptyBookings">
                                <i class="fas fa-calendar-times fa-3x text-muted mb-3"></i>
                                <h5>No Bookings Yet</h5>
                                <p class="text-muted">You haven't booked any rooms yet.</p>
                                <a href="/rooms" class="btn btn-warning">Browse Rooms</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Guest Information Form -->
                <div class="card shadow mt-4">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="fas fa-user me-2"></i>Guest Information</h5>
                    </div>
                    <div class="card-body">
                        <form id="guestInfoForm">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">First Name *</label>
                                    <input type="text" class="form-control" id="firstName" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Last Name *</label>
                                    <input type="text" class="form-control" id="lastName" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Email *</label>
                                    <input type="email" class="form-control" id="email" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Phone *</label>
                                    <input type="tel" class="form-control" id="phone" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Check-in Date *</label>
                                    <input type="date" class="form-control" id="checkInDate" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Check-out Date *</label>
                                    <input type="date" class="form-control" id="checkOutDate" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Special Requests</label>
                                <textarea class="form-control" id="specialRequests" rows="3" placeholder="Any special requirements or requests..."></textarea>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Booking Summary Sidebar -->
            <div class="col-md-4">
                <div class="card shadow sticky-top" style="top: 20px;">
                    <div class="card-header bg-dark text-white">
                        <h5 class="mb-0"><i class="fas fa-receipt me-2"></i>Booking Total</h5>
                    </div>
                    <div class="card-body">
                        <div id="bookingSummary">
                            <div class="text-center text-muted" id="emptySummary">
                                No bookings to display
                            </div>
                        </div>
                        <hr>
                        <div class="d-grid gap-2">
                            <button class="btn btn-warning btn-lg" onclick="proceedToConfirmation()" id="confirmBookingBtn" disabled>
                                <i class="fas fa-credit-card me-2"></i>Confirm Booking
                            </button>
                            <a href="/rooms" class="btn btn-outline-dark">
                                <i class="fas fa-plus me-2"></i>Add More Rooms
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Help Section -->
                <div class="card shadow mt-4">
                    <div class="card-body">
                        <h6><i class="fas fa-info-circle me-2 text-warning"></i>Need Help?</h6>
                        <p class="small text-muted mb-2">Our team is available 24/7 to assist you with your booking.</p>
                        <div class="d-flex align-items-center mb-1">
                            <i class="fas fa-phone text-warning me-2"></i>
                            <span class="small">+92-21-1234567</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="fas fa-envelope text-warning me-2"></i>
                            <span class="small">bookings@aurasuites.com</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
// Load bookings when page loads
document.addEventListener('DOMContentLoaded', function() {
    loadBookings();
    setupDateValidation();
});

function loadBookings() {
    const bookings = JSON.parse(localStorage.getItem('hotelBookings')) || [];
    const bookingsList = document.getElementById('bookingsList');
    const bookingSummary = document.getElementById('bookingSummary');
    const emptyBookings = document.getElementById('emptyBookings');
    const emptySummary = document.getElementById('emptySummary');
    const confirmBtn = document.getElementById('confirmBookingBtn');

    if (bookings.length === 0) {
        emptyBookings.style.display = 'block';
        emptySummary.style.display = 'block';
        confirmBtn.disabled = true;
        return;
    }

    emptyBookings.style.display = 'none';
    emptySummary.style.display = 'none';
    confirmBtn.disabled = false;

    // Generate bookings list
    let bookingsHTML = '';
    let summaryHTML = '';
    let subtotal = 0;

    bookings.forEach((booking, index) => {
        const roomTotal = booking.price * booking.nights;
        subtotal += roomTotal;

        bookingsHTML += `
            <div class="booking-item border-bottom pb-3 mb-3">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h6 class="mb-1">${booking.roomType}</h6>
                        <small class="text-muted">${booking.nights} night(s) • ${booking.capacity || '2'} Guests</small>
                        <div class="mt-2">
                            <small class="text-success">PKR ${booking.price.toLocaleString()} per night</small>
                        </div>
                    </div>
                    <div class="col-4 text-end">
                        <div class="h6 text-warning">PKR ${roomTotal.toLocaleString()}</div>
                        <button class="btn btn-sm btn-outline-danger" onclick="removeBooking(${booking.bookingId})">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
        `;

        summaryHTML += `
            <div class="d-flex justify-content-between small mb-2">
                <span>${booking.roomType}</span>
                <span>PKR ${roomTotal.toLocaleString()}</span>
            </div>
        `;
    });

    const tax = subtotal * 0.05; // 5% tax
    const serviceCharge = subtotal * 0.1; // 10% service charge
    const total = subtotal + tax + serviceCharge;

    summaryHTML += `
        <hr>
        <div class="d-flex justify-content-between mb-2">
            <span>Subtotal:</span>
            <span>PKR ${subtotal.toLocaleString()}</span>
        </div>
        <div class="d-flex justify-content-between mb-2">
            <span>Tax (5%):</span>
            <span>PKR ${tax.toLocaleString()}</span>
        </div>
        <div class="d-flex justify-content-between mb-2">
            <span>Service Charge (10%):</span>
            <span>PKR ${serviceCharge.toLocaleString()}</span>
        </div>
        <hr>
        <div class="d-flex justify-content-between fw-bold">
            <span>Total:</span>
            <span class="h5 text-warning">PKR ${total.toLocaleString()}</span>
        </div>
    `;

    bookingsList.innerHTML = bookingsHTML;
    bookingSummary.innerHTML = summaryHTML;
}

function removeBooking(bookingId) {
    let bookings = JSON.parse(localStorage.getItem('hotelBookings')) || [];
    bookings = bookings.filter(booking => booking.bookingId !== bookingId);
    localStorage.setItem('hotelBookings', JSON.stringify(bookings));
    loadBookings();
    
    // Update booking count in navigation
    updateGlobalBookingCount();
}

function setupDateValidation() {
    const today = new Date().toISOString().split('T')[0];
    document.getElementById('checkInDate').min = today;
    
    document.getElementById('checkInDate').addEventListener('change', function() {
        document.getElementById('checkOutDate').min = this.value;
    });
}

function proceedToConfirmation() {
    const form = document.getElementById('guestInfoForm');
    const checkInDate = document.getElementById('checkInDate').value;
    const checkOutDate = document.getElementById('checkOutDate').value;

    if (!form.checkValidity()) {
        alert('Please fill in all required guest information.');
        return;
    }

    if (!checkInDate || !checkOutDate) {
        alert('Please select both check-in and check-out dates.');
        return;
    }

    const bookings = JSON.parse(localStorage.getItem('hotelBookings')) || [];
    if (bookings.length === 0) {
        alert('No bookings found. Please book rooms first.');
        return;
    }

    // Calculate total
    let subtotal = 0;
    bookings.forEach(booking => {
        subtotal += booking.price * booking.nights;
    });
    const total = subtotal + (subtotal * 0.05) + (subtotal * 0.1);

    const confirmationMessage = `
        🎉 Booking Confirmed!
        
        Thank you for choosing Aura Suites!
        
        Your booking has been received and is being processed.
        A confirmation email will be sent to you shortly.
        
        Total Amount: PKR ${total.toLocaleString()}
        
        We look forward to welcoming you!
    `;

    alert(confirmationMessage);
    
    // Clear bookings after confirmation
    localStorage.removeItem('hotelBookings');
    
    // Redirect to home page
    window.location.href = '/';
}

function updateGlobalBookingCount() {
    const bookings = JSON.parse(localStorage.getItem('hotelBookings')) || [];
    const bookingCountElements = document.querySelectorAll('.booking-count');
    bookingCountElements.forEach(element => {
        element.textContent = bookings.length;
    });
}

// Clear all bookings (for testing)
function clearAllBookings() {
    if (confirm('Are you sure you want to clear all bookings?')) {
        localStorage.removeItem('hotelBookings');
        loadBookings();
        updateGlobalBookingCount();
    }
}
</script>

<style>
.booking-item {
    transition: all 0.3s ease;
}

.booking-item:hover {
    background-color: #f8f9fa;
    border-radius: 5px;
    padding: 10px;
    margin: -10px -10px 10px -10px;
}

.sticky-top {
    position: sticky;
    z-index: 100;
}

.btn:disabled {
    cursor: not-allowed;
    opacity: 0.6;
}

.card {
    border: none;
    border-radius: 10px;
}

.card-header {
    border-radius: 10px 10px 0 0 !important;
    border: none;
}
</style>
@endsection
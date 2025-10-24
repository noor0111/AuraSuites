@extends('layouts.app')

@section('title', 'Rooms & Suites - Aura Suites')

@section('content')
<!-- ============================================
    PAGE HEADER SECTION
================================================ -->
<section class="bg-dark text-white py-5">
    <div class="container">
        <h1 class="text-center">Rooms & Suites</h1>
        <p class="text-center lead">Choose from our luxurious accommodation options</p>
    </div>
</section>

<!-- ============================================
    ROOM FILTERS SECTION
================================================ -->
<section class="py-4 bg-light">
    <div class="container">
        <div class="row">
            <!-- Room Type Filter -->
            <div class="col-md-3 mb-3">
                <label class="form-label">Room Type</label>
                <select class="form-select" id="roomTypeFilter">
                    <option value="all">All Rooms</option>
                    <option value="deluxe">Deluxe</option>
                    <option value="executive">Executive</option>
                    <option value="presidential">Presidential</option>
                </select>
            </div>
            
            <!-- Price Range Filter -->
            <div class="col-md-3 mb-3">
                <label class="form-label">Price Range</label>
                <select class="form-select" id="priceFilter">
                    <option value="all">Any Price</option>
                    <option value="0-50000">PKR 0 - 50,000</option>
                    <option value="50001-100000">PKR 50,001 - 100,000</option>
                    <option value="100001-150000">PKR 100,001 - 150,000</option>
                </select>
            </div>
            
            <!-- Guest Capacity Filter -->
            <div class="col-md-3 mb-3">
                <label class="form-label">Guests</label>
                <select class="form-select" id="guestFilter">
                    <option value="all">Any Number</option>
                    <option value="1-2">1-2 Guests</option>
                    <option value="3-4">3-4 Guests</option>
                </select>
            </div>
            
            <!-- Filter Action Button -->
            <div class="col-md-3 mb-3 d-flex align-items-end">
                <button class="btn btn-warning w-100" onclick="applyFilters()">
                    <i class="fas fa-filter me-2"></i>Apply Filters
                </button>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
    ROOMS GRID SECTION
================================================ -->
<section class="py-5">
    <div class="container">
        <div class="row" id="roomsContainer">
            
            <!-- =====================
                DELUXE ROOM CARD
            ====================== -->
            @include('components.room-card', [
                'image' => 'https://images.unsplash.com/photo-1724166655256-0ae10f1ab89a?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=1471',
                'title' => 'Deluxe Room',
                'description' => 'Spacious room with city view',
                'capacity' => '2',
                'size' => '45 sqm',
                'bedType' => 'King Bed',
                'amenities' => ['Free WiFi', 'Air Conditioning'],
                'price' => 50000
            ])
            
            <!-- =====================
                EXECUTIVE SUITE CARD
            ====================== -->
            @include('components.room-card', [
                'image' => 'https://th.bing.com/th/id/OIP.bjP0G5tF7k9Sg2HlpBSlsAHaE8?o=7&cb=12rm=3&rs=1&pid=ImgDetMain&o=7&rm=3',
                'title' => 'Executive Suite',
                'description' => 'Luxurious suite with separate living area and premium amenities.',
                'capacity' => '3',
                'size' => '75 sqm',
                'bedType' => 'King Bed + Sofa Bed',
                'amenities' => ['Free WiFi', 'Air Conditioning', 'Mini Bar', 'TV'],
                'price' => 70000
            ])
            
            <!-- =====================
                PRESIDENTIAL SUITE CARD
            ====================== -->
            @include('components.room-card', [
                'image' => 'https://tse1.mm.bing.net/th/id/OIP.BJWFYV9UIOqGRyXEBWu5NQHaD7?cb=12&rs=1&pid=ImgDetMain&o=7&rm=3',
                'title' => 'Presidential Suite',
                'description' => 'Ultimate luxury with panoramic views, private balcony, and exclusive services.',
                'capacity' => '4',
                'size' => '120 sqm',
                'bedType' => 'King Bed + 2 Single Beds',
                'amenities' => ['Free WiFi', 'Air Conditioning', 'Mini Bar', 'TV', 'Jacuzzi', 'Private Balcony'],
                'price' => 100000
            ])
            
        </div>
    </div>
</section>

<!-- ============================================
    BOOKING SUMMARY SECTION
================================================ -->
<section class="py-4 bg-warning" id="bookingSummarySection" style="display: none;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h5 class="mb-0">Your Bookings Summary</h5>
                <p class="mb-0">You have <span id="bookingCount" class="fw-bold">0</span> room(s) booked</p>
            </div>
            <div class="col-md-4 text-end">
                <button class="btn btn-dark" onclick="viewBookings()">
                    <i class="fas fa-list me-2"></i>View My Bookings
                </button>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
    JAVASCRIPT FUNCTIONALITY
================================================ -->
<script>
// ============================================
// BOOKING MANAGEMENT FUNCTIONS
// ============================================

/**
 * Initialize bookings array from localStorage or create empty array
 */
let bookings = JSON.parse(localStorage.getItem('hotelBookings')) || [];

/**
 * Book a room and add to localStorage
 * @param {string} roomType - Type of room being booked
 * @param {number} price - Price per night of the room
 * @param {number} nights - Number of nights (default: 1)
 */
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
    updateBookingDisplay();
    alert('Room booked successfully!');
}

/**
 * Update booking count display and show/hide summary section
 */
function updateBookingDisplay() {
    const bookingCount = document.getElementById('bookingCount');
    const bookingSummarySection = document.getElementById('bookingSummarySection');
    
    // Update booking count
    if (bookingCount) {
        bookingCount.textContent = bookings.length;
    }
    
    // Show/hide booking summary section based on bookings
    if (bookingSummarySection) {
        if (bookings.length > 0) {
            bookingSummarySection.style.display = 'block';
        } else {
            bookingSummarySection.style.display = 'none';
        }
    }
}

/**
 * Display all bookings in an alert dialog
 */
function viewBookings() {
    if (bookings.length === 0) {
        alert('You have no bookings yet. Please book a room first.');
        return;
    }
    
    let bookingSummary = 'Your Booking Summary:\n\n';
    let total = 0;
    
    // Build booking summary string
    bookings.forEach((booking, index) => {
        bookingSummary += `${index + 1}. ${booking.roomType} - PKR ${booking.price.toLocaleString()}/night x ${booking.nights} nights = PKR ${(booking.total).toLocaleString()}\n`;
        total += booking.total;
    });
    
    // Add total and confirmation message
    bookingSummary += `\nTotal: PKR ${total.toLocaleString()}`;
    bookingSummary += '\n\nThank you for your booking!';
    
    alert(bookingSummary);
}

// ============================================
// FILTER FUNCTIONS
// ============================================

/**
 * Apply room filters based on user selection
 * Currently shows alert - can be extended for actual filtering
 */
function applyFilters() {
    const roomType = document.getElementById('roomTypeFilter').value;
    const priceRange = document.getElementById('priceFilter').value;
    const guestFilter = document.getElementById('guestFilter').value;
    
    // Build filter message for user feedback
    let filterMessage = `Filters applied:\n`;
    filterMessage += `• Room Type: ${roomType}\n`;
    filterMessage += `• Price Range: ${priceRange}\n`;
    filterMessage += `• Guests: ${guestFilter}`;
    
    alert(filterMessage);
    
    // TODO: Implement actual room filtering logic here
    // const roomCards = document.querySelectorAll('.room-card');
    // roomCards.forEach(card => {
    //     // Filter logic based on selected filters
    // });
}

// ============================================
// UTILITY FUNCTIONS
// ============================================

/**
 * Format price with PKR currency and thousand separators
 * @param {number} price - Price to format
 * @returns {string} Formatted price string
 */
function formatPrice(price) {
    return 'PKR ' + price.toLocaleString();
}

/**
 * Clear all bookings (for testing purposes)
 */
function clearAllBookings() {
    if (confirm('Are you sure you want to clear all bookings?')) {
        localStorage.removeItem('hotelBookings');
        bookings = [];
        updateBookingDisplay();
        alert('All bookings cleared!');
    }
}

// ============================================
// PAGE INITIALIZATION
// ============================================

/**
 * Initialize page when DOM is fully loaded
 */
document.addEventListener('DOMContentLoaded', function() {
    // Update booking display on page load
    updateBookingDisplay();
    
    // Add event listeners for real-time filter updates
    document.getElementById('roomTypeFilter').addEventListener('change', applyFilters);
    document.getElementById('priceFilter').addEventListener('change', applyFilters);
    document.getElementById('guestFilter').addEventListener('change', applyFilters);
});

</script>

<!-- ============================================
    PAGE SPECIFIC STYLES
================================================ -->
<style>
/* Room card animations and effects */
.room-card {
    transition: all 0.3s ease;
    margin-bottom: 20px;
}

.room-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
}

/* Price display styling */
.price-tag {
    font-size: 1.5rem;
    font-weight: bold;
    color: #ffc107;
}

/* Amenity badges styling */
.amenity-badge {
    font-size: 0.8rem;
    margin: 2px;
}

/* Booking summary positioning */
.booking-summary {
    position: sticky;
    bottom: 0;
    z-index: 100;
}
</style>
@endsection
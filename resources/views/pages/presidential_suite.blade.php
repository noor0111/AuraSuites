@extends('layouts.app')

@section('title', 'Presidential Suite - Aura Suites')

@section('content')
    <!-- Page Header -->
    <section class="bg-dark text-white py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="display-4">Presidential Suite</h1>
                    <p class="lead">Ultimate Luxury Experience with Panoramic City Views</p>
                </div>
                <div class="col-md-4 text-end">
                    <div class="h2 text-warning">PKR 100,000</div>
                    <small class="text-white-50">per night</small>
                </div>
            </div>
        </div>
    </section>

    <!-- Room Gallery -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <!-- Main Image -->
                    <div class="mb-4">
                        <img src="https://tse1.mm.bing.net/th/id/OIP.BJWFYV9UIOqGRyXEBWu5NQHaD7?cb=12&rs=1&pid=ImgDetMain&o=7&rm=3"
                            class="img-fluid rounded-3 w-100" alt="Presidential Suite"
                            style="height: 400px; object-fit: cover;">
                    </div>

                    <!-- Image Gallery -->
                    <div class="row g-3">
                        <div class="col-4">
                            <img src="https://images.unsplash.com/photo-1586105251261-72a756497a11?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
                                class="img-fluid rounded-3" alt="Living Area"
                                style="height: 150px; width: 100%; object-fit: cover;">
                        </div>
                        <div class="col-4">
                            <img src="https://images.unsplash.com/photo-1566665797739-1674de7a421a?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
                                class="img-fluid rounded-3" alt="Bedroom"
                                style="height: 150px; width: 100%; object-fit: cover;">
                        </div>
                        <div class="col-4">
                            <img src="https://images.unsplash.com/photo-1582582494705-f8ce0b0c24f0?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
                                class="img-fluid rounded-3" alt="Bathroom"
                                style="height: 150px; width: 100%; object-fit: cover;">
                        </div>
                    </div>

                    <!-- Room Details -->
                    <div class="row mt-5">
                        <div class="col-12">
                            <h3 class="mb-4">Suite Details</h3>

                            <div class="row">
                                <div class="col-md-6">
                                    <h5><i class="fas fa-home me-2 text-warning"></i>Room Features</h5>
                                    <ul class="list-unstyled">
                                        <li><i class="fas fa-check text-success me-2"></i> 120 sqm of Luxury Space</li>
                                        <li><i class="fas fa-check text-success me-2"></i> Private Balcony with City View
                                        </li>
                                        <li><i class="fas fa-check text-success me-2"></i> Separate Living & Dining Area
                                        </li>
                                        <li><i class="fas fa-check text-success me-2"></i> King Size Four-Poster Bed</li>
                                        <li><i class="fas fa-check text-success me-2"></i> Walk-in Closet</li>
                                        <li><i class="fas fa-check text-success me-2"></i> Marble Bathroom with Jacuzzi</li>
                                        <li><i class="fas fa-check text-success me-2"></i> Private Study Room</li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <h5><i class="fas fa-star me-2 text-warning"></i>Premium Amenities</h5>
                                    <ul class="list-unstyled">
                                        <li><i class="fas fa-hot-tub text-warning me-2"></i> Jacuzzi with Chromatherapy</li>
                                        <li><i class="fas fa-tv text-warning me-2"></i> 65" 4K Smart TV</li>
                                        <li><i class="fas fa-wifi text-warning me-2"></i> High-Speed WiFi</li>
                                        <li><i class="fas fa-wine-glass-alt text-warning me-2"></i> Premium Mini Bar</li>
                                        <li><i class="fas fa-concierge-bell text-warning me-2"></i> 24/7 Personal Butler
                                        </li>
                                        <li><i class="fas fa-utensils text-warning me-2"></i> Private Chef Service</li>
                                        <li><i class="fas fa-car text-warning me-2"></i> Chauffeur Service</li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Special Services -->
                            <div class="mt-4">
                                <h5><i class="fas fa-crown me-2 text-warning"></i>Exclusive Services</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card border-0 bg-light mb-3">
                                            <div class="card-body">
                                                <h6><i class="fas fa-spa text-warning me-2"></i>In-Suite Spa</h6>
                                                <p class="small mb-0">Private spa treatments in your suite</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card border-0 bg-light mb-3">
                                            <div class="card-body">
                                                <h6><i class="fas fa-dumbbell text-warning me-2"></i>Private Gym Access</h6>
                                                <p class="small mb-0">Exclusive gym access during your stay</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <!-- Booking Card -->
                    <div class="card shadow sticky-top" style="top: 20px;">
                        <div class="card-header bg-dark text-white">
                            <h5 class="mb-0"><i class="fas fa-calendar-check me-2"></i>Book This Suite</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Number of Nights</label>
                                <div class="input-group">
                                    <button class="btn btn-outline-warning" type="button" id="decreaseNights">-</button>
                                    <input type="number" class="form-control text-center" id="presidentialNights" value="1"
                                        min="1" max="30">
                                    <button class="btn btn-outline-warning" type="button" id="increaseNights">+</button>
                                </div>
                            </div>

                            <div class="price-breakdown mb-3">
                                <div class="d-flex justify-content-between small mb-2">
                                    <span>PKR 100,000 x <span id="nightsCount">1</span> night(s)</span>
                                    <span>PKR <span id="subtotal">100,000</span></span>
                                </div>
                                <div class="d-flex justify-content-between small text-muted mb-2">
                                    <span>Tax (5%)</span>
                                    <span>PKR <span id="taxAmount">5,000</span></span>
                                </div>
                                <div class="d-flex justify-content-between small text-muted mb-2">
                                    <span>Service Charge (10%)</span>
                                    <span>PKR <span id="serviceAmount">10,000</span></span>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between fw-bold">
                                    <span>Total</span>
                                    <span class="h5 text-warning">PKR <span id="totalAmount">115,000</span></span>
                                </div>
                            </div>

                            <button class="btn btn-warning w-100 btn-lg" id="bookPresidentialBtn">
                                <i class="fas fa-calendar-check me-2"></i>Book Presidential Suite
                            </button>

                            <div class="mt-3 text-center">
                                <small class="text-muted">
                                    <i class="fas fa-shield-alt me-1"></i>
                                    Free cancellation up to 48 hours before check-in
                                </small>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Facts -->
                    <div class="card shadow mt-4">
                        <div class="card-body">
                            <h6><i class="fas fa-info-circle me-2 text-warning"></i>Quick Facts</h6>
                            <div class="small">
                                <div class="d-flex justify-content-between py-1 border-bottom">
                                    <span>Room Size</span>
                                    <span class="fw-bold">120 sqm</span>
                                </div>
                                <div class="d-flex justify-content-between py-1 border-bottom">
                                    <span>Guests</span>
                                    <span class="fw-bold">Up to 4</span>
                                </div>
                                <div class="d-flex justify-content-between py-1 border-bottom">
                                    <span>Bed Type</span>
                                    <span class="fw-bold">King + 2 Singles</span>
                                </div>
                                <div class="d-flex justify-content-between py-1">
                                    <span>Check-in</span>
                                    <span class="fw-bold">2:00 PM</span>
                                </div>
                                <div class="d-flex justify-content-between py-1">
                                    <span>Check-out</span>
                                    <span class="fw-bold">12:00 PM</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Presidential Suite Booking Logic
        document.addEventListener('DOMContentLoaded', function () {
            // Initialize pricing
            updatePresidentialPricing();

            // Event listeners for buttons
            document.getElementById('increaseNights').addEventListener('click', function () {
                changePresidentialNights(1);
            });

            document.getElementById('decreaseNights').addEventListener('click', function () {
                changePresidentialNights(-1);
            });

            document.getElementById('presidentialNights').addEventListener('change', function () {
                updatePresidentialPricing();
            });

            document.getElementById('bookPresidentialBtn').addEventListener('click', bookPresidentialSuite);
        });

        function changePresidentialNights(change) {
            const input = document.getElementById('presidentialNights');
            let newValue = parseInt(input.value) + change;

            if (newValue >= 1 && newValue <= 30) {
                input.value = newValue;
                updatePresidentialPricing();
            }
        }

        function updatePresidentialPricing() {
            const nights = parseInt(document.getElementById('presidentialNights').value);
            const pricePerNight = 100000;
            const subtotal = pricePerNight * nights;
            const tax = subtotal * 0.05;
            const service = subtotal * 0.1;
            const total = subtotal + tax + service;

            document.getElementById('nightsCount').textContent = nights;
            document.getElementById('subtotal').textContent = subtotal.toLocaleString();
            document.getElementById('taxAmount').textContent = tax.toLocaleString();
            document.getElementById('serviceAmount').textContent = service.toLocaleString();
            document.getElementById('totalAmount').textContent = total.toLocaleString();
        }

        function bookPresidentialSuite() {
            const nights = parseInt(document.getElementById('presidentialNights').value);

            // Check if bookRoom function exists (from global scripts)
            if (typeof bookRoom === 'function') {
                bookRoom('Presidential Suite', 100000, nights);
            } else {
                // Fallback if global function not available
                let bookings = JSON.parse(localStorage.getItem('hotelBookings')) || [];
                const booking = {
                    roomType: 'Presidential Suite',
                    price: 100000,
                    nights: nights,
                    total: 100000 * nights,
                    bookingId: Date.now()
                };
                bookings.push(booking);
                localStorage.setItem('hotelBookings', JSON.stringify(bookings));

                // Show success modal
                if (typeof showBookingModal === 'function') {
                    showBookingModal('Presidential Suite', 100000);
                }

                // Update booking display if function exists
                if (typeof updateBookingDisplay === 'function') {
                    updateBookingDisplay();
                }
                if (typeof updateGlobalBookingCount === 'function') {
                    updateGlobalBookingCount();
                }
            }
        }
    </script>

    <style>
        .sticky-top {
            position: sticky;
            z-index: 100;
        }

        .card {
            border: none;
            border-radius: 15px;
        }

        .card-header {
            border-radius: 15px 15px 0 0 !important;
        }

        .img-fluid {
            border-radius: 10px;
        }

        .price-breakdown {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 10px;
        }

        .btn-warning {
            background-color: #5d4037;
            border-color: #5d4037;
            color: white;
        }

        .btn-warning:hover {
            background-color: #a1887f;
            border-color: #a1887f;
        }
    </style>
@endsection
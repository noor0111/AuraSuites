@extends('layouts.app')

@section('title', $room->title . ' - Aura Suites')

@section('content')
    <!-- Page Header -->
    <section class="bg-dark text-white py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="display-4">{{ $room->title }}</h1>
                    <p class="lead">{{ Str::limit($room->description, 100) }}</p>
                </div>
                <div class="col-md-4 text-end">
                    <div class="h2 text-warning">PKR {{ number_format($room->price, 2) }}</div>
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
                        <img src="{{ $room->image_url }}" 
                             class="img-fluid rounded-3 w-100" 
                             alt="{{ $room->title }}" 
                             style="height: 400px; object-fit: cover;"
                             onerror="this.src='https://via.placeholder.com/800x400?text=Room+Image'">
                    </div>

                    <!-- Room Details -->
                    <div class="row mt-5">
                        <div class="col-12">
                            <h3 class="mb-4">Room Details</h3>
                            <p class="lead">{{ $room->description }}</p>

                            <div class="row mt-4">
                                <div class="col-md-6">
                                    <h5><i class="fas fa-home me-2 text-warning"></i>Room Features</h5>
                                    <ul class="list-unstyled">
                                        <li><i class="fas fa-check text-success me-2"></i> {{ $room->size }} of Space</li>
                                        <li><i class="fas fa-check text-success me-2"></i> Accommodates up to {{ $room->capacity }} Guests</li>
                                        <li><i class="fas fa-check text-success me-2"></i> {{ $room->bed_type }}</li>
                                        @if($room->is_available)
                                            <li><i class="fas fa-check text-success me-2"></i> Available Now</li>
                                        @else
                                            <li><i class="fas fa-times text-danger me-2"></i> Currently Unavailable</li>
                                        @endif
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <h5><i class="fas fa-star me-2 text-warning"></i>Amenities</h5>
                                    <ul class="list-unstyled">
                                        @foreach($room->amenities as $amenity)
                                            <li><i class="fas fa-check text-warning me-2"></i> {{ $amenity }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <!-- Booking Card -->
                    <div class="card shadow sticky-top" style="top: 20px;">
                        <div class="card-header bg-dark text-white">
                            <h5 class="mb-0"><i class="fas fa-calendar-check me-2"></i>Book This Room</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Number of Nights</label>
                                <div class="input-group">
                                    <button class="btn btn-outline-warning" type="button" id="decreaseNights">-</button>
                                    <input type="number" class="form-control text-center" id="roomNights" value="1" min="1" max="30">
                                    <button class="btn btn-outline-warning" type="button" id="increaseNights">+</button>
                                </div>
                            </div>

                            <div class="price-breakdown mb-3">
                                <div class="d-flex justify-content-between small mb-2">
                                    <span>PKR {{ number_format($room->price) }} x <span id="nightsCount">1</span> night(s)</span>
                                    <span>PKR <span id="subtotal">{{ number_format($room->price) }}</span></span>
                                </div>
                                <div class="d-flex justify-content-between small text-muted mb-2">
                                    <span>Tax (5%)</span>
                                    <span>PKR <span id="taxAmount">{{ number_format($room->price * 0.05) }}</span></span>
                                </div>
                                <div class="d-flex justify-content-between small text-muted mb-2">
                                    <span>Service Charge (10%)</span>
                                    <span>PKR <span id="serviceAmount">{{ number_format($room->price * 0.1) }}</span></span>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between fw-bold">
                                    <span>Total</span>
                                    <span class="h5 text-warning">PKR <span id="totalAmount">{{ number_format($room->price * 1.15) }}</span></span>
                                </div>
                            </div>

                            @if($room->is_available)
                                <button class="btn btn-warning w-100 btn-lg" id="bookRoomBtn" onclick="bookRoomDetail('{{ $room->title }}', {{ $room->price }})">
                                    <i class="fas fa-calendar-check me-2"></i>Book {{ $room->title }}
                                </button>
                            @else
                                <button class="btn btn-secondary w-100 btn-lg" disabled>
                                    <i class="fas fa-times me-2"></i>Not Available
                                </button>
                            @endif

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
                                    <span class="fw-bold">{{ $room->size }}</span>
                                </div>
                                <div class="d-flex justify-content-between py-1 border-bottom">
                                    <span>Guests</span>
                                    <span class="fw-bold">Up to {{ $room->capacity }}</span>
                                </div>
                                <div class="d-flex justify-content-between py-1 border-bottom">
                                    <span>Bed Type</span>
                                    <span class="fw-bold">{{ $room->bed_type }}</span>
                                </div>
                                <div class="d-flex justify-content-between py-1 border-bottom">
                                    <span>Price per Night</span>
                                    <span class="fw-bold">PKR {{ number_format($room->price) }}</span>
                                </div>
                                <div class="d-flex justify-content-between py-1">
                                    <span>Status</span>
                                    <span class="fw-bold {{ $room->is_available ? 'text-success' : 'text-danger' }}">
                                        {{ $room->is_available ? 'Available' : 'Unavailable' }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Room Detail Booking Logic
        document.addEventListener('DOMContentLoaded', function () {
            const pricePerNight = {{ $room->price }};
            
            // Initialize pricing
            updateRoomPricing();

            // Event listeners for buttons
            document.getElementById('increaseNights').addEventListener('click', function () {
                changeRoomNights(1);
            });

            document.getElementById('decreaseNights').addEventListener('click', function () {
                changeRoomNights(-1);
            });

            document.getElementById('roomNights').addEventListener('change', function () {
                updateRoomPricing();
            });

            function changeRoomNights(change) {
                const input = document.getElementById('roomNights');
                let newValue = parseInt(input.value) + change;

                if (newValue >= 1 && newValue <= 30) {
                    input.value = newValue;
                    updateRoomPricing();
                }
            }

            function updateRoomPricing() {
                const nights = parseInt(document.getElementById('roomNights').value);
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
        });

        function bookRoomDetail(roomTitle, price) {
            const nights = parseInt(document.getElementById('roomNights').value) || 1;

            // Use the global bookRoom function which shows the modal and updates cart
            if (typeof bookRoom === 'function') {
                bookRoom(roomTitle, price, nights);
            } else {
                // Fallback if global function not available
                let bookings = JSON.parse(localStorage.getItem('hotelBookings')) || [];
                const booking = {
                    roomType: roomTitle,
                    price: price,
                    nights: nights,
                    total: price * nights,
                    bookingId: Date.now()
                };
                bookings.push(booking);
                localStorage.setItem('hotelBookings', JSON.stringify(bookings));
                
                if (typeof updateGlobalBookingCount === 'function') {
                    updateGlobalBookingCount();
                }
                
                if (typeof showBookingModal === 'function') {
                    showBookingModal(roomTitle, price);
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


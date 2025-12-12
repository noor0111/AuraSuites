@extends('layouts.app')

@section('title', 'Home - Aura Suites')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center text-white">
                    <h1 class="display-3 fw-bold mb-4">Welcome to Aura Suites</h1>
                    <p class="lead mb-4">Experience Luxury and Comfort in the Heart of the City</p>
                    <div class="d-flex gap-3 justify-content-center flex-wrap">
                        <a href="/rooms" class="btn btn-warning btn-lg">
                            <i class="fas fa-bed me-2"></i>View Our Rooms
                        </a>
                        <a href="/booking" class="btn btn-outline-light btn-lg">
                            <i class="fas fa-calendar-check me-2"></i>Book Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2 class="mb-4">Luxury Redefined</h2>
                    <p class="lead">At Aura Suites, we believe that every guest deserves an exceptional experience. Our carefully designed rooms and suites offer the perfect blend of comfort, elegance, and modern amenities.</p>
                    <p>Whether you're traveling for business or leisure, our dedicated team is committed to making your stay memorable. From our premium accommodations to our world-class service, every detail is crafted to exceed your expectations.</p>
                    <a href="/contact" class="btn btn-warning mt-3">
                        <i class="fas fa-envelope me-2"></i>Contact Us
                    </a>
                </div>
                <div class="col-md-6">
                    <div class="row g-3">
                        <div class="col-6">
                            <div class="card border-0 shadow-sm h-100 text-center p-4">
                                <i class="fas fa-bed service-icon"></i>
                                <h5>Luxury Rooms</h5>
                                <p class="text-muted small mb-0">Elegantly designed accommodations</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card border-0 shadow-sm h-100 text-center p-4">
                                <i class="fas fa-concierge-bell service-icon"></i>
                                <h5>24/7 Service</h5>
                                <p class="text-muted small mb-0">Round-the-clock assistance</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card border-0 shadow-sm h-100 text-center p-4">
                                <i class="fas fa-wifi service-icon"></i>
                                <h5>Free WiFi</h5>
                                <p class="text-muted small mb-0">High-speed internet access</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card border-0 shadow-sm h-100 text-center p-4">
                                <i class="fas fa-parking service-icon"></i>
                                <h5>Parking</h5>
                                <p class="text-muted small mb-0">Complimentary parking available</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Rooms -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="mb-3">Featured Rooms</h2>
                <p class="lead text-muted">Discover our handpicked selection of luxurious accommodations</p>
            </div>

            @if($rooms->count() > 0)
                <div class="row">
                    @foreach ($rooms->take(3) as $room)
                        <div class="col-md-4 mb-4">
                            <a style="text-decoration:none; color:inherit;" href="{{ route('rooms.show', $room->id) }}">
                                <div class="card room-card h-100 shadow">
                                    <img src="{{ $room->image_url }}" 
                                         class="card-img-top" 
                                         alt="{{ $room->title }}" 
                                         style="height:200px; object-fit:cover;"
                                         onerror="this.src='https://via.placeholder.com/400x200?text=Room+Image'">

                                    <div class="card-body">
                                        <h5 class="card-title">{{ $room->title }}</h5>
                                        <p class="card-text">{{ Str::limit($room->description, 100) }}</p>

                                        <ul class="list-unstyled">
                                            <li><i class="fas fa-user me-2"></i> {{ $room->capacity }} Guests</li>
                                            <li><i class="fas fa-ruler-combined me-2"></i> {{ $room->size }}</li>
                                            <li><i class="fas fa-bed me-2"></i> {{ $room->bed_type }}</li>
                                        </ul>

                                        <div class="amenities mb-3">
                                            @foreach(array_slice($room->amenities, 0, 3) as $amenity)
                                                <span class="badge bg-light text-dark me-1 mb-1">{{ $amenity }}</span>
                                            @endforeach
                                            @if(count($room->amenities) > 3)
                                                <span class="badge bg-light text-dark me-1 mb-1">+{{ count($room->amenities) - 3 }} more</span>
                                            @endif
                                        </div>

                                        <div class="d-flex justify-content-between align-items-center mt-3">
                                            <div>
                                                <span class="h5 text-warning">PKR {{ number_format($room->price) }}</span>
                                                <span class="text-muted">/night</span>
                                            </div>
                                            <span class="btn btn-sm btn-outline-warning">
                                                View Details <i class="fas fa-arrow-right ms-1"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

                <div class="text-center mt-4">
                    <a href="/rooms" class="btn btn-warning btn-lg">
                        <i class="fas fa-bed me-2"></i>View All Rooms & Prices
                    </a>
                </div>
            @else
                <div class="text-center py-5">
                    <i class="fas fa-bed fa-4x text-muted mb-3"></i>
                    <h3 class="text-muted">No Rooms Available</h3>
                    <p class="text-muted">We're currently updating our room inventory. Please check back later.</p>
                    <a href="/contact" class="btn btn-warning mt-3">
                        <i class="fas fa-phone me-2"></i>Contact Us for Availability
                    </a>
                </div>
            @endif
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="py-5 bg-dark text-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h2 class="mb-3">Ready to Book Your Stay?</h2>
                    <p class="lead mb-0">Experience the perfect blend of luxury and comfort. Book your room today and enjoy our special amenities and world-class service.</p>
                </div>
                <div class="col-md-4 text-end">
                    <a href="/booking" class="btn btn-warning btn-lg">
                        <i class="fas fa-calendar-check me-2"></i>Book Now
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('layouts.app')

@section('title', 'AURA SUITES - Luxury Hotel in Karachi')

@section('content')
<!-- Hero Section -->
<section class="hero-section d-flex align-items-center">
    <div class="container text-center">
        <h1 class="display-3 fw-bold mb-4 text-white">WELCOME TO AURA SUITES</h1>
        <p class="lead mb-4 text-white">Experience Luxury Redefined in the Heart of Karachi</p>
        <!-- Removed the Book Now button -->
    </div>
</section>

<!-- Services Section -->
<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-5">Our Services</h2>
        <div class="row">
            @include('components.service-card', [
                'icon' => 'fas fa-swimming-pool',
                'title' => 'Swimming Pool',
                'description' => 'Luxurious outdoor pool with stunning views'
            ])
            @include('components.service-card', [
                'icon' => 'fas fa-spa',
                'title' => 'Spa & Wellness',
                'description' => 'Relaxing spa treatments and wellness programs'
            ])
            @include('components.service-card', [
                'icon' => 'fas fa-utensils',
                'title' => 'Fine Dining',
                'description' => 'Exquisite culinary experiences'
            ])
        </div>
    </div>
</section>

<!-- Featured Rooms -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-5">Featured Rooms</h2>
        <div class="row">
            <!-- Deluxe Room without price and book button -->
            <div class="col-md-4 mb-4">
                <div class="card room-card h-100 shadow">
                    <img src="https://images.unsplash.com/photo-1724166655256-0ae10f1ab89a?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=1471" class="card-img-top" alt="Deluxe Room" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">Deluxe Room</h5>
                        <p class="card-text">Spacious room with city view</p>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-user me-2"></i> 2 Guests</li>
                            <li><i class="fas fa-ruler-combined me-2"></i> 45 sqm</li>
                            <li><i class="fas fa-bed me-2"></i> King Bed</li>
                        </ul>
                        <div class="amenities mb-3">
                            <span class="badge bg-light text-dark me-1 mb-1">Free WiFi</span>
                            <span class="badge bg-light text-dark me-1 mb-1">Air Conditioning</span>
                            <span class="badge bg-light text-dark me-1 mb-1">Mini Bar</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Executive Suite without price and book button -->
            <div class="col-md-4 mb-4">
                <div class="card room-card h-100 shadow">
                    <img src="https://images.unsplash.com/photo-1586023492125-27b2c045efd7" class="card-img-top" alt="Executive Suite" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">Executive Suite</h5>
                        <p class="card-text">Luxurious suite with separate living area</p>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-user me-2"></i> 3 Guests</li>
                            <li><i class="fas fa-ruler-combined me-2"></i> 75 sqm</li>
                            <li><i class="fas fa-bed me-2"></i> King Bed + Sofa</li>
                        </ul>
                        <div class="amenities mb-3">
                            <span class="badge bg-light text-dark me-1 mb-1">Free WiFi</span>
                            <span class="badge bg-light text-dark me-1 mb-1">Air Conditioning</span>
                            <span class="badge bg-light text-dark me-1 mb-1">Mini Bar</span>
                            <span class="badge bg-light text-dark me-1 mb-1">Jacuzzi</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Presidential Suite without price and book button -->
            <div class="col-md-4 mb-4">
                <div class="card room-card h-100 shadow">
                    <img src="https://tse1.mm.bing.net/th/id/OIP.BJWFYV9UIOqGRyXEBWu5NQHaD7?cb=12&rs=1&pid=ImgDetMain&o=7&rm=3" class="card-img-top" alt="Presidential Suite" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">Presidential Suite</h5>
                        <p class="card-text">Ultimate luxury with panoramic views, private balcony, and exclusive services.</p>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-user me-2"></i> 4 Guests</li>
                            <li><i class="fas fa-ruler-combined me-2"></i> 120 sqm</li>
                            <li><i class="fas fa-bed me-2"></i> King Bed + 2 Single Beds</li>
                        </ul>
                        <div class="amenities mb-3">
                            <span class="badge bg-light text-dark me-1 mb-1">Free WiFi</span>
                            <span class="badge bg-light text-dark me-1 mb-1">Air Conditioning</span>
                            <span class="badge bg-light text-dark me-1 mb-1">Mini Bar</span>
                            <span class="badge bg-light text-dark me-1 mb-1">TV</span>
                            <span class="badge bg-light text-dark me-1 mb-1">Jacuzzi</span>
                            <span class="badge bg-light text-dark me-1 mb-1">Private Balcony</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <a href="/rooms" class="btn btn-warning btn-lg">View All Rooms & Prices</a>
        </div>
    </div>
</section>
<!-- Reviews Section -->
<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-5">Guest Reviews</h2>
        <div class="row">
            @include('components.review-card', [
                'name' => 'Sarah Johnson',
                'location' => 'London, UK',
                'rating' => 5,
                'review' => 'Absolutely stunning hotel with exceptional service. Will definitely return!'
            ])
            @include('components.review-card', [
                'name' => 'Ahmed Raza',
                'location' => 'Dubai, UAE',
                'rating' => 5,
                'review' => 'The perfect blend of luxury and comfort. Highly recommended!'
            ])
            @include('components.review-card', [
                'name' => 'Maria Garcia',
                'location' => 'Madrid, Spain',
                'rating' => 4,
                'review' => 'Beautiful rooms and amazing staff. Great location with sea view.'
            ])
        </div>
    </div>
</section>
@endsection
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Aura Suites - Luxury Hotel')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
    :root {
        --beige: #f5f1e6;
        --light-brown: #d7ccc8;
        --warm-brown: #a1887f;
        --dark-brown: #5d4037;
        --accent-gold: #c9a96e;
    }
    
    body {
        background-color: var(--beige);
        font-family: 'Georgia', serif;
    }
    
    .hero-section {
        background: linear-gradient(rgba(93, 64, 55, 0.7), rgba(161, 136, 127, 0.8)), url('https://images.unsplash.com/photo-1566073771259-6a8506099945');
        background-size: cover;
        background-position: center;
        height: 70vh;
        color: white;
    }
    
    /* Buttons */
    .btn-warning {
        background-color: var(--dark-brown);
        border-color: var(--dark-brown);
        color: white;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    
    .btn-warning:hover {
        background-color: var(--warm-brown);
        border-color: var(--warm-brown);
        transform: translateY(-2px);
    }
    
    .btn-outline-warning {
        border-color: var(--dark-brown);
        color: var(--dark-brown);
    }
    
    .btn-outline-warning:hover {
        background-color: var(--dark-brown);
        color: white;
    }
    
    /* Text colors */
    .text-warning {
        color: var(--dark-brown) !important;
    }
    
    .bg-warning {
        background-color: var(--dark-brown) !important;
        color: white;
    }
    
    /* Service icons */
    .service-icon {
        font-size: 2.5rem;
        color: var(--dark-brown);
        margin-bottom: 15px;
    }
    
    /* Room cards */
    .room-card {
        transition: transform 0.3s ease;
        border: none;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(93, 64, 55, 0.1);
    }
    
    .room-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 30px rgba(93, 64, 55, 0.15);
    }
    
    /* Navigation */
    .navbar {
        background-color: white !important;
        box-shadow: 0 2px 10px rgba(93, 64, 55, 0.1);
    }
    
    .nav-link {
        color: var(--dark-brown) !important;
        font-weight: 500;
    }
    
    .nav-link.active {
        color: var(--accent-gold) !important;
        font-weight: 600;
    }
    
    /* Headers */
    h1, h2, h3, h4, h5, h6 {
        color: var(--dark-brown);
        font-weight: 600;
    }
    
    /* Sections */
    .bg-light {
        background-color: var(--light-brown) !important;
    }
    
    /* Footer */
    footer {
        background-color: var(--dark-brown) !important;
    }
    
    /* Badges */
    .badge.bg-light {
        background-color: var(--light-brown) !important;
        color: var(--dark-brown);
    }
    
    /* Cards */
    .card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(93, 64, 55, 0.1);
    }
    
    .card-header {
        background-color: var(--dark-brown);
        color: white;
        border: none;
    }
    
    /* Form elements */
    .form-control:focus {
        border-color: var(--warm-brown);
        box-shadow: 0 0 0 0.2rem rgba(161, 136, 127, 0.25);
    }
    
    /* Review stars */
    .text-warning i {
        color: var(--accent-gold) !important;
    }
    </style>
</head>
<body>
    @include('layouts.partials.header')
    @include('layouts.partials.navigation')

    <main>
        @yield('content')
    </main>

    @include('layouts.partials.footer')
    @include('layouts.partials.scripts')
</body>
</html>
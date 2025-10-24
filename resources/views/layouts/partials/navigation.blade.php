<li class="nav-item">
    <a class="nav-link {{ Request::is('booking') ? 'active fw-bold' : '' }}" href="/booking">
        <i class="fas fa-shopping-cart me-1"></i>
        My Bookings 
        <span class="badge bg-warning booking-count">0</span>
    </a>
</li>

<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? 'active fw-bold' : '' }}" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('rooms') ? 'active fw-bold' : '' }}" href="/rooms">Rooms & Suites</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('contact') ? 'active fw-bold' : '' }}" href="/contact">Contact</a>
                </li>
            </ul>
            <div class="d-flex">
                <a href="/rooms" class="btn btn-warning">
                    <i class="fas fa-calendar-check me-2"></i>Book Now
                </a>
            </div>
        </div>
    </div>
</nav>
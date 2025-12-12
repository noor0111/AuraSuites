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
                
                <!-- UPDATED: Rooms dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ Request::is('rooms*') ? 'active fw-bold' : '' }}" href="#" role="button" data-bs-toggle="dropdown">
                        Rooms & Suites
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg-end" style="min-width: 300px;">
                        <li><a class="dropdown-item fw-bold" href="/rooms">
                            <i class="fas fa-list me-2"></i>All Rooms
                        </a></li>
                        <li><hr class="dropdown-divider"></li>
                        @php
                            $featuredRooms = \App\Models\Room::where('is_available', true)->take(2)->get();
                        @endphp
                        @if($featuredRooms->count() > 0)
                            @foreach($featuredRooms as $room)
                                <li>
                                    <a class="dropdown-item" href="{{ route('rooms.show', $room->id) }}" style="padding: 0;">
                                        <div class="d-flex align-items-center p-2">
                                            <img src="{{ $room->image_url }}" 
                                                 alt="{{ $room->title }}" 
                                                 class="rounded me-3" 
                                                 style="width: 60px; height: 60px; object-fit: cover;"
                                                 onerror="this.src='https://via.placeholder.com/60x60?text=Room'">
                                            <div class="flex-grow-1">
                                                <div class="fw-bold small">{{ $room->title }}</div>
                                                <div class="text-muted small">
                                                    <i class="fas fa-user me-1"></i>{{ $room->capacity }} Guests
                                                    <span class="ms-2">
                                                        <i class="fas fa-bed me-1"></i>{{ $room->bed_type }}
                                                    </span>
                                                </div>
                                                <div class="text-warning small fw-bold">
                                                    PKR {{ number_format($room->price) }}/night
                                                </div>
                                            </div>
                                            <i class="fas fa-chevron-right text-muted ms-2"></i>
                                        </div>
                                    </a>
                                </li>
                                @if(!$loop->last)
                                    <li><hr class="dropdown-divider my-1"></li>
                                @endif
                            @endforeach
                        @else
                            <li><a class="dropdown-item text-muted" href="/rooms">No rooms available</a></li>
                        @endif
                    </ul>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('contact') ? 'active fw-bold' : '' }}" href="/contact">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('booking') ? 'active fw-bold' : '' }}" href="/booking">
                        <i class="fas fa-shopping-cart me-1"></i>
                        My Bookings 
                        <span class="badge bg-warning booking-count">0</span>
                    </a>
                </li>
            </ul>
            <div class="d-flex align-items-center">
                <!-- Search Bar -->
                <div class="position-relative me-3" style="width: 100%; max-width: 300px;">
                    <div class="position-relative">
                        <i class="fas fa-search position-absolute text-muted" 
                           style="left: 12px; top: 50%; transform: translateY(-50%); z-index: 1;"></i>
                        <input type="text" 
                               class="form-control ps-5" 
                               id="roomSearchInput" 
                               placeholder="Search rooms..." 
                               autocomplete="off">
                    </div>
                    <div id="searchResults" class="position-absolute w-100 bg-white shadow-lg rounded mt-1 border" 
                         style="max-height: 400px; overflow-y: auto; display: none; z-index: 1050;">
                        <!-- Results will be populated here via AJAX -->
                    </div>
                </div>
                <a href="/rooms" class="btn btn-warning">
                    <i class="fas fa-calendar-check me-2"></i>Book Now
                </a>
            </div>
        </div>
    </div>
</nav>
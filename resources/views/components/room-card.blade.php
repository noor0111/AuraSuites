<div class="col-md-4 mb-4">
    <div class="card room-card h-100 shadow">
        <img src="{{ $image }}" class="card-img-top" alt="{{ $title }}" style="height: 200px; object-fit: cover;">
        <div class="card-body">
            <h5 class="card-title">{{ $title }}</h5>
            <p class="card-text">{{ $description }}</p>
            <ul class="list-unstyled">
                <li><i class="fas fa-user me-2"></i> {{ $capacity }} Guests</li>
                <li><i class="fas fa-ruler-combined me-2"></i> {{ $size }}</li>
                <li><i class="fas fa-bed me-2"></i> {{ $bedType }}</li>
            </ul>
            <div class="amenities mb-3">
                @foreach($amenities as $amenity)
                <span class="badge bg-light text-dark me-1 mb-1">{{ $amenity }}</span>
                @endforeach
            </div>
            
            <!-- Quantity/Nights Selection - FIXED -->
            <div class="nights-selection mb-3" data-price="{{ $price }}">
                <label class="form-label small">Number of Nights:</label>
                <div class="input-group input-group-sm">
                    <button class="btn btn-outline-warning" type="button" onclick="decreaseNights(this)">-</button>
                    <input type="number" class="form-control text-center" value="1" min="1" max="30" 
                           onchange="updateTotal(this, {{ $price }})">
                    <button class="btn btn-outline-warning" type="button" onclick="increaseNights(this)">+</button>
                </div>
                <div class="mt-2">
                    <small class="text-muted">Total: <span class="fw-bold text-warning total-price">PKR {{ number_format($price) }}</span></small>
                </div>
            </div>
            
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <span class="h5 text-warning">PKR {{ number_format($price) }}</span>
                    <span class="text-muted">/night</span>
                </div>
                <button class="btn btn-warning" onclick="bookRoomWithNights('{{ $title }}', {{ $price }}, this)">
                    <i class="fas fa-calendar-check me-1"></i> Book Now
                </button>
            </div>
        </div>
    </div>
</div>
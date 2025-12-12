@extends('layouts.app')

@section('title', 'Rooms & Suites - Aura Suites')

@section('content')
<!-- Page Header -->
<section class="bg-dark text-white py-5">
    <div class="container">
        <h1 class="text-center">Rooms & Suites</h1>
        <p class="text-center lead">Choose from our luxurious accommodation options</p>
    </div>
</section>

<!-- Rooms Grid -->
<section class="py-5">
    <div class="container">
        @if($rooms->count() > 0)
            <div class="row" id="roomsContainer">
                @foreach($rooms as $room)
                    @include('components.room-card', [
                        'image' => $room->image_url,
                        'title' => $room->title,
                        'description' => $room->description,
                        'capacity' => $room->capacity,
                        'size' => $room->size,
                        'bedType' => $room->bed_type,
                        'amenities' => $room->amenities,
                        'price' => $room->price
                    ])
                @endforeach
            </div>
        @else
            <!-- No Rooms Available Message -->
            <div class="text-center py-5">
                <div class="mb-4">
                    <i class="fas fa-bed fa-4x text-muted mb-3"></i>
                    <h3 class="text-muted">No Rooms Available</h3>
                    <p class="text-muted">We're currently updating our room inventory. Please check back later.</p>
                </div>
                <a href="/contact" class="btn btn-warning">
                    <i class="fas fa-phone me-2"></i>Contact Us for Availability
                </a>
            </div>
        @endif
    </div>
</section>

<script>
// Nights selection functionality for room cards
function increaseNights(button) {
    const input = button.parentElement.querySelector('input[type="number"]');
    const price = parseInt(input.closest('.nights-selection').getAttribute('data-price'));
    input.value = parseInt(input.value) + 1;
    updateTotal(input, price);
}

function decreaseNights(button) {
    const input = button.parentElement.querySelector('input[type="number"]');
    const price = parseInt(input.closest('.nights-selection').getAttribute('data-price'));
    if (input.value > 1) {
        input.value = parseInt(input.value) - 1;
        updateTotal(input, price);
    }
}

function updateTotal(input, price) {
    const nights = parseInt(input.value);
    const total = price * nights;
    const totalElement = input.closest('.nights-selection').querySelector('.total-price');
    if (totalElement) {
        totalElement.textContent = 'PKR ' + total.toLocaleString();
    }
}

function bookRoomWithNights(roomType, price, button) {
    const cardBody = button.closest('.card-body');
    const nightsInput = cardBody.querySelector('input[type="number"]');
    const nights = parseInt(nightsInput.value) || 1;
    
    // Use the global bookRoom function which shows the modal popup
    if (typeof bookRoom === 'function') {
        bookRoom(roomType, price, nights);
    }
}

// Initialize nights selection on page load
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.nights-selection').forEach(selection => {
        const input = selection.querySelector('input[type="number"]');
        const price = parseInt(selection.getAttribute('data-price'));
        if (input && price) {
            updateTotal(input, price);
        }
    });
});
</script>

<style>
.room-card {
    transition: all 0.3s ease;
    margin-bottom: 20px;
}

.room-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
}

.nights-selection .input-group {
    width: 150px;
}
</style>
@endsection

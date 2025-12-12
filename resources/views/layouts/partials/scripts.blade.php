<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Simple booking functionality
    let bookings = JSON.parse(localStorage.getItem('hotelBookings')) || [];
    
    function showBookingModal(roomType, price, customMessage = null) {
        // If custom message provided, show simple success modal
        if (customMessage) {
            const modalHTML = `
                <div class="modal fade" id="successModal" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-warning">
                                <h5 class="modal-title">${roomType}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body text-center">
                                <i class="fas fa-check-circle fa-3x text-success mb-3"></i>
                                <p>${customMessage}</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            const existingModal = document.getElementById('successModal');
            if (existingModal) existingModal.remove();
            document.body.insertAdjacentHTML('beforeend', modalHTML);
            const modal = new bootstrap.Modal(document.getElementById('successModal'));
            modal.show();
            return;
        }
        
        // Default booking modal
        const modalHTML = `
            <div class="modal fade" id="bookingModal" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-warning">
                            <h5 class="modal-title">🎉 Room Booked Successfully!</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body text-center">
                            <div class="mb-3">
                                <i class="fas fa-check-circle fa-3x text-success mb-3"></i>
                                <h4>${roomType}</h4>
                                <p class="text-muted">PKR ${price.toLocaleString()} per night</p>
                            </div>
                            <div class="alert alert-info">
                                <i class="fas fa-info-circle me-2"></i>
                                Room added to your bookings!
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Continue Browsing</button>
                            <button type="button" class="btn btn-warning" onclick="window.location.href='/booking'">
                                <i class="fas fa-shopping-cart me-2"></i>View My Bookings
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        `;
        
        // Remove existing modal if any
        const existingModal = document.getElementById('bookingModal');
        if (existingModal) {
            existingModal.remove();
        }
        
        // Add modal to body
        document.body.insertAdjacentHTML('beforeend', modalHTML);
        
        // Show modal
        const modal = new bootstrap.Modal(document.getElementById('bookingModal'));
        modal.show();
        
        // Update cart count when modal is shown
        updateGlobalBookingCount();
    }
    
    // Make functions globally available
    window.showBookingModal = showBookingModal;

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
        updateGlobalBookingCount(); // Update header cart count
        showBookingModal(roomType, price);
    }
    
    function updateBookingDisplay() {
        const bookingCount = document.getElementById('bookingCount');
        const bookingSummarySection = document.getElementById('bookingSummarySection');
        
        if (bookingCount) {
            bookingCount.textContent = bookings.length;
        }
        
        // Show/hide booking summary section
        if (bookingSummarySection) {
            if (bookings.length > 0) {
                bookingSummarySection.style.display = 'block';
            } else {
                bookingSummarySection.style.display = 'none';
            }
        }
    }
    
    function updateGlobalBookingCount() {
        const bookings = JSON.parse(localStorage.getItem('hotelBookings')) || [];
        const bookingCountElements = document.querySelectorAll('.booking-count');
        bookingCountElements.forEach(element => {
            element.textContent = bookings.length;
        });
    }
    
    // Make functions globally available
    window.bookRoom = bookRoom;
    window.updateGlobalBookingCount = updateGlobalBookingCount;
    
    // Update booking count on page load
    document.addEventListener('DOMContentLoaded', function() {
        updateGlobalBookingCount();
        
        // Room Search Functionality
        const searchInput = document.getElementById('roomSearchInput');
        const searchResults = document.getElementById('searchResults');
        let searchTimeout;

        if (searchInput && searchResults) {
            searchInput.addEventListener('input', function() {
                const query = this.value.trim();
                
                clearTimeout(searchTimeout);
                
                if (query.length < 2) {
                    searchResults.style.display = 'none';
                    return;
                }

                searchTimeout = setTimeout(function() {
                    // Make AJAX request
                    fetch(`/rooms/search?q=${encodeURIComponent(query)}`)
                        .then(response => response.json())
                        .then(data => {
                            displaySearchResults(data);
                        })
                        .catch(error => {
                            console.error('Search error:', error);
                            searchResults.innerHTML = '<div class="p-3 text-muted text-center">Error searching rooms</div>';
                            searchResults.style.display = 'block';
                        });
                }, 300); // Wait 300ms after user stops typing
            });

            // Hide results when clicking outside
            document.addEventListener('click', function(e) {
                if (!searchInput.contains(e.target) && !searchResults.contains(e.target)) {
                    searchResults.style.display = 'none';
                }
            });

            // Show results when input is focused and has value
            searchInput.addEventListener('focus', function() {
                if (this.value.trim().length >= 2 && searchResults.innerHTML.trim() !== '') {
                    searchResults.style.display = 'block';
                }
            });
        }

        function displaySearchResults(rooms) {
            if (rooms.length === 0) {
                searchResults.innerHTML = '<div class="p-3 text-muted text-center">No rooms found</div>';
                searchResults.style.display = 'block';
                return;
            }

            let html = '';
            rooms.forEach(room => {
                html += `
                    <a href="/rooms/${room.id}" class="dropdown-item p-3 text-decoration-none text-dark" style="border-bottom: 1px solid #eee;">
                        <div class="d-flex align-items-center">
                            <img src="${room.image_url}" 
                                 alt="${room.title}" 
                                 class="rounded me-3" 
                                 style="width: 60px; height: 60px; object-fit: cover;"
                                 onerror="this.src='https://via.placeholder.com/60x60?text=Room'">
                            <div class="flex-grow-1">
                                <h6 class="mb-1 fw-bold">${room.title}</h6>
                                <p class="mb-1 small text-muted">${room.description.substring(0, 60)}...</p>
                                <div class="small">
                                    <span class="text-muted"><i class="fas fa-user me-1"></i>${room.capacity} Guests</span>
                                    <span class="text-muted ms-2"><i class="fas fa-bed me-1"></i>${room.bed_type}</span>
                                    <span class="text-warning fw-bold ms-2">PKR ${parseFloat(room.price).toLocaleString()}/night</span>
                                </div>
                            </div>
                            <i class="fas fa-chevron-right text-muted ms-2"></i>
                        </div>
                    </a>
                `;
            });
            
            searchResults.innerHTML = html;
            searchResults.style.display = 'block';
        }
    });
</script>
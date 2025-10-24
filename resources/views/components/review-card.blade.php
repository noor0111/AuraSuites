<div class="col-md-4 mb-4">
    <div class="card h-100">
        <div class="card-body">
            <div class="d-flex align-items-center mb-3">
                <div class="rounded-circle bg-warning text-white d-flex align-items-center justify-content-center" 
                     style="width: 50px; height: 50px;">
                    {{ strtoupper(substr($name, 0, 1)) }}
                </div>
                <div class="ms-3">
                    <h6 class="mb-0">{{ $name }}</h6>
                    <small class="text-muted">{{ $location }}</small>
                </div>
            </div>
            <div class="text-warning mb-2">
                @for($i = 0; $i < $rating; $i++)
                <i class="fas fa-star"></i>
                @endfor
            </div>
            <p class="card-text">"{{ $review }}"</p>
        </div>
    </div>
</div>
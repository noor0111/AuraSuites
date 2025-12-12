@extends('layouts.app')

@section('title', 'Edit Room - Admin Panel')

@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-dark text-white">
                    <h4 class="mb-0"><i class="fas fa-edit me-2"></i>Edit Room: {{ $room->title }}</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.rooms.update', $room->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="title" class="form-label">Room Title *</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                       id="title" name="title" value="{{ old('title', $room->title) }}" required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="price" class="form-label">Price per Night (PKR) *</label>
                                <input type="number" class="form-control @error('price') is-invalid @enderror" 
                                       id="price" name="price" value="{{ old('price', $room->price) }}" min="0" step="0.01" required>
                                @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description *</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" name="description" rows="3" required>{{ old('description', $room->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="capacity" class="form-label">Guest Capacity *</label>
                                <input type="number" class="form-control @error('capacity') is-invalid @enderror" 
                                       id="capacity" name="capacity" value="{{ old('capacity', $room->capacity) }}" min="1" required>
                                @error('capacity')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-4 mb-3">
                                <label for="size" class="form-label">Room Size *</label>
                                <input type="text" class="form-control @error('size') is-invalid @enderror" 
                                       id="size" name="size" value="{{ old('size', $room->size) }}" placeholder="e.g., 45 sqm" required>
                                @error('size')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-4 mb-3">
                                <label for="bed_type" class="form-label">Bed Type *</label>
                                <input type="text" class="form-control @error('bed_type') is-invalid @enderror" 
                                       id="bed_type" name="bed_type" value="{{ old('bed_type', $room->bed_type) }}" placeholder="e.g., King Bed" required>
                                @error('bed_type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="amenities" class="form-label">Amenities *</label>
                            <input type="text" class="form-control @error('amenities') is-invalid @enderror" 
                                   id="amenities" name="amenities" value="{{ old('amenities', implode(', ', $room->amenities)) }}" 
                                   placeholder="Separate with commas: Free WiFi, Air Conditioning, Mini Bar" required>
                            <small class="text-muted">Separate amenities with commas</small>
                            @error('amenities')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Room Image *</label>
                            <div class="card border">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="image_upload" class="form-label">Upload Image from Local</label>
                                        <input type="file" class="form-control @error('image_upload') is-invalid @enderror" 
                                               id="image_upload" name="image_upload" 
                                               accept="image/*" onchange="previewImage(this)">
                                        <small class="text-muted">Accepted formats: JPG, PNG, GIF, WebP (Max: 5MB)</small>
                                        @error('image_upload')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="text-center mb-3">
                                        <span class="text-muted">OR</span>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="image_url" class="form-label">Or Enter Image URL</label>
                                        <input type="url" class="form-control @error('image_url') is-invalid @enderror" 
                                               id="image_url" name="image_url" value="{{ old('image_url', $room->image_url) }}" 
                                               placeholder="https://example.com/image.jpg" onchange="previewImageUrl(this)">
                                        @error('image_url')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div id="image_preview" class="text-center mt-3">
                                        <label class="form-label">Current Image Preview</label>
                                        <img id="preview_img" src="{{ old('image_url', $room->image_url) }}" alt="Preview" 
                                             style="max-width: 100%; max-height: 300px; border-radius: 5px; border: 1px solid #ddd;"
                                             onerror="this.style.display='none'; document.getElementById('image_preview').style.display='none';">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="is_available" name="is_available" value="1" 
                                   {{ old('is_available', $room->is_available) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_available">Available for booking</label>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.rooms.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Back to List
                            </a>
                            <button type="submit" class="btn btn-warning">
                                <i class="fas fa-save me-2"></i>Update Room
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function previewImage(input) {
    const preview = document.getElementById('image_preview');
    const previewImg = document.getElementById('preview_img');
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            previewImg.src = e.target.result;
            preview.style.display = 'block';
        }
        
        reader.readAsDataURL(input.files[0]);
        
        // Clear URL input when file is selected
        document.getElementById('image_url').value = '';
    } else {
        preview.style.display = 'none';
    }
}

function previewImageUrl(input) {
    const preview = document.getElementById('image_preview');
    const previewImg = document.getElementById('preview_img');
    
    if (input.value) {
        previewImg.src = input.value;
        preview.style.display = 'block';
        
        // Clear file input when URL is entered
        document.getElementById('image_upload').value = '';
    } else {
        preview.style.display = 'none';
    }
}
</script>
@endsection


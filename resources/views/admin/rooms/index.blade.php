@extends('layouts.app')

@section('title', 'Manage Rooms - Admin Panel')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-dark text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Manage Rooms</h4>
                        <a href="{{ route('admin.rooms.create') }}" class="btn btn-warning">
                            <i class="fas fa-plus me-2"></i>Add New Room
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Price</th>
                                    <th>Capacity</th>
                                    <th>Size</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($rooms as $room)
                                <tr>
                                    <td>
                                        <img src="{{ $room->image_url }}" alt="{{ $room->title }}" 
                                             style="width: 80px; height: 60px; object-fit: cover; border-radius: 5px;">
                                    </td>
                                    <td>{{ $room->title }}</td>
                                    <td>PKR {{ number_format($room->price) }}</td>
                                    <td>{{ $room->capacity }} Guests</td>
                                    <td>{{ $room->size }}</td>
                                    <td>
                                        @if($room->is_available)
                                            <span class="badge bg-success">Available</span>
                                        @else
                                            <span class="badge bg-danger">Unavailable</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{ route('rooms.show', $room->id) }}" 
                                               class="btn btn-outline-primary" target="_blank">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.rooms.edit', $room->id) }}" 
                                               class="btn btn-outline-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type="button" class="btn btn-outline-danger" 
                                                    onclick="showDeleteModal({{ $room->id }}, '{{ $room->title }}')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center py-4">
                                        <i class="fas fa-bed fa-2x text-muted mb-3"></i>
                                        <p class="text-muted">No rooms found. Add your first room!</p>
                                        <a href="{{ route('admin.rooms.create') }}" class="btn btn-warning">
                                            Add New Room
                                        </a>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteRoomModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">
                    <i class="fas fa-exclamation-triangle me-2"></i>Confirm Delete
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <i class="fas fa-trash-alt fa-3x text-danger mb-3"></i>
                <h5>Are you sure you want to delete this room?</h5>
                <p class="text-muted" id="deleteRoomName"></p>
                <p class="text-danger"><strong>This action cannot be undone!</strong></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-2"></i>Cancel
                </button>
                <form id="deleteRoomForm" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash me-2"></i>Delete Room
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function showDeleteModal(roomId, roomTitle) {
    const modal = new bootstrap.Modal(document.getElementById('deleteRoomModal'));
    const form = document.getElementById('deleteRoomForm');
    const roomNameElement = document.getElementById('deleteRoomName');
    
    // Set form action
    form.action = `/admin/rooms/${roomId}`;
    
    // Set room name
    roomNameElement.textContent = `Room: ${roomTitle}`;
    
    // Show modal
    modal.show();
}
</script>
@endsection
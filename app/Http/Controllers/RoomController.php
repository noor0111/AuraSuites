<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource (Admin Panel)
     */
    public function index()
    {
        $rooms = Room::all();
        return view('admin.rooms.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource
     */
    public function create()
    {
        return view('admin.rooms.create');
    }

    /**
     * Store a newly created resource in storage
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'capacity' => 'required|integer|min:1',
            'size' => 'required|string',
            'bed_type' => 'required|string',
            'amenities' => 'required|string',
            'image_upload' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'image_url' => 'nullable|url'
        ], [
            'image_upload.image' => 'The uploaded file must be an image.',
            'image_upload.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif, webp.',
            'image_upload.max' => 'The image may not be greater than 5MB.',
        ]);

        // Validate that at least one image source is provided
        if (!$request->hasFile('image_upload') && !$request->filled('image_url')) {
            return back()->withErrors(['image_upload' => 'Please either upload an image or provide an image URL.'])->withInput();
        }

        // Handle image upload or URL
        $imageUrl = null;
        if ($request->hasFile('image_upload')) {
            // Store uploaded file
            $imagePath = $request->file('image_upload')->store('rooms', 'public');
            $imageUrl = Storage::url($imagePath);
        } else {
            // Use provided URL
            $imageUrl = $request->image_url;
        }

        Room::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'capacity' => $request->capacity,
            'size' => $request->size,
            'bed_type' => $request->bed_type,
            'amenities' => explode(',', $request->amenities),
            'image_url' => $imageUrl,
            'is_available' => $request->has('is_available')
        ]);

        return redirect()->route('admin.rooms.index')->with('success', 'Room created successfully!');
    }

    /**
     * Display the specified resource (Frontend)
     */
    public function show($id)
    {
        $room = Room::findOrFail($id);
        return view('pages.room-detail', compact('room'));
    }

    /**
     * Show the form for editing the specified resource
     */
    public function edit($id)
    {
        $room = Room::findOrFail($id);
        return view('admin.rooms.edit', compact('room'));
    }

    /**
     * Update the specified resource in storage
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'capacity' => 'required|integer|min:1',
            'size' => 'required|string',
            'bed_type' => 'required|string',
            'amenities' => 'required|string',
            'image_upload' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'image_url' => 'nullable|url'
        ], [
            'image_upload.image' => 'The uploaded file must be an image.',
            'image_upload.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif, webp.',
            'image_upload.max' => 'The image may not be greater than 5MB.',
        ]);

        $room = Room::findOrFail($id);

        // Handle image upload or URL
        $imageUrl = $room->image_url; // Keep existing image by default
        
        if ($request->hasFile('image_upload')) {
            // Delete old image if it was uploaded (starts with /storage)
            if ($room->image_url && strpos($room->image_url, '/storage/') === 0) {
                $oldPath = str_replace('/storage/', '', $room->image_url);
                Storage::disk('public')->delete($oldPath);
            }
            
            // Store new uploaded file
            $imagePath = $request->file('image_upload')->store('rooms', 'public');
            $imageUrl = Storage::url($imagePath);
        } elseif ($request->filled('image_url')) {
            // Delete old image if it was uploaded (starts with /storage)
            if ($room->image_url && strpos($room->image_url, '/storage/') === 0) {
                $oldPath = str_replace('/storage/', '', $room->image_url);
                Storage::disk('public')->delete($oldPath);
            }
            
            // Use provided URL
            $imageUrl = $request->image_url;
        }

        $room->update([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'capacity' => $request->capacity,
            'size' => $request->size,
            'bed_type' => $request->bed_type,
            'amenities' => explode(',', $request->amenities),
            'image_url' => $imageUrl,
            'is_available' => $request->has('is_available')
        ]);

        return redirect()->route('admin.rooms.index')->with('success', 'Room updated successfully!');
    }

    /**
     * Remove the specified resource from storage
     */
    public function destroy($id)
    {
        $room = Room::findOrFail($id);
        $room->delete();

        return redirect()->route('admin.rooms.index')->with('success', 'Room deleted successfully!');
    }

    /**
     * Search rooms via AJAX
     */
    public function search(Request $request)
    {
        $query = $request->get('q', '');
        
        if (empty($query)) {
            return response()->json([]);
        }

        $rooms = Room::where('is_available', true)
            ->where(function($q) use ($query) {
                $q->where('title', 'LIKE', "%{$query}%")
                  ->orWhere('description', 'LIKE', "%{$query}%")
                  ->orWhere('bed_type', 'LIKE', "%{$query}%");
            })
            ->limit(5)
            ->get();

        return response()->json($rooms);
    }
}
<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rooms = [
            [
                'title' => 'Deluxe Room',
                'description' => 'Spacious and elegantly designed room with a king-size bed, offering stunning city views. Perfect for couples or solo travelers seeking comfort and luxury. Features modern amenities and a cozy seating area.',
                'price' => 15000.00,
                'capacity' => 2,
                'size' => '350 sq ft',
                'bed_type' => 'King Bed',
                'amenities' => ['Free WiFi', 'Air Conditioning', 'Flat Screen TV', 'Mini Bar', 'Room Service', 'Safe'],
                'image_url' => 'https://images.unsplash.com/photo-1631049307264-da0ec9d70304?w=800&h=600&fit=crop',
                'is_available' => true,
            ],
            [
                'title' => 'Executive Suite',
                'description' => 'Luxurious suite with separate living and sleeping areas. Ideal for business travelers or families. Features a king bed, sofa bed, work desk, and premium amenities. Enjoy panoramic views from your private balcony.',
                'price' => 25000.00,
                'capacity' => 3,
                'size' => '550 sq ft',
                'bed_type' => 'King Bed + Sofa Bed',
                'amenities' => ['Free WiFi', '2 Flat Screen TVs', 'Kitchenette', 'Jacuzzi', 'Work Desk', 'Balcony', 'Premium Mini Bar'],
                'image_url' => 'https://images.unsplash.com/photo-1590490360182-c33d57733427?w=800&h=600&fit=crop',
                'is_available' => true,
            ],
            [
                'title' => 'Presidential Suite',
                'description' => 'The ultimate luxury experience with panoramic city views. This expansive suite features a king-size four-poster bed, separate living and dining areas, private study, walk-in closet, and marble bathroom with jacuzzi. Includes 24/7 personal butler service.',
                'price' => 100000.00,
                'capacity' => 4,
                'size' => '1200 sq ft',
                'bed_type' => 'King Bed + 2 Single Beds',
                'amenities' => ['Free WiFi', '65" 4K Smart TV', 'Jacuzzi with Chromatherapy', 'Premium Mini Bar', '24/7 Personal Butler', 'Private Chef Service', 'Chauffeur Service', 'Private Balcony', 'Walk-in Closet', 'Study Room'],
                'image_url' => 'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?w=800&h=600&fit=crop',
                'is_available' => true,
            ],
            [
                'title' => 'Standard Room',
                'description' => 'Comfortable and well-appointed room perfect for budget-conscious travelers. Features a queen bed, modern amenities, and all the essentials for a pleasant stay.',
                'price' => 8000.00,
                'capacity' => 2,
                'size' => '280 sq ft',
                'bed_type' => 'Queen Bed',
                'amenities' => ['Free WiFi', 'Air Conditioning', 'Flat Screen TV', 'Mini Refrigerator', 'Coffee Maker'],
                'image_url' => 'https://images.unsplash.com/photo-1566665797739-1674de7a421a?w=800&h=600&fit=crop',
                'is_available' => true,
            ],
            [
                'title' => 'Family Suite',
                'description' => 'Spacious suite designed for families with children. Features two bedrooms, a living area, and kitchenette. Perfect for extended stays with all the comforts of home.',
                'price' => 35000.00,
                'capacity' => 5,
                'size' => '750 sq ft',
                'bed_type' => 'King Bed + 2 Twin Beds',
                'amenities' => ['Free WiFi', '2 Bedrooms', 'Kitchenette', 'Dining Area', '2 Flat Screen TVs', 'Sofa Bed', 'Washing Machine', 'Microwave'],
                'image_url' => 'https://images.unsplash.com/photo-1611892440504-42a792e24d32?w=800&h=600&fit=crop',
                'is_available' => true,
            ],
            [
                'title' => 'Ocean View Room',
                'description' => 'Beautiful room with breathtaking ocean views. Wake up to the sound of waves and enjoy stunning sunsets from your private balcony. Features a king bed and premium amenities.',
                'price' => 22000.00,
                'capacity' => 2,
                'size' => '400 sq ft',
                'bed_type' => 'King Bed',
                'amenities' => ['Free WiFi', 'Ocean View Balcony', 'Air Conditioning', 'Flat Screen TV', 'Mini Bar', 'Room Service', 'Beach Access'],
                'image_url' => 'https://images.unsplash.com/photo-1590490360182-c33d57733427?w=800&h=600&fit=crop',
                'is_available' => true,
            ],
            [
                'title' => 'Business Suite',
                'description' => 'Designed for the modern business traveler. Features a comfortable king bed, spacious work area with ergonomic chair, high-speed internet, and meeting space. Perfect for work and relaxation.',
                'price' => 28000.00,
                'capacity' => 2,
                'size' => '500 sq ft',
                'bed_type' => 'King Bed',
                'amenities' => ['Free High-Speed WiFi', 'Work Desk', 'Ergonomic Chair', 'Printer/Scanner', 'Meeting Table', 'Flat Screen TV', 'Coffee Maker', 'Mini Bar'],
                'image_url' => 'https://images.unsplash.com/photo-1586105251261-72a756497a11?w=800&h=600&fit=crop',
                'is_available' => true,
            ],
        ];

        foreach ($rooms as $room) {
            Room::create($room);
        }
    }
}


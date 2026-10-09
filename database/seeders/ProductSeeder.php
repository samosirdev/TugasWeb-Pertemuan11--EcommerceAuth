<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $catalog = [
            'Elektronik' => [
                'Xiaomi Redmi Note 13 128GB', 'Samsung Galaxy A35 5G', 'Logitech M331 Silent Mouse',
                'Anker PowerCore 10000mAh', 'JBL Tune 510BT Headphone', 'Xiaomi Smart Band 8',
                'TP-Link Archer C6 Router', 'Sony WH-CH520 Wireless', 'Realme Pad Mini Tablet', 'Baseus Charger GaN 65W',
            ],
            'Fashion Pria' => [
                'Kemeja Flannel Kotak', 'Kaos Polos Cotton Combed 30s', 'Celana Chino Slim Fit',
                'Jaket Bomber Parasut', 'Hoodie Fleece Oversize', 'Sepatu Sneakers Canvas',
                'Jam Tangan Digital Sport', 'Topi Baseball Polos', 'Sabuk Kulit Asli', 'Sarung Tenun Premium',
            ],
            'Fashion Wanita' => [
                'Blouse Katun Rayon', 'Rok Plisket Panjang', 'Hijab Pashmina Ceruty', 'Dress Midi Floral',
                'Tote Bag Kanvas', 'Cardigan Rajut Oversize', 'Celana Kulot Highwaist',
                'Flat Shoes Suede', 'Tunik Batik Modern', 'Scarf Satin Silk',
            ],
            'Peralatan Rumah' => [
                'Rice Cooker Digital 1.8L', 'Blender Kaca 1.5L', 'Set Panci Stainless 5 Pcs',
                'Dispenser Galon Bawah', 'Lampu LED Meja Belajar', 'Rak Sepatu Susun 4 Tingkat',
                'Sprei Katun 160x200', 'Set Pisau Dapur Stainless', 'Teko Listrik 1.7L', 'Kotak Penyimpanan Plastik 30L',
            ],
            'Buku & Alat Tulis' => [
                'Novel Laskar Pelangi', 'Buku Atomic Habits (Edisi Indonesia)', 'Buku Filosofi Teras',
                'Pulpen Gel 12 Pcs', 'Buku Catatan A5 Dotted', 'Set Stabilo Boss 6 Warna',
                'Planner Binder A5', 'Kalkulator Scientific Casio FX-991', 'Buku Clean Code', 'Buku Dasar Keamanan Siber',
            ],
            'Olahraga' => [
                'Kacamata Renang Anti-Fog', 'Topi Renang Silikon', 'Matras Yoga TPE 6mm', 'Dumbbell Vinyl 5 Kg',
                'Sepatu Lari Ringan', 'Botol Minum 1 Liter', 'Resistance Band Set',
                'Skipping Rope Speed', 'Bola Futsal Size 4', 'Tas Gym Duffel',
            ],
        ];

        foreach ($catalog as $categoryName => $products) {
            $category = Category::create([
                'name'        => $categoryName,
                'slug'        => Str::slug($categoryName),
                'description' => "Koleksi $categoryName pilihan dengan harga terbaik.",
            ]);

            foreach ($products as $name) {
                Product::factory()->create([
                    'category_id' => $category->id,
                    'name'        => $name,
                    'slug'        => Str::slug($name),
                ]);
            }
        }
    }
}
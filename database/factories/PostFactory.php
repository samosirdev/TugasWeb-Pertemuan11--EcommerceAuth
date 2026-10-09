<?php

namespace Database\Factories;
use Illuminate\Support\Str; 
use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
{
    $title = fake()->unique()->randomElement([
        'Tips Memilih Smartphone Sesuai Kebutuhan',
        'Promo Gajian: Diskon Hingga 50% Semua Kategori',
        'Cara Merawat Sepatu Agar Awet dan Tidak Cepat Rusak',
        '5 Rekomendasi Buku Wajib Baca Tahun Ini',
        'Panduan Belanja Online yang Aman dan Nyaman',
        'Perlengkapan Olahraga untuk Pemula',
        'Inspirasi Outfit Kasual untuk Kuliah',
        'Peralatan Dapur yang Wajib Dimiliki di Rumah',
        'Cara Mengenali Produk Asli dan Palsu',
        'Tips Hemat Belanja Saat Harbolnas',
    ]);

    return [
        'user_id' => User::where('role', 'editor')->value('id') ?? 1,
        'title'   => $title,
        'slug'    => Str::slug($title) . '-' . Str::random(5),
        'body'    => fake()->randomElement([
            'Belanja online semakin mudah, tetapi kamu tetap perlu teliti. Bandingkan harga, baca ulasan pembeli, dan pastikan penjual terpercaya sebelum melakukan pembayaran.',
            'Kami menghadirkan berbagai produk pilihan dengan kualitas terbaik. Nikmati penawaran spesial selama periode promo dan jangan lewatkan kesempatan ini.',
            'Merawat barang kesayangan tidak sulit. Dengan perawatan rutin dan penyimpanan yang tepat, produk favoritmu bisa bertahan lebih lama.',
        ]),
    ];
}
}

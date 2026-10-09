<?php

namespace Database\Seeders;

use App\Models\{Order, Post, Product, Review, User};
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 3 akun tetap untuk testing (password semua: password)
        User::factory()->create(['name' => 'Admin Toko',  'email' => 'admin@toko.test',  'role' => 'admin']);
        User::factory()->create(['name' => 'Editor Toko', 'email' => 'editor@toko.test', 'role' => 'editor']);
        User::factory()->create(['name' => 'Albert User', 'email' => 'user@toko.test',   'role' => 'user']);
        User::factory(10)->create();

        $this->call(ProductSeeder::class); // 60 produk

        // Pesanan + item pesanan
        $products = Product::all();
        foreach (User::where('role', 'user')->get() as $user) {
            for ($i = 0; $i < rand(1, 3); $i++) {
                $order = Order::create([
                    'user_id'          => $user->id,
                    'order_number'     => 'ORD-' . strtoupper(Str::random(8)),
                    'total'            => 0,
                    'status'           => collect(['pending', 'paid', 'shipped', 'completed'])->random(),
                    'shipping_address' => fake()->address(),
                ]);

                $total = 0;
                foreach ($products->random(rand(1, 4)) as $p) {
                    $qty = rand(1, 3);
                    $order->items()->create(['product_id' => $p->id, 'quantity' => $qty, 'price' => $p->price]);
                    $total += $qty * $p->price;
                }
                $order->update(['total' => $total]);
            }
        }

        Review::factory(40)->create();
        Post::factory(8)->create();
    }
}
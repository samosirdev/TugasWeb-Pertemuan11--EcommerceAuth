<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl">Dashboard Admin</h2></x-slot>
    <div class="py-8 max-w-5xl mx-auto px-4 grid grid-cols-1 sm:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-xl shadow"><p class="text-gray-500">Produk</p><p class="text-3xl font-bold">{{ \App\Models\Product::count() }}</p></div>
        <div class="bg-white p-6 rounded-xl shadow"><p class="text-gray-500">Pesanan</p><p class="text-3xl font-bold">{{ \App\Models\Order::count() }}</p></div>
        <div class="bg-white p-6 rounded-xl shadow"><p class="text-gray-500">Pengguna</p><p class="text-3xl font-bold">{{ \App\Models\User::count() }}</p></div>
    </div>
</x-app-layout>
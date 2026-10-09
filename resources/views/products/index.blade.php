<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Toko Online</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <nav class="bg-white shadow">
        <div class="max-w-6xl mx-auto px-4 py-4 flex justify-between items-center">
            <span class="text-xl font-bold text-indigo-600">🛒 TokoKu</span>
            <div class="space-x-4">
                @auth
                    <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-indigo-600">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-indigo-600">Login</a>
                    <a href="{{ route('register') }}" class="px-4 py-2 bg-indigo-600 text-white rounded-lg">Daftar</a>
                @endauth
            </div>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-6">Produk Terbaru</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($products as $product)
                <div class="bg-white rounded-xl shadow hover:shadow-lg transition p-5">
                    <span class="text-xs bg-indigo-100 text-indigo-700 px-2 py-1 rounded-full">{{ $product->category->name }}</span>
                    <h3 class="font-semibold mt-3 h-12">{{ $product->name }}</h3>
                    <p class="text-indigo-600 font-bold mt-2">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    <p class="text-sm text-gray-500">Stok: {{ $product->stock }}</p>
                </div>
            @endforeach
        </div>
        <div class="mt-8">{{ $products->links() }}</div>
    </main>
</body>
</html>
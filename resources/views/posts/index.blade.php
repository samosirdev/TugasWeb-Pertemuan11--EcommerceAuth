<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl">Kelola Post</h2></x-slot>
    <div class="py-8 max-w-5xl mx-auto px-4">
        @if (session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
        @endif

        <a href="{{ route('posts.create') }}" class="inline-block mb-4 px-4 py-2 bg-indigo-600 text-white rounded-lg">+ Post Baru</a>

        <div class="bg-white rounded-xl shadow overflow-hidden">
            <table class="w-full text-left">
                <thead class="bg-gray-50 text-sm text-gray-600">
                    <tr><th class="p-3">Judul</th><th class="p-3">Penulis</th><th class="p-3">Aksi</th></tr>
                </thead>
                <tbody>
                @foreach ($posts as $post)
                    <tr class="border-t">
                        <td class="p-3">{{ $post->title }}</td>
                        <td class="p-3">{{ $post->author->name }}</td>
                        <td class="p-3 flex gap-3">
                            @can('update', $post)
                                <a href="{{ route('posts.edit', $post) }}" class="text-indigo-600">Edit</a>
                            @endcan
                            @can('delete', $post)
                                <form method="POST" action="{{ route('posts.destroy', $post) }}" onsubmit="return confirm('Hapus post ini?')">
                                    @csrf @method('DELETE')
                                    <button class="text-red-600">Hapus</button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4">{{ $posts->links() }}</div>
    </div>
</x-app-layout>
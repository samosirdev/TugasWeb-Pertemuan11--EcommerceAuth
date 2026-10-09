<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl">{{ isset($post) ? 'Edit' : 'Buat' }} Post</h2></x-slot>
    <div class="py-8 max-w-3xl mx-auto px-4">
        <form method="POST" action="{{ isset($post) ? route('posts.update', $post) : route('posts.store') }}" class="bg-white p-6 rounded-xl shadow space-y-4">
            @csrf
            @isset($post) @method('PUT') @endisset

            <div>
                <label class="block text-sm font-medium mb-1">Judul</label>
                <input name="title" value="{{ old('title', $post->title ?? '') }}" class="w-full border-gray-300 rounded-lg">
                @error('title') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Isi</label>
                <textarea name="body" rows="6" class="w-full border-gray-300 rounded-lg">{{ old('body', $post->body ?? '') }}</textarea>
                @error('body') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>
            <button class="px-5 py-2 bg-indigo-600 text-white rounded-lg">Simpan</button>
        </form>
    </div>
</x-app-layout>
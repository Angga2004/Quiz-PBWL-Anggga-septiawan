<x-layout>
    <x-slot:title>Edit Golongan</x-slot:title>

    <h1 class="text-2xl font-bold mb-4">Edit Golongan</h1>

    <!-- Form untuk mengedit Golongan -->
    <form action="{{ route('golongan.update', $golongan->gol_id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="gol_kode" class="block text-sm font-medium text-gray-700">Kode Golongan</label>
            <input type="text" name="gol_kode" id="gol_kode" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('gol_kode', $golongan->gol_kode) }}" required>
            @error('gol_kode')
                <div class="text-red-600 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="gol_nama" class="block text-sm font-medium text-gray-700">Nama Golongan</label>
            <input type="text" name="gol_nama" id="gol_nama" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('gol_nama', $golongan->gol_nama) }}" required>
            @error('gol_nama')
                <div class="text-red-600 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md shadow-md hover:bg-indigo-700">Simpan Perubahan</button>
            <a href="{{ route('golongan.index') }}" class="ml-4 text-gray-500 hover:text-gray-700">Batal</a>
        </div>
    </form>
</x-layout>

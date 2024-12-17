<x-layout>
    <x-slot:title>Edit Pelanggan</x-slot:title>

    <div class="p-6">
        <h1 class="text-3xl font-bold mb-6">Edit Pelanggan</h1>

        <form action="{{ route('pelanggan.update', $pelanggan->pel_id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Nama Pelanggan -->
            <div>
                <label for="pel_nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Pelanggan</label>
                <input type="text" id="pel_nama" name="pel_nama" value="{{ old('pel_nama', $pelanggan->pel_nama) }}"
                    class="block w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 focus:ring-blue-500 focus:border-blue-500" 
                    placeholder="Masukkan Nama Pelanggan" required>
            </div>

            <!-- Alamat -->
            <div>
                <label for="pel_alamat" class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                <textarea id="pel_alamat" name="pel_alamat" 
                    class="block w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 focus:ring-blue-500 focus:border-blue-500" 
                    placeholder="Masukkan Alamat Pelanggan" required>{{ old('pel_alamat', $pelanggan->pel_alamat) }}</textarea>
            </div>

            <!-- Golongan -->
            <div>
                <label for="pel_id_gol" class="block text-sm font-medium text-gray-700 mb-1">Golongan</label>
                <select id="pel_id_gol" name="pel_id_gol" 
                    class="block w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 focus:ring-blue-500 focus:border-blue-500" 
                    required>
                    <option value="">Pilih Golongan</option>
                    @foreach ($golongan as $gol)
                        <option value="{{ $gol->gol_id }}" 
                            {{ old('pel_id_gol', $pelanggan->pel_id_gol) == $gol->gol_id ? 'selected' : '' }}>
                            {{ $gol->gol_nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Tombol Aksi -->
            <div class="flex items-center space-x-4">
                <button type="submit" 
                    class="bg-blue-500 text-white px-6 py-2 rounded-lg shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Simpan
                </button>
                <a href="{{ route('pelanggan.index') }}" 
                    class="bg-gray-500 text-white px-6 py-2 rounded-lg shadow hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500">
                    Batal
                </a>
            </div>
        </form>
    </div>
</x-layout>

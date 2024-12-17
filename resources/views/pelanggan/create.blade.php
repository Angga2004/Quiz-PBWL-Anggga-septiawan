<x-layout>
    <x-slot:title>Tambah Pelanggan</x-slot:title>

    <div class="p-6">
        <form action="{{ route('pelanggan.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Nama Pelanggan -->
            <div>
                <label for="pel_nama" class="block text-sm font-medium text-black mb-2">Nama Pelanggan</label>
                <input type="text" id="pel_nama" name="pel_nama" value="{{ old('pel_nama') }}"
                    class="block w-full border border-gray-400 rounded-md shadow-sm px-4 py-3 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Masukkan Nama Pelanggan" required>
            </div>

            <!-- Alamat -->
            <div>
                <label for="pel_alamat" class="block text-sm font-medium text-black mb-2">Alamat</label>
                <textarea id="pel_alamat" name="pel_alamat"
                    class="block w-full border border-gray-400 rounded-md shadow-sm px-4 py-3 focus:ring-green-500 focus:border-green-500"
                    placeholder="Masukkan Alamat Pelanggan" required>{{ old('pel_alamat') }}</textarea>
            </div>

            <!-- Golongan -->
            <div>
                <label for="pel_id_gol" class="block text-sm font-medium text-black mb-2">Golongan</label>
                <select id="pel_id_gol" name="pel_id_gol"
                    class="block w-full border border-gray-400 rounded-md shadow-sm px-4 py-3 focus:ring-green-500 focus:border-green-500"
                    required>
                    <option value="">Pilih Golongan</option>
                    @foreach($golongan as $gol)
                        <option value="{{ $gol->gol_id }}" {{ old('pel_id_gol') == $gol->gol_id ? 'selected' : '' }}>
                            {{ $gol->gol_nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Tombol Aksi -->
            <div class="flex items-center space-x-4">
                <!-- Tombol Simpan -->
                <button type="submit"
                    class="bg-blue-600 text-white px-6 py-3 rounded-lg shadow-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200">
                    Simpan
                </button>

                <!-- Tombol Batal -->
                <a href="{{ route('pelanggan.index') }}"
                    class="bg-black text-white px-6 py-3 rounded-lg shadow-lg hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-black transition duration-200">
                    Batal
                </a>

                <!-- Tombol Tambah -->
                <a href="{{ route('golongan.create') }}"
                    class="bg-green-600 text-white px-6 py-3 rounded-lg shadow-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 transition duration-200">
                    Tambah Golongan
                </a>
            </div>
        </form>
    </div>
</x-layout>

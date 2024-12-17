<x-layout>
    <x-slot:title>Data Pelanggan</x-slot:title>

    <!-- Tombol Tambah Pelanggan -->
    <a href="{{ route('pelanggan.create') }}" 
        class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded-md mb-4">
        Tambah Pelanggan
    </a>

    <!-- Pesan Sukses -->
    @if(session('success'))
        <div class="mb-4 text-green-700 bg-green-100 px-4 py-2 rounded-md border border-green-300">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tabel Data Pelanggan -->
    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full table-auto w-full">
            <!-- Header Tabel -->
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold border-b">ID</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold border-b">Nama</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold border-b">Alamat</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold border-b">Golongan</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold border-b">Aksi</th>
                </tr>
            </thead>

            <!-- Body Tabel -->
            <tbody class="text-gray-700">
                @forelse($pelanggan as $item)
                    <tr class="hover:bg-blue-50 transition">
                        <td class="px-6 py-4 border-b">{{ $item->pel_id }}</td>
                        <td class="px-6 py-4 border-b">{{ $item->pel_nama }}</td>
                        <td class="px-6 py-4 border-b">{{ $item->pel_alamat }}</td>
                        <td class="px-6 py-4 border-b">{{ $item->golongan->gol_nama }}</td>
                        <td class="px-6 py-4 border-b flex gap-2">
                            <!-- Tombol Edit -->
                            <a href="{{ route('pelanggan.edit', $item->pel_id) }}"
                               class="text-yellow-600 hover:text-yellow-800">Edit</a>
                            |
                            <!-- Delete Form -->
                            <form action="{{ route('pelanggan.destroy', $item->pel_id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center px-6 py-4 text-gray-500">Data Pelanggan tidak ditemukan</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kendaraan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg p-4">
                <a href="{{ route('kendaraans.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"> Tambah Kendaraan </a> <br>

                @foreach ($kendaraans as $key => $kendaraan)
                    ---------------------------------------- <br>
                    model: {{ $kendaraan->model }} <br>
                    tahun: {{ $kendaraan->tahun }} <br>
                    jumlah_penumpang: {{ $kendaraan->jumlah_penumpang }} <br>
                    manufaktur: {{ $kendaraan->manufaktur }} <br>
                    harga: {{ $kendaraan->harga }} <br>

                    @if ($kendaraan->jenis_kendaraan_type == 'App\\Models\\Mobil')
                        jenis_kendaraan_type: Mobil <br>
                        tipe_bahan_bakar: {{ $kendaraan->jenis_kendaraan->tipe_bahan_bakar }} <br>
                        luas_bagasi: {{ $kendaraan->jenis_kendaraan->luas_bagasi }} <br>
                    @elseif ($kendaraan->jenis_kendaraan_type == 'App\\Models\\Motor')
                        jenis_kendaraan_type: Motor <br>
                        kapasitas_bensin: {{ $kendaraan->jenis_kendaraan->kapasitas_bensin }} <br>
                        ukuran_bagasi: {{ $kendaraan->jenis_kendaraan->ukuran_bagasi }} <br>
                    @elseif ($kendaraan->jenis_kendaraan_type == 'App\\Models\\Truck')
                        jenis_kendaraan_type: Truck <br>
                        jumlah_roda_ban: {{ $kendaraan->jenis_kendaraan->jumlah_roda_ban }} <br>
                        luas_area_kargo: {{ $kendaraan->jenis_kendaraan->luas_area_kargo }} <br>
                    @endif

                    <div class="p-2">
                        action: <br>
                        <a href="{{ route('kendaraans.show', $kendaraan->id) }}" class="btn">Show</a><br>
                        <a href="{{ route('kendaraans.edit', $kendaraan->id) }}" class="btn">Edit</a>
                        <form action="{{ route('kendaraans.destroy', $kendaraan->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>

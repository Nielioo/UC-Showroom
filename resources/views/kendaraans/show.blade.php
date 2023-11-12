<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Kendaraan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg p-4">
                <img src="{{ asset($kendaraan->image_path) }}" alt="kendaraan_image" class="w-64">
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
            </div>
        </div>
    </div>
</x-app-layout>

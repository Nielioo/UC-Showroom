<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kendaraan') }}
        </h2>
    </x-slot>

    <a href="{{ route('kendaraans.create') }}"> Create New Kendaraan </a>

    @foreach ($kendaraans as $key => $kendaraan)
        <br>
        model: {{ $kendaraan->model }} <br>
        tahun: {{ $kendaraan->tahun }} <br>
        jumlah_penumpang: {{ $kendaraan->jumlah_penumpang }} <br>
        manufaktur: {{ $kendaraan->manufaktur }} <br>
        harga: {{ $kendaraan->harga }} <br>
        jenis_kendaraan_type: {{ $kendaraan->jenis_kendaraan_type }} <br>

        @if ($kendaraan->jenis_kendaraan_type == 'App\\Models\\Mobil')
            tipe_bahan_bakar: {{ $kendaraan->jenis_kendaraan->tipe_bahan_bakar }} <br>
            luas_bagasi: {{ $kendaraan->jenis_kendaraan->luas_bagasi }} <br>
        @elseif ($kendaraan->jenis_kendaraan_type == 'App\\Models\\Motor')
            kapasitas_bensin: {{ $kendaraan->jenis_kendaraan->kapasitas_bensin }} <br>
            ukuran_bagasi: {{ $kendaraan->jenis_kendaraan->ukuran_bagasi }} <br>
        @elseif ($kendaraan->jenis_kendaraan_type == 'App\\Models\\Truck')
            jumlah_roda_ban: {{ $kendaraan->jenis_kendaraan->jumlah_roda_ban }} <br>
            luas_area_kargo: {{ $kendaraan->jenis_kendaraan->luas_area_kargo }} <br>
        @endif
    @endforeach
</x-app-layout>

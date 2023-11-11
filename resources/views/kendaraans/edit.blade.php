<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Kendaraan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg p-4">

                <x-validation-errors class="mb-4" />

                <form action="{{ route('kendaraans.update', $kendaraan->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div>
                        <x-label for="model" value="{{ __('Model') }}" />
                        <x-input id="model" class="block mt-1 w-full p-2" type="text" name="model"
                            value="{{ $kendaraan->model }}" required autofocus />
                    </div>
                    <div class="mt-4">
                        <x-label for="tahun" value="{{ __('Tahun') }}" />
                        <x-input id="tahun" class="block mt-1 w-full p-2" type="text" name="tahun"
                            value="{{ $kendaraan->tahun }}" required />
                    </div>
                    <div class="mt-4">
                        <x-label for="manufaktur" value="{{ __('Jumlah Penumpang') }}" />
                        <x-input id="jumlah_penumpang" class="block mt-1 w-full p-2" type="text"
                            name="jumlah_penumpang" value="{{ $kendaraan->jumlah_penumpang }}" required />
                    </div>
                    <div class="mt-4">
                        <x-label for="manufaktur" value="{{ __('Manufaktur') }}" />
                        <x-input id="manufaktur" class="block mt-1 w-full p-2" type="text" name="manufaktur"
                            value="{{ $kendaraan->manufaktur }}" required />
                    </div>
                    <div class="mt-4">
                        <x-label for="harga" value="{{ __('Harga') }}" />
                        <x-input id="harga" class="block mt-1 w-full p-2" type="text" name="harga"
                            value="{{ $kendaraan->harga }}" required />
                    </div>
                    <div class="mt-4">
                        <x-label for="harga" value="{{ __('Jenis Kendaraan Type') }}" />
                        <p>
                            @if ($kendaraan->jenis_kendaraan_type === 'App\Models\Mobil')
                                Mobil
                            @elseif ($kendaraan->jenis_kendaraan_type === 'App\Models\Motor')
                                Motor
                            @elseif ($kendaraan->jenis_kendaraan_type === 'App\Models\Truck')
                                Truck
                            @endif
                        </p>
                    </div>

                    @if ($kendaraan->jenis_kendaraan_type === 'App\Models\Mobil')
                        {{-- Mobil Fields --}}
                        <div id="mobil-fields">
                            <div class="mt-4">
                                <x-label for="tipe_bahan_bakar" value="{{ __('Tipe Bahan Bakar') }}" />
                                <x-input id="tipe_bahan_bakar" class="block mt-1 w-full p-2" type="text"
                                    name="tipe_bahan_bakar"
                                    value="{{ $kendaraan->jenis_kendaraan->tipe_bahan_bakar }}" />
                            </div>
                            <div class="mt-4">
                                <x-label for="luas_bagasi" value="{{ __('Luas Bagasi') }}" />
                                <x-input id="luas_bagasi" class="block mt-1 w-full p-2" type="text"
                                    name="luas_bagasi" value="{{ $kendaraan->jenis_kendaraan->luas_bagasi }}" />
                            </div>
                        </div>
                    @elseif ($kendaraan->jenis_kendaraan_type === 'App\Models\Motor')
                        {{-- Motor Fields --}}
                        <div id="motor-fields">
                            <div class="mt-4">
                                <x-label for="kapasitas_bensin" value="{{ __('Kapasitas Bensin') }}" />
                                <x-input id="kapasitas_bensin" class="block mt-1 w-full p-2" type="text"
                                    name="kapasitas_bensin"
                                    value="{{ $kendaraan->jenis_kendaraan->kapasitas_bensin }}" />
                            </div>
                            <div class="mt-4">
                                <x-label for="ukuran_bagasi" value="{{ __('Ukuran Bagasi') }}" />
                                <x-input id="ukuran_bagasi" class="block mt-1 w-full p-2" type="text"
                                    name="ukuran_bagasi" value="{{ $kendaraan->jenis_kendaraan->ukuran_bagasi }}" />
                            </div>
                        </div>
                    @elseif ($kendaraan->jenis_kendaraan_type === 'App\Models\Truck')
                        {{-- Truck Fields --}}
                        <div id="truck-fields">
                            <div class="mt-4">
                                <x-label for="jumlah_roda_ban" value="{{ __('Jumlah Roda Ban') }}" />
                                <x-input id="jumlah_roda_ban" class="block mt-1 w-full p-2" type="text"
                                    name="jumlah_roda_ban"
                                    value="{{ $kendaraan->jenis_kendaraan->jumlah_roda_ban }}" />
                            </div>
                            <div class="mt-4">
                                <x-label for="luas_area_kargo" value="{{ __('Luas Area Kargo') }}" />
                                <x-input id="luas_area_kargo" class="block mt-1 w-full p-2" type="text"
                                    name="luas_area_kargo"
                                    value="{{ $kendaraan->jenis_kendaraan->luas_area_kargo }}" />
                            </div>
                        </div>
                    @endif

                    <br>
                    <x-button class="mt-4 p-1">
                        {{ __('Edit') }}
                    </x-button>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>

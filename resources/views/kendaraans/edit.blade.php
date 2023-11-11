<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Kendaraan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg p-4">

                <x-validation-errors class="mb-4" />

                <form action="{{ route('kendaraans.store') }}" method="POST">
                    @csrf

                    <div>
                        <x-label for="model" value="{{ __('Model') }}" />
                        <x-input id="model" class="block mt-1 w-full p-2" type="text" name="model"
                            :value="old('model')" required autofocus />
                    </div>
                    <div class="mt-4">
                        <x-label for="tahun" value="{{ __('Tahun') }}" />
                        <x-input id="tahun" class="block mt-1 w-full p-2" type="text" name="tahun"
                            :value="old('tahun')" required />
                    </div>
                    <div class="mt-4">
                        <x-label for="manufaktur" value="{{ __('Jumlah Penumpang') }}" />
                        <x-input id="jumlah_penumpang" class="block mt-1 w-full p-2" type="text"
                            name="jumlah_penumpang" :value="old('jumlah_penumpang')" required />
                    </div>
                    <div class="mt-4">
                        <x-label for="manufaktur" value="{{ __('Manufaktur') }}" />
                        <x-input id="manufaktur" class="block mt-1 w-full p-2" type="text" name="manufaktur"
                            :value="old('manufaktur')" required />
                    </div>
                    <div class="mt-4">
                        <x-label for="harga" value="{{ __('Harga') }}" />
                        <x-input id="harga" class="block mt-1 w-full p-2" type="text" name="harga"
                            :value="old('harga')" required />
                    </div>
                    <div class="mt-4">
                        <x-label for="harga" value="{{ __('Jenis Kendaraan Type') }}" />
                        <select name="jenis_kendaraan_type" id="jenis_kendaraan_type" onchange="manipulateInputs()">
                            <option disabled selected>Pilih Jenis Kendaraan</option>
                            <option value="App\Models\Mobil">Mobil</option>
                            <option value="App\Models\Motor">Motor</option>
                            <option value="App\Models\Truck">Truck</option>
                        </select>
                    </div>

                    {{-- Mobil Fields --}}
                    <div id="mobil-fields" class="hidden">
                        <div class="mt-4">
                            <x-label for="tipe_bahan_bakar" value="{{ __('Tipe Bahan Bakar') }}" />
                            <x-input id="tipe_bahan_bakar" class="block mt-1 w-full p-2" type="text"
                                name="tipe_bahan_bakar" :value="old('tipe_bahan_bakar')" />
                        </div>
                        <div class="mt-4">
                            <x-label for="luas_bagasi" value="{{ __('Luas Bagasi') }}" />
                            <x-input id="luas_bagasi" class="block mt-1 w-full p-2" type="text" name="luas_bagasi"
                                :value="old('luas_bagasi')" />
                        </div>
                    </div>

                    {{-- Motor Fields --}}
                    <div id="motor-fields" class="hidden">
                        <div class="mt-4">
                            <x-label for="kapasitas_bensin" value="{{ __('Kapasitas Bensin') }}" />
                            <x-input id="kapasitas_bensin" class="block mt-1 w-full p-2" type="text"
                                name="kapasitas_bensin" :value="old('kapasitas_bensin')" />
                        </div>
                        <div class="mt-4">
                            <x-label for="ukuran_bagasi" value="{{ __('Ukuran Bagasi') }}" />
                            <x-input id="ukuran_bagasi" class="block mt-1 w-full p-2" type="text"
                                name="ukuran_bagasi" :value="old('ukuran_bagasi')" />
                        </div>
                    </div>

                    {{-- Truck Fields --}}
                    <div id="truck-fields" class="hidden">
                        <div class="mt-4">
                            <x-label for="jumlah_roda_ban" value="{{ __('Jumlah Roda Ban') }}" />
                            <x-input id="jumlah_roda_ban" class="block mt-1 w-full p-2" type="text"
                                name="jumlah_roda_ban" :value="old('jumlah_roda_ban')" />
                        </div>
                        <div class="mt-4">
                            <x-label for="luas_area_kargo" value="{{ __('Luas Area Kargo') }}" />
                            <x-input id="luas_area_kargo" class="block mt-1 w-full p-2" type="text"
                                name="luas_area_kargo" :value="old('luas_area_kargo')" />
                        </div>
                    </div>

                    <br>
                    <x-button class="mt-4 p-1">
                        {{ __('Edit') }}
                    </x-button>

                </form>
            </div>
        </div>
    </div>

    <script>
        function manipulateInputs() {
            var selectedKendaraan = document.getElementById("jenis_kendaraan_type").value;
            console.log(selectedKendaraan);

            // Hide unused inputs fields
            document.getElementById("mobil-fields").classList.add('hidden');
            document.getElementById("motor-fields").classList.add('hidden');
            document.getElementById("truck-fields").classList.add('hidden');

            // Show selected inputs fields
            if (selectedKendaraan === "App\\Models\\Mobil") {
                document.getElementById("mobil-fields").classList.remove('hidden');
            } else if (selectedKendaraan === "App\\Models\\Motor") {
                document.getElementById("motor-fields").classList.remove('hidden');
            } else if (selectedKendaraan === "App\\Models\\Truck") {
                document.getElementById("truck-fields").classList.remove('hidden');
            }
        }
    </script>
</x-app-layout>

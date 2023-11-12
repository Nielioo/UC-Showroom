<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Order') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg p-4">

                <x-validation-errors class="mb-4" />

                <form action="{{ route('orders.store') }}" method="POST">
                    @csrf
                    <div class="mt-4">
                        <x-label for="customer_id" value="{{ __('Nama Customer') }}" />
                        <select name="customer_id" id="customer_id">
                            <option disabled selected>Pilih Nama Customer</option>
                            @foreach ($customers as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-4">
                        <x-label for="kendaraan_id" value="{{ __('Model Kendaraan') }}" />
                        <select name="kendaraan_id" id="kendaraan_id">
                            <option disabled selected>Pilih Model Kendaraan</option>
                            @foreach ($kendaraans as $kendaraan)
                                <option harga="{{ $kendaraan->harga }}" value="{{ $kendaraan->id }}">
                                    {{ $kendaraan->model }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-4">
                        <x-label for="jumlah_pesanan" value="{{ __('Jumlah Pesanan') }}" />
                        <x-input id="jumlah_pesanan" class="block mt-1 w-full p-2" type="text" name="jumlah_pesanan"
                            :value="old('jumlah_pesanan')" required />
                    </div>
                    <div class="mt-4">
                        <x-label for="total_harga" value="{{ __('Total Harga') }}" />
                        <x-input id="total_harga" class="block mt-1 w-full p-2" type="text" name="total_harga"
                            value="0" disabled />

                        <x-button class="mt-4 p-1">
                            {{ __('Create') }}
                        </x-button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var kendaraanDropdown = document.getElementById("kendaraan_id");
            var jumlahPesananInput = document.getElementById("jumlah_pesanan");
            var totalHargaInput = document.getElementById("total_harga");

            kendaraanDropdown.addEventListener("change", function() {
                var selectedOption = kendaraanDropdown.options[kendaraanDropdown.selectedIndex];
                var harga = parseInt(selectedOption.getAttribute("harga"));

                // Perform calculations based on harga and jumlah_pesanan
                updateTotalHarga(harga);
            });

            jumlahPesananInput.addEventListener("input", function() {
                var selectedOption = kendaraanDropdown.options[kendaraanDropdown.selectedIndex];
                var harga = parseInt(selectedOption.getAttribute("harga"));

                // Perform calculations based on harga and jumlah_pesanan
                updateTotalHarga(harga);
            });

            function updateTotalHarga(harga) {
                var jumlahPesanan = parseInt(jumlahPesananInput.value);

                // if jumlahPesanan is null or not a number, set it to 0
                if (isNaN(jumlahPesanan)) {
                    jumlahPesanan = 0;
                }

                // Calculate and update total_harga
                var totalHarga = jumlahPesanan * harga;
                totalHargaInput.value = totalHarga;

                // You can use this totalHarga value for further processing or display
                console.log("Total Harga:", totalHarga);
            }
        });
    </script>

</x-app-layout>

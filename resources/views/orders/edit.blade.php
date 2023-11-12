<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Order') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg p-4">

                <x-validation-errors class="mb-4" />

                <form action="{{ route('orders.update', $order->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mt-4">
                        <x-label for="customer_id" value="{{ __('Nama Customer') }}" />
                        <select name="customer_id" id="customer_id">
                            <option disabled selected>{{ $order->customer->nama }}</option>
                        </select>
                    </div>
                    <div class="mt-4">
                        <x-label for="kendaraan_id" value="{{ __('Model Kendaraan') }}" />
                        <select name="kendaraan_id" id="kendaraan_id">
                            <option disabled selected>Pilih Model Kendaraan</option>
                            @foreach ($kendaraans as $kendaraan)
                                <option value="{{ $kendaraan->id }}" {{ $order->kendaraan_id == $kendaraan->id ? 'selected' : '' }}>{{ $kendaraan->model }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-4">
                        <x-label for="jumlah_pesanan" value="{{ __('Jumlah Pesanan') }}" />
                        <x-input id="jumlah_pesanan" class="block mt-1 w-full p-2" type="text" name="jumlah_pesanan"
                            value="{{$order->jumlah_pesanan}}" required />
                    </div>
                    <div class="mt-4">
                        <x-input id="harga_per_kendaraan" type="hidden" value="{{$order->kendaraan->harga}}" />
                        <x-label for="total_harga" value="{{ __('Total Harga') }}" />
                        <x-input id="total_harga" class="block mt-1 w-full p-2" type="text" name="total_harga"
                            value="{{$order->jumlah_pesanan * $order->kendaraan->harga}}" disabled />
                    </div>

                    <x-button class="mt-4 p-1">
                        {{ __('Edit') }}
                    </x-button>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Function to update total_harga based on jumlah_pesanan
        function updateTotalHarga() {
            var jumlahPesanan = parseInt(document.getElementById("jumlah_pesanan").value);
            var hargaPerKendaraan = parseInt(document.getElementById("harga_per_kendaraan").value);

            // if jumlahPesanan is null, set it to 0
            if (isNaN(jumlahPesanan)) {
                jumlahPesanan = 0;
            }

            // Calculate and update total_harga
            var totalHarga = jumlahPesanan * hargaPerKendaraan;
            document.getElementById("total_harga").value = totalHarga;
        }

        // Add event listener for the input change event
        document.getElementById("jumlah_pesanan").addEventListener("input", updateTotalHarga);
    </script>

</x-app-layout>

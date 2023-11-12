<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Orders') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg p-4">

                <a href="{{ route('orders.create') }}"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Tambah Order</a>
                <div class="mt-4">
                    <table class="table w-full text-sm border-b">
                        <thead class="bg-blue-200">
                            <tr>
                                <th class="px-6 py-3">Nama Customer</th>
                                <th class="px-6 py-3">Model Kendaraan</th>
                                <th class="px-6 py-3">Jumlah Pesanan</th>
                                <th class="px-6 py-3">Total Harga</th>
                                <th class="px-6 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td class="px-6 py-4">{{ $order->customer->nama }}</td>
                                    <td class="px-6 py-4">{{ $order->kendaraan->model }}</td>
                                    <td class="px-6 py-4">{{ $order->jumlah_pesanan }}</td>
                                    <td class="px-6 py-4">Rp {{ $order->jumlah_pesanan * $order->kendaraan->harga }}</td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('orders.edit', $order->id) }}" class="btn">Edit</a>
                                        <form action="{{ route('orders.destroy', $order->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

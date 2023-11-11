<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Orders') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <a href="{{ route('orders.create') }}" class="bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4 rounded">Tambah customer</a>

                <table class="table w-full text-sm border-b">
                    <thead class="bg-blue-300">
                        <tr>
                            <th scope="col" class="px-6 py-3">Nama</th>
                            <th scope="col" class="px-6 py-3">ID Card</th>
                            <th scope="col" class="px-6 py-3">Alamat</th>
                            <th scope="col" class="px-6 py-3">Nomor Telepon</th>
                            <th scope="col" class="px-6 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $customer)
                            <tr>
                                <td class="px-6 py-4">{{ $customer->nama }}</td>
                                <td class="px-6 py-4">{{ $customer->id_card }}</td>
                                <td class="px-6 py-4">{{ $customer->alamat }}</td>
                                <td class="px-6 py-4">{{ $customer->no_telepon }}</td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('orders.edit', $customer->id) }}" class="btn">Edit</a>
                                    <form action="{{ route('orders.destroy', $customer->id) }}" method="POST">
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

</x-app-layout>

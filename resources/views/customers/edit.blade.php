<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Customer') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-validation-errors class="mb-4" />

                <form action="{{ route('customers.update', $customer->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div>
                        <x-label for="nama" value="{{ __('Nama') }}" />
                        <x-input id="nama" class="block mt-1 w-full p-2" type="text" name="nama"
                            value="{{ $customer->nama }}" required autofocus />
                    </div>
                    <div class="mt-4">
                        <x-label for="id_card" value="{{ __('ID Card') }}" />
                        <x-input id="id_card" class="block mt-1 w-full p-2" type="text" name="id_card"
                            value="{{ $customer->id_card }}" required />
                    </div>
                    <div class="mt-4">
                        <x-label for="alamat" value="{{ __('Alamat') }}" />
                        <x-input id="alamat" class="block mt-1 w-full p-2" type="text" name="alamat"
                        value="{{ $customer->alamat }}" required />
                    </div>
                    <div class="mt-4">
                        <x-label for="no_telepon" value="{{ __('No Telepon') }}" />
                        <x-input id="no_telepon" class="block mt-1 w-full p-2" type="number" name="no_telepon"
                        value="{{ $customer->no_telepon }}" required />
                    </div>

                    <x-button class="mt-4 p-1">
                        {{ __('Edit') }}
                    </x-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

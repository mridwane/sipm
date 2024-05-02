<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Management Cars') }}
        </h2>
    </x-slot>

    <div class="mx-auto mt-6 space-y-6 max-w-7xl sm:px-6 lg:px-8">
        <Link href="/rental/create"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none ">
        Rental Create
        </Link>
        <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
            <x-splade-table :for="$transacs" as="$transac">
                <x-splade-cell user>
                    {{ $transac->user_id }}
                </x-splade-cell>
                <x-splade-cell car>
                    {{ $transac->car_id }}
                </x-splade-cell>
                <x-splade-cell total>
                    Rp. {{ number_format($transac->total, 0, ',', '.') }}
                </x-splade-cell>
                {{-- <x-splade-cell actions>
                    <Link modal href="/cars/{{ $car->id }}/edit"> Edit </Link>
                </x-splade-cell> --}}
            </x-splade-table>
        </div>
    </div>
</x-app-layout>

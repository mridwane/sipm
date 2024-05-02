<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Management Cars') }}
        </h2>
    </x-slot>

    <div class="mx-auto mt-6 space-y-6 max-w-7xl sm:px-6 lg:px-8">
        <Link href="/cars/create"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none ">
        Add Car
        </Link>
        <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
            <x-splade-table :for="$cars" as="$car">
                <x-splade-cell daily_rate>
                    Rp. {{ number_format($car->daily_rate, 0, ',', '.') }}
                </x-splade-cell>
                <x-splade-cell available>
                    @if ($car->available == 0)
                        <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded">
                            Not Available
                        </span>
                    @else
                        <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded">
                            Available
                        </span>
                    @endif
                </x-splade-cell>
                {{-- <x-splade-cell actions>
                    <Link modal href="/cars/{{ $car->id }}/edit"> Edit </Link>
                </x-splade-cell> --}}
            </x-splade-table>
        </div>
    </div>
</x-app-layout>

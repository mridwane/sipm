<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Management Cars') }}
        </h2>
    </x-slot>

    <div class="mx-auto mt-6 space-y-6 max-w-7xl sm:px-6 lg:px-8">
        <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
            <h3 class="mb-3 text-2xl font-bold">Check Cars</h3>
            {{-- <x-splade-form action="{{ route('rental.check') }}" class="space-y-6">
                <x-splade-input name="date_start" type="date" label="Start Date" />
                <x-splade-input name="date_end" type="date" label="End Date" />
                <x-splade-submit label="Check Cars" :spinner="false" />
            </x-splade-form> --}}
        </div>
        <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
            <x-splade-form action="{{ route('rental.store') }}" class="space-y-6">
                <x-splade-input name="date_start" type="date" />
                <x-splade-input name="date_end" type="date" />
                <x-splade-select name="car">
                    <option value="" selected disabled>Select Car</option>
                    @foreach ($cars as $car)
                        <option value="{{ $car->id }}">{{ $car->brand }} - <span class="font-bold">Daily Rate Rp.
                                {{ number_format($car->daily_rate, 0, ',', '.') }}</span></option>
                    @endforeach
                </x-splade-select>
                <x-splade-submit label="Order Now!" :spinner="false" />
            </x-splade-form>
        </div>
    </div>
</x-app-layout>

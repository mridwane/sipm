<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Create Car') }}
        </h2>
    </x-slot>

    <div class="mx-auto mt-6 space-y-6 max-w-7xl sm:px-6 lg:px-8">
        <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
            <x-splade-form action="{{ route('cars.store') }}">
                <x-splade-input name="brand" label="Brand" />
                <x-splade-input name="model" label="Model" />
                <x-splade-input name="plat_no" label="Plate Number" />
                <x-splade-input name="daily_rate" label="Daily Rate" />
                <x-splade-submit class="mt-3" label="Add Car" :spinner="true" />
            </x-splade-form>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded dark:bg-gray-800">
            <div class="container flex flex-wrap justify-between items-center mx-auto">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Dashboard') }}
                </h2>
                <div class="hidden justify-between items-center w-full md:flex md:w-auto md:order-1" id="mobile-menu-4">
                    <ul class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
                        <router-link :to="{ name: 'companies.index' }" class="text-sm font-medium">Companies</router-link>
                        <router-link :to="{ name: 'countries.index' }" class="text-sm font-medium">Countries</router-link>
                        <router-link :to="{ name: 'cities.index' }" class="text-sm font-medium">Cities</router-link>
                    </ul>
                </div>
            </div>
        </nav>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <router-view />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

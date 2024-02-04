<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Calender Section') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class=" mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Hello, ". $user ) }}
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <p class="text-center">
                You're welcomed
            </p>
        </div>
    </div>

</x-app-layout>

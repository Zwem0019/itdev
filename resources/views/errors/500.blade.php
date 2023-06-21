<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('500 INTERNAL SERVER ERROR') }}
        </h2>
    </x-slot>

    <div class="py-6">
    <div class="max-w-auto sm:px-6 lg:px-8">
    <div class="flex-col-1 justify-center bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <h2 class="font-serif text-center text-2xl">The world worked so hard it overheated.</h2>
        <img  class="mx-auto" src="https://cdn3d.iconscout.com/3d/premium/thumb/melted-earth-5232577-4390872.png?f=webp">
        <h3 class="font-serif text-center text-xl">But don't worry you can always go back or return to the homepage.</h3>
        <div class="flex">
        <div class="flex w-1/2 mx-auto mt-2"><a href="{{ url()->previous() }}" class="btn btn-default bg-transparent hover:bg-blue-500 text-blue-700 font-semibold relative hover:text-white py-2 px-4 mb-2 mx-auto border border-blue-500 hover:border-transparent rounded">Go Back</a>
        <a href="/" class="btn btn-default bg-transparent hover:bg-blue-500 text-blue-700 font-semibold relative hover:text-white py-2 px-4 mb-2 mx-auto border border-blue-500 hover:border-transparent rounded">Return to homepage</a>
    </div>
    </div>

    </div>
    </div>
</div>
</x-app-layout>


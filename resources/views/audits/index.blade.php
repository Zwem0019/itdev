<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ ('Audits') }}
        </h2>
    </x-slot>



    <div class="py-6">
        <div class="max-w-auto sm:px-6 lg:px-8 pb-2">
        <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold relative
hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
            <a href="/audits/create"> Create Audit</a>
        </button>
        </div>
        <div class="max-w-auto sm:px-6 lg:px-8">
            @livewire('auditpage')
        </div>

    </div>
    <script src="{{ asset('js/auditIndex.js')}}"></script>
</x-app-layout>

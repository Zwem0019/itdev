<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Audit: {{ $audit->AuditName }}
        </h2>
    </x-slot>

    <section>
        <ul class="mt-4">
        @foreach($audit->questions as $question)
            <li class="ml-6">{{$question->Question}}</li>
        @endforeach
        </ul>

        <section>
            <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold
        hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded mx-6 mt-4"><a href="/">Add a question</a></button>
        </section>

    </section>
</x-app-layout>

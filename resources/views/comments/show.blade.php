<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Comment: {{ $Comment->title }}
        </h2>
    </x-slot>

    <section>
        <li class="mt-4 ml-6">
            <span class="font-semibold text-xl text-gray-800 leading-tight">Name: </span><span>{{$Comment->name}}</span>
        </li>
        <li class="mt-4 ml-6">
            <span class="font-semibold text-xl text-gray-800 leading-tight">Content: </span><br><span>{{$Comment->content}}</span>
        </li>
    </section>

    <section>
        <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold
        hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded mx-6 mt-4">
            <a href="/Comments/{{$Comment->id}}/edit">Edit comment</a>
        </button>

    </section>
</x-app-layout>

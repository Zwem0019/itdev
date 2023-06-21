<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ ('Comments') }}
        </h2>
    </x-slot>

    <div class="py-12">


        <div class="max-w-auto sm:px-6 lg:px-8">
            <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold relative hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                <a href="/Comments/create"> Create Comment</a>
            </button>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-center text-outolightblue">
                        <thead class="text-xs text-outodarkblue uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Title
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Comment
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($comments as $comment)
                        <tr class="bg-white border-b">
                            <td class="px-6 py-4 font-medium text-outolightblue whitespace-nowrap">
                                <a href="/Comments/{{$comment->id}}">{{$comment->title}}</a>
                            </td>
                            <td class="px-6 py-4">
                            <a href="/Comments/{{$comment->id}}">{{$comment->content}}</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

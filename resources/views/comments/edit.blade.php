

<x-app-layout>
 <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Comment: {{ $Comment->title }}
        </h2>
    </x-slot>

    <form method="POST" action="{{ route('Comments.update', $Comment) }}">
        @csrf
        @method('PUT')

        <div class="relative py-3 sm:max-w-xl sm:mx-auto">
            <div class="relative px-4 py-10 bg-white mx-8 md:mx-0 shadow rounded-3xl sm:p-10">
                <div class="max-w-md mx-auto">
                    <div class="flex items-center space-x-5">
                        <div class="block pl-2 font-semibold text-xl self-start text-gray-700">
                            <h2 class="leading-relaxed">Update Comment</h2>
                            <p class="text-sm text-gray-500 font-normal leading-relaxed"></p>
                        </div>
                    </div>
                    <div class="divide-y divide-gray-200">
                        <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                            <div class="flex flex-col">
                                <label class="leading-loose">Name</label>
                                <label>
                                    <input name="name" type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" value="{{$Comment->name }}">
                                </label>
                                </div>
                            @error('name')
                                <div class="bg-red-100 border border-red-400 px-4 py-3 rounded relative" role="alert"><p class="block sm:inline text-sm text-red-700">{{ $message }}</p></div>
                            @enderror
                            <div class="flex flex-col">
                                <label class="leading-loose">Title</label>
                                <label>
                                    <input name="title" type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" value="{{$Comment->title }}">
                                </label>
                            </div>
                            @error('title')
                                <div class="bg-red-100 border border-red-400 px-4 py-3 rounded relative" role="alert"><p class="block sm:inline text-sm text-red-700">{{ $message }}</p></div>
                            @enderror

                            <div class="flex flex-col">
                                <label class="leading-loose">Content</label>
                                <label>
                                    <input name="content" type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" value="{{$Comment->content }}">
                                </label>
                            </div>
                            @error('content')
                                <div class="bg-red-100 border border-red-400 px-4 py-3 rounded relative" role="alert"><p class="block sm:inline text-sm text-red-700">{{ $message }}</p></div>
                            @enderror




                        </div>
                        <div class="pt-4 flex items-center space-x-4">
                            <a href="{{ route('Comments.index') }}"  class="btn btn-default flex justify-center items-center w-full text-gray-900 px-4 py-3 rounded-md focus:outline-none">
                                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg> Cancel
                            </a>
                            <button type="submit" class="bg-blue-500 flex justify-center items-center w-full text-white px-4 py-3 rounded-md focus:outline-none">Update</button>
                            </form>
                            <form action="{{ route('Comments.destroy', $Comment) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="bg-red-700 hover:bg-red-800 flex justify-center items-center w-full text-white px-4 py-3 rounded-md focus:outline-none">
                                 Delete</button>
                                 </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


</x-app-layout>

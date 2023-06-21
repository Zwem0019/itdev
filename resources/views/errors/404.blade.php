<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('404 NOT FOUND') }}
        </h2>
    </x-slot>

    <div class="py-6">
    <div class="max-w-auto sm:px-6 lg:px-8">
    <div class="flex-col-1 justify-center bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <h2 class="font-serif text-center text-2xl">We couldn't find the country you were looking for.</h2>
        <img  class="mx-auto" src="https://media.istockphoto.com/id/1215287240/nl/vector/verward-aardkarakter-met-vraagtekenbeeldmascottebol-karakterprobleemprobleemspanning-sparen.jpg?s=612x612&w=0&k=20&c=bZRzOSdOAZF6kTcA1bojG_mxdRwkG5-mRE9cqpHY9-M=">
        <h3 class="font-serif text-center text-xl">But don't worry you can always go back or return to the homepage and try again.</h3>
        <div class="flex">
        <div class="flex w-1/2 mx-auto mt-2"><a href="{{ url()->previous() }}" class="btn btn-default bg-transparent hover:bg-blue-500 text-blue-700 font-semibold relative hover:text-white py-2 px-4 mb-2 mx-auto border border-blue-500 hover:border-transparent rounded">Go Back</a>
        <a href="/" class="btn btn-default bg-transparent hover:bg-blue-500 text-blue-700 font-semibold relative hover:text-white py-2 px-4 mb-2 mx-auto border border-blue-500 hover:border-transparent rounded">Return to homepage</a>
    </div>
    </div>
    </div>
    </div>
</div>
</x-app-layout>

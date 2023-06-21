<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Audit: {{ $audit->AuditName }}
        </h2>
    </x-slot>

    <section>
        <li class="mt-4 ml-6">
            <span class="font-semibold text-xl text-gray-800 leading-tight">Name: </span><span>{{$audit->AuditName}}</span>
        </li>
        <li class="mt-4 ml-6">
            <span class="font-semibold text-xl text-gray-800 leading-tight">Type: </span><span>{{$audit->AuditType}}</span>
        </li>
        <li class="mt-4 ml-6">
            <span class="font-semibold text-xl text-gray-800 leading-tight">Status: </span><span>{{$audit->AuditStatus}}</span>
        </li>
        <li class="mt-4 ml-6">
            <span class="font-semibold text-xl text-gray-800 leading-tight">Frequency: </span><span>{{$audit->AuditFrequency}}</span>
        </li>
        <li class="mt-4 ml-6">
            <span class="font-semibold text-xl text-gray-800 leading-tight">Deadline: </span><span>{{$audit->AuditDeadline}}</span>
        </li>
        <li class="mt-4 ml-6">
            <span class="font-semibold text-xl text-gray-800 leading-tight">Priority: </span><span>{{$audit->AuditPriority}}</span>
        </li>
        <li class="mt-4 ml-6">
            <span class="font-semibold text-xl text-gray-800 leading-tight">Amount of questions: </span><span>{{$audit->questions->count()}}</span>
        </li>
    </section>

    <section>
        <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold
        hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded mx-6 mt-4">
            <a href="/audits/{{$audit->id}}/show"> Start Audit</a>
        </button>

        <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold
        hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded mx-6 mt-4">
            <a href="/audits/{{$audit->AuditSlug}}/questions/create">Add Question</a>
        </button>

        <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold
        hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded mx-6 mt-4">
            <a href="/audits/{{$audit->id}}/questions/view">View questions</a>
        </button>
    </section>
</x-app-layout>

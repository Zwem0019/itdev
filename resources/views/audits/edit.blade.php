<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Audit: {{ $audit->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <h1>Edit current audit</h1>

        <form  method="POST" action="{{ route('audits.show', $audit) }}">
            @csrf
            @method('PUT')
            <div class="field">
                <label class="label" for="name">Name</label>

                <div class="control">
                    <input class="input" type="text" name="name" id="name" value="{{ $audit->name }}">
                </div>
            </div>

            <div class="field">
                <label class="label" for="task">Task</label>

                <div class="control">
                    <textarea class="textarea" name="task" id="task">{{ $audit->task }}</textarea>
                </div>
            </div>

            <div class="field">
                <label class="label" for="deadline">Deadline</label>

                <div class="control">
                    <textarea class="textarea" name="deadline" id="deadline">{{ $audit->deadline }}</textarea>
                </div>
            </div>

            <div class="field is-grouped">
                <div class="control">
                    <button class="button is-link" type="submit">Submit</button>
                </div>
            </div>
        </form>

        <form method="POST" action="/audits/{{ $audit->id }}">
            @csrf
            @method('DELETE')

            <div class="field is-grouped">
                <div class="control">
                    <button class="button is-link" type="submit">Delete</button>
                </div>
            </div>
        </form>

        <form method="HEAD" action="/audits">
            @csrf
            <div class="field is-grouped">
                <div class="control">
                    <button class="button is-link" type="submit">Cancel</button>
                </div>
            </div>
        </form>
    </div>

    </div>
</x-app-layout>

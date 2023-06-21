<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        </h2>
    </x-slot>
    @if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <ul class="list-disc">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
    <form method="POST" action="{{ route('audits.store') }}">
        @csrf
    <div class="min-h-screen bg-gray-100 py-6 flex flex-col justify-center sm:py-12">
        <div class="relative py-3 sm:max-w-xl sm:mx-auto">
            <div class="relative px-4 py-10 bg-white mx-8 md:mx-0 shadow rounded-3xl sm:p-10">
                <div class="max-w-md mx-auto">
                    <div class="flex items-center space-x-5">
                        <div class="h-14 w-14 bg-yellow-200 rounded-full flex flex-shrink-0 justify-center items-center text-yellow-500 text-2xl font-mono">i</div>
                        <div class="block pl-2 font-semibold text-xl self-start text-gray-700">
                            <h2 class="leading-relaxed">Add an audit!</h2>
                            <p class="text-sm text-gray-500 font-normal leading-relaxed">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </div>
                    <div class="divide-y divide-gray-200">
                        <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                            <div class="flex flex-col">
                                <label class="leading-loose">AuditName</label>
                                <label>
                                    <input name="AuditName" type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="Your Question">
                                </label>
                            </div>

                            @error('AuditName')
                            <div class="bg-red-100 border border-red-400 px-4 py-3 rounded relative" role="alert"><p class="block sm:inline text-sm text-red-700">{{ $message }}</p></div>
                            @enderror

                            <label>
                                <input id="AuditType" name="AuditType" type="hidden" value="Test">
                            </label>

                            <label>
                                <input id="start_date" name="start_date" type="hidden" value="">
                            </label>

                            <label>
                                <input id="end_date" name="end_date" type="hidden" value="">
                            </label>

                            <label>
                                <input id="AuditSlug" name="AuditSlug" type="hidden" value="{{\Illuminate\Support\Str::random(10)}}">
                            </label>

                            <label>
                                <input id="AuditStatus" name="AuditStatus" type="hidden" value="Not Started">
                            </label>

                            <label>
                                <h2 class="mt-4">Frequency</h2>
                                <input id="AuditFrequency" name="AuditFrequency" type="radio" value="Once" checked>Once<br>
                                <input id="AuditFrequency" name="AuditFrequency" type="radio" value="Every Shift">Every Shift<br>
                                <input id="AuditFrequency" name="AuditFrequency" type="radio" placeholder="" value="Daily">Daily<br>
                                <input id="AuditFrequency" name="AuditFrequency" type="radio" placeholder="" value="Weekly">Weekly<br>
                                <input id="AuditFrequency" name="AuditFrequency" type="radio" placeholder="" value="Monthly">Monthly<br>
                            </label>

                            <label id="AuditDeadline">
                                <h2 class="mt-4">Deadline</h2>
                                <input name="AuditDeadline" type="date" min="{{\Carbon\Carbon::today()->format('Y-m-d')}}" value="">
                            </label>

                            @error('AuditDeadline')
                            <div class="bg-red-100 border border-red-400 px-4 py-3 rounded relative" role="alert"><p class="block sm:inline text-sm text-red-700">{{ $message }}</p></div>
                            @enderror

                            <label>
                                <h2 class="mt-4">Priority</h2>
                                <input id="AuditPriority" name="AuditPriority" type="radio" value="Low" checked>Low<br>
                                <input id="AuditPriority" name="AuditPriority" type="radio" value="Medium">Medium<br>
                                <input id="AuditPriority" name="AuditPriority" type="radio" value="High">High<br>
                            </label>

                        </div>
                        <div class="pt-4 flex items-center space-x-4">
                            <button class="flex justify-center items-center w-full text-gray-900 px-4 py-3 rounded-md focus:outline-none">
                                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg> Cancel
                            </button>
                            <button type="submit" class="bg-blue-500 flex justify-center items-center w-full text-white px-4 py-3 rounded-md focus:outline-none">Create</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
    </div>

        <script src="{{ asset('js/auditForm.js')}}"></script>
</x-app-layout>

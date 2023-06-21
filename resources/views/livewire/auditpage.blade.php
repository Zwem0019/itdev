<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg sm:p-2 lg:p-4">
<div class="p-2 md:p-3">
<div>
    <div class="w-full flex pb-3">
        <div class="w-2/6 mx-1">
            <input wire:model.debounce.300ms="search" type="text" class="appearance-none block w-full h-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"placeholder="Search audits...">
        </div>
        <div class="w-2/6 relative mx-1">
            <select wire:model="perPage" class="block appearance-none w-full h-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                <option disabled>Per Page</option>
                <option>10</option>
                <option>25</option>
                <option>50</option>
                <option>100</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700"></div>
        </div>
        <div class="w-2/6 mx-1">
            <div class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-3 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                <label class="relative flex items-center cursor-pointer">
                  <input type="checkbox" wire:model="includeCompleted" value="" class="sr-only peer">
                    <div class="w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700 md:peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                  <span class="ml-3 text-xs md:text-sm">Completed</span>
                </label>
            </div>
        </div>
    </div>
    <table class="table-auto text-xs lg:text-sm text-center w-full mb-6">
        <thead>
            <tr>
                <x-table.heading sortable wire:click="sortBy('AuditType')" :direction="$orderBy === 'AuditType' ? $orderAsc : null"></x-table.heading>
                <x-table.heading sortable wire:click="sortBy('AuditType')" :direction="$orderBy === 'AuditType' ? $orderAsc : null">Type</x-table.heading>
                <x-table.heading sortable wire:click="sortBy('auditdeadline')" :direction="$orderBy === 'auditdeadline' ? $orderAsc : null">Deadline</x-table.heading>
                <x-table.heading sortable wire:click="sortBy('auditname')" :direction="$orderBy === 'auditname' ? $orderAsc : null">Name</x-table.heading>
                <x-table.heading sortable wire:click="sortBy('auditstatus')" :direction="$orderBy === 'auditstatus' ? $orderAsc : null">Status</x-table.heading>
                <x-table.heading sortable wire:click="sortBy('auditpriority')" :direction="$orderBy === 'auditpriority' ? $orderAsc : null">Priority</x-table.heading>
                <x-table.heading sortable wire:click="sortBy('AuditFrequency')" :direction="$orderBy === 'AuditFrequency' ? $orderAsc : null">Frequency</x-table.heading>
                <x-table.heading sortable wire:click="sortBy('start_date')" :direction="$orderBy === 'start_date' ? $orderAsc : null">Start Date</x-table.heading>
                <x-table.heading sortable wire:click="sortBy('end_date')" :direction="$orderBy === 'end_date' ? $orderAsc : null">End Date</x-table.heading>
            </tr>
        </thead>
        <tbody>
            @foreach($audits as $audit)
                <tr class="hover:bg-outolightblue hover:text-white"  itemid="{{ $audit->id }}">
                    <td class="border px-1 md:px-4 py-1 md:py-2"><button wire:click="changePinned({{$audit->id}})"><img src={{ $audit->isPinned === 0 ? asset("/sources/unpin-icon.png") : asset("/sources/pin-icon.png")}}  class="w-5 justify-center object-center" alt="Pin Icon"></button></td>
                    <td class="border px-1 md:px-4 py-1 md:py-2" style='cursor: pointer;' onclick='tdclick(event); return false;'>{{ $audit->AuditType }}</td>
                    <td class="border px-1 md:px-4 py-1 md:py-2" style='cursor: pointer;' onclick='tdclick(event); return false;'>{{ $audit->AuditDeadline }}</td>
                    <td class="border px-1 md:px-4 py-1 md:py-2" style='cursor: pointer;' onclick='tdclick(event); return false;'>{{ $audit->AuditName }}</td>
                    <td class="border px-1 md:px-4 py-1 md:py-2" style='cursor: pointer;' onclick='tdclick(event); return false;'>{{ $audit->AuditStatus }}</td>
                    <td class="border px-1 md:px-4 py-1 md:py-2" style='cursor: pointer;' onclick='tdclick(event); return false;'>{{ $audit->AuditPriority }}</td>
                    <td class="border px-1 md:px-4 py-1 md:py-2" style='cursor: pointer;' onclick='tdclick(event); return false;'>{{ $audit->AuditFrequency }}</td>
                    <td class="border px-1 md:px-4 py-1 md:py-2" style='cursor: pointer;' onclick='tdclick(event); return false;'>{{ $audit->start_date }}</td>
                    <td class="border px-1 md:px-4 py-1 md:py-2" style='cursor: pointer;' onclick='tdclick(event); return false;'>{{ $audit->end_date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $audits->links() !!}
    <script>
        function tdclick(e) {
            var itemid = e.target.parentElement.getAttribute('itemid');
            window.location.href = '/audits/' + itemid;
        }
    </script>
</div>
</div>
</div>


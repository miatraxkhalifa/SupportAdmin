<div class="container grid px-2 pt-6 mx-auto">
    <h2 class="my-2 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        For Hardware Pick Up(Return to Engagis)
    </h2>
    <div class="flex justify-between flex-wrap">
        <div class="relative w-full max-w-xl focus-within:text-purple-500 my-2">
            <div class="absolute inset-y-0 flex items-center pl-2">
                <svg class="w-4 h-4 dark:text-purple-400 text-purple-800" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                </svg>
            </div>
            <input wire:model.debounce.500ms="q" class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input" type="text" placeholder="Search by SO, Case or Client" aria-label="Search" />
        </div>
    </div>

    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">SO & Client</th>
                        <th class="px-4 py-3">Case Number & Task Status</th>
                        <th class="px-4 py-3">Task Owner</th>
                        <th class="px-4 py-3">Return Status</th>
                        <th class="px-4 py-3">Pick Up Task Link</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @forelse($tasks as $task)
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3">

                            <div class="flex items-center text-sm">
                                <div>
                                    @isset($task->SO->SONumber)
                                    <p class="font-semibold">
                                        {{$task->SO->SONumber}}
                                    </p>
                                    @else
                                    <span class="px-1 py-1 -ml-2 font-semibold text-xs leading-tight text-pink-700 bg-pink-100 rounded-full dark:bg-pink-700 dark:text-pink-100">
                                        SO to be created
                                    </span>
                                    @endisset

                                    <p class="text-xs text-gray-600 mt-1 dark:text-gray-400">
                                        {{$task->client}}
                                    </p>

                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-xs space-x-1">
                            <div class="flex items-center text-sm">
                                <div>
                                    <p class="font-semibold">{{$task->case}}</p>
                                    <p class="text-xs text-gray-600 dark:text-gray-400">
                                        {{$task->TaskType->name}} |
                                        @if($task->SO->Status == 'WIP')
                                        <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
                                            {{$task->SO->Status}} </span>

                                        @elseif($task->SO->Status == 'Awaiting Dispatch')
                                        <span class="px-2 py-1 font-semibold leading-tight text-pink-700 bg-pink-100 rounded-full dark:bg-pink-700 dark:text-pink-100">
                                            {{$task->SO->Status}} </span>

                                        @elseif($task->SO->Status == 'Awaiting Hardware')
                                        <span class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:bg-orange-700 dark:text-orange-100">
                                            {{$task->SO->Status}} </span>

                                        @elseif($task->SO->Status == 'Cancelled')
                                        <span class="px-2 py-1 font-semibold leading-tight text-gray-700 bg-gray-100 rounded-full dark:bg-red-700 dark:text-gray-100">
                                            {{$task->SO->Status}} </span>

                                        @elseif($task->SO->Status == 'onHold')
                                        <span class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-full dark:bg-yellow-700 dark:text-yellow-100">
                                            {{$task->SO->Status}}</span>

                                        @elseif($task->SO->Status == 'Shipped')
                                        <span class="px-2 py-1 font-semibold leading-tight text-blue-700 bg-blue-100 rounded-full dark:bg-blue-700 dark:text-blue-100">
                                            {{$task->SO->Status}} </span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </td>

                        <td class="px-4 py-3 text-sm">
                            <span class="px-2 py-1 -ml-4 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                {{$task->Owner->name}}
                            </span>
                        </td>

                        <td class="px-4 py-3 text-xs">
                            @isset($task->SO->HardwareReturn)
                            @if($task->SO->HardwareReturn->status == 0)
                            <span class="px-2 py-1 text-xs font-semibold leading-tight text-gray-700 bg-gray-100 rounded-full dark:bg-gray-700 dark:text-gray-100">
                                For Collection </span>
                            @elseif($task->SO->HardwareReturn->status == 1) <span class="px-2 py-1 text-xs font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
                                For Pick up </span>
                            @elseif($task->SO->HardwareReturn->status == 2) <span class="px-2 py-1 text-xs font-semibold leading-tight text-blue-700 bg-blue-100 rounded-full dark:bg-blue-700 dark:text-blue-100">
                                Shipped </span>
                            @elseif($task->SO->HardwareReturn->status == 3) <span class="px-2 py-1 text-xs font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                Returned </span>
                            @elseif($task->SO->HardwareReturn->status == 4) <span class="px-2 py-1 text-xs font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-full dark:bg-yellow-700 dark:text-yellow-100">
                                For RA </span>
                            @endif
                            @else
                            <span class="px-2 py-1 text-xs font-semibold leading-tight text-gray-700 bg-gray-100 rounded-full dark:bg-gray-700 dark:text-gray-100">
                                Awaiting SO Completion </span>
                            @endisset
                        </td>

                        <td class="px-4 py-3">
                            @isset($task->SO->HardwareReturn)
                            <a href="{{route('dashboard.show', [$task->SO->HardwareReturn->tasks_id]) }}" class="flex ml-4 w-1/6 items-center justify-between  text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg> </a>
                            @else
                            <span class="px-2 py-1 ml-8 text-xs font-semibold leading-tight text-gray-700 bg-gray-100 rounded-full dark:bg-gray-700 dark:text-gray-100">
                                None </span>
                            @endisset
                        </td>
                    </tr>
                    @empty

                    <p class="dark:text-white">No quotes found</p>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{$tasks->links('vendor.pagination.simple-tailwind')}}
    </div>
</div>
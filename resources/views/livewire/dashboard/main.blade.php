<section wire:poll.keep-alive>
    <div class="container grid px-6 mx-auto">
        <div class="flex w-full justify-between flex-wrap mb-2">
            <div class="relative w-3/4 focus-within:text-purple-500 mt-2">
                <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    Dashboard
                </h2>
            </div>
            <div class="relative w-1/4 focus-within:text-purple-500 mt-2 ">
                <button wire:click="new" class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    <span>New Task</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-2 -mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Cards -->
        <div class="grid gap-6 mb-8 md:grid-cols-2">
            <!-- Card -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        Total Open Tasks
                    </p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                        {{$total->where('status','=',0)->count()}}
                    </p>
                </div>
            </div>
            <!-- Card -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        Total In Progress Tasks
                    </p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                        {{$total->where('status','=',1)->count()}}
                    </p>
                </div>
            </div>
        </div>
        <!-- Search / Filters -->
        <div class="flex justify-between flex-wrap">
            <div class="relative w-1/4 max-w-xl focus-within:text-purple-500 my-2">
                <div class="absolute inset-y-0 flex items-center pl-2">
                    <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <input wire:model.debounce.500ms="q" class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input" type="text" placeholder="Search Case" aria-label="Search" />
            </div>
            <div class="relative w-1/4 max-w-xl focus-within:text-purple-500 my-2">
                <select wire:model="task_type" class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input">
                    <option value="">Task Type </option>
                    @forelse($tasktypes as $tasktype)
                    <option value="{{$tasktype->id}}">{{$tasktype->name}} </option>
                    @empty
                    @endforelse
                </select>
                <div class="absolute inset-y-0 right-0 flex items-center mr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                    </svg>
                </div>
            </div>
            <div class="relative w-1/4 max-w-xl focus-within:text-purple-500 my-2">
                <select wire:model="adminSupport" class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input">
                    <option value="">Admin </option>
                    @forelse($admins as $admin)
                    <option value="{{$admin->id}}">{{$admin->name}} </option>
                    @empty
                    @endforelse
                </select>
                <div class="absolute inset-y-0 right-0 flex items-center mr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                    </svg>
                </div>
            </div>
            <div class="relative w-1/5 max-w-xl focus-within:text-purple-500 my-2">
                <select wire:model="status" class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input">
                    <option value="0">Status </option>
                    <option value="1">Pending</option>
                    <option value="2">Grabbed</option>
                    <option value="3">Completed</option>
                </select>
                <div class="absolute inset-y-0 right-0 flex items-center mr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                    </svg>
                </div>
            </div>
        </div>



        <!-- Table -->
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Date Created</th>
                            <th class="px-4 py-3">Case</th>
                            <th class="px-4 py-3">Client</th>
                            <th class="px-4 py-3">Task Type</th>
                            <th class="px-4 py-3">Owner</th>
                            <th class="px-4 py-3">Admin</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Action</th>
                            <th class="px-4 py-3"></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @forelse($tasks as $task)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3 text-xs space-x-1">


                                <p class="font-semibold"> {{
                \Carbon\Carbon::parse($task->created_at)->toFormattedDateString() }}</p>
                                <p class="text-xs text-gray-600 dark:text-gray-400">
                                    {{ \Carbon\Carbon::parse($task->created_at)->diffForHumans() }}
                                </p>

                            </td>
                            <td class="px-4 py-3 text-xs space-x-1">
                                {{$task->case}}
                            </td>
                            <td class="px-4 py-3 text-xs space-x-1">
                                {!! implode(' ', array_slice(explode(' ', $task->client), 0, 3)); !!}
                            </td>
                            <td class="px-4 py-3 text-xs space-x-1">
                                {{$task->TaskType->name}}
                            </td>
                            <td class="px-4 py-3 text-xs space-x-1">
                                {{$task->Owner->name}}
                            </td>
                            <td class="px-4 py-3 text-xs space-x-1">
                                @isset($task->Admin->name)
                                {{$task->Admin->name}}
                                @endisset
                            </td>
                            <td class="px-4 py-3 text-xs space-x-1">

                                @if($task->status === 1)
                                <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
                                    Pending
                                </span>
                                @elseif($task->status === 2)
                                <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                    Grabbed
                                </span>
                                @elseif($task->status === 3)
                                <span class="px-2 py-1 font-semibold leading-tight text-gray-700 bg-gray-100 rounded-full dark:bg-gray-700 dark:text-gray-100">
                                    Completed
                                </span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-xs space-x-1">
                                <div class="flex items-center text-sm">
                                    <a href="{{route('dashboard.show', [$task->id]) }}"" class=" flex items-center justify-between px-1 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                            </path>
                                        </svg>
                                    </a>
                                    @if($task->owner == auth()->user()->id)
                                    <button wire:click="delete({{$task->id}})" class="flex items-center justify-between px-1 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Delete">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                    @endif
                                </div>
                            </td>
                            <td class="px-4 py-3 text-xs space-x-1">
                                @if($task->status === 1)
                                <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
                                    Grab
                                </span>
                                @elseif($task->status === 2)
                                <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                    Mark as completed
                                </span>

                                @endif
                            </td>
                        </tr>
                        @empty <p class="dark:text-white"> Nothing here </p>
                        @endforelse
                    </tbody>
                </table>
            </div> {{$tasks->links('vendor.pagination.simple-tailwind')}}
        </div>

        <x-dialog-modal wire:model.defer="newTask">
            <x-slot name="title">
                {{ __('New Task') }}
            </x-slot>

            <x-slot name="content">
                <label class="block mt-4 text-sm">
                    <select wire:model="adminSupport" class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-800 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-800  dark:text-black focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input">
                        <option value="">Select a task </option>
                        @forelse($tasktypes as $task)
                        <option value="{{$task->id}}">{{$task->name}} </option>
                        @empty
                        @endforelse
                    </select>
                </label>
                @if($adminSupport == 1)
                @livewire('dashboard.new-task.hardware-replacement')
                @endif
                @if($adminSupport == 2)
                @livewire('dashboard.new-task.onsite-tech')
                @endif
                @if($adminSupport == 3)
                @livewire('dashboard.new-task.warranty-repair')
                @endif
                @if($adminSupport == 4)
                @livewire('dashboard.new-task.invoice-request')
                @endif
                @if($adminSupport == 5)
                @livewire('dashboard.new-task.hardware-return')
                @endif
                @if($adminSupport == 6)
                @livewire('dashboard.new-task.item-inquiry')
                @endif
                @if($adminSupport == 7)
                @livewire('dashboard.new-task.onsite-tech-scoping')
                @endif
            </x-slot>

            <x-slot name="footer">

            </x-slot>
        </x-dialog-modal>

        <x-dialog-modal wire:model.defer="deleteTask">
            <x-slot name="title">
                {{ __('Delete Task ') }}
            </x-slot>
            <x-slot name="content">
                Are you sure you want to delete this task?
            </x-slot>
            <x-slot name="footer">
                <x-secondary-button wire:click="$set('deleteTask', false)">
                    Cancel
                </x-secondary-button>
                <x-button wire:click="confirmDelete">
                    Accept
                </x-button>
            </x-slot>
        </x-dialog-modal>
    </div>
</section>
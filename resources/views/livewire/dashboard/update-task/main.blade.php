<div>
    <div class=" dark:bg-gray-700 shadow overflow-hidden sm:rounded-lg ml-2 mr-2 mt-2 mb-2">
        <div class="flex w-full justify-between flex-wrap rounded-lg shadow-sm dark:shadow-sm mb-2">
            <div class="px-2 py-3 sm:px-4 ">
                <h3 class="text-lg leading-6 font-small text-gray-900 dark:text-white">{{$task->TaskType->name}}</h3>
                <p class="mt-1 max-w-2xl text-xs text-gray-500 dark:text-white">Engagis Support Admin Task Details.</p>
                <p class="mt-1 max-w-2xl text-xs text-gray-400 dark:text-white"> Created at: <span class="text-xs text-gray-600 dark:text-gray-400"> {{ \Carbon\Carbon::parse($task->created_at)->diffForHumans() }} </span></p>
                <p class="mt-1 max-w-2xl text-xs text-gray-400 dark:text-white"> Updated at: <span class="text-xs text-gray-600 dark:text-gray-400"> {{ \Carbon\Carbon::parse($task->updated_at)->diffForHumans() }} </span></p>
            </div>
            <div class="px-2 py-3 sm:px-4">
                <p class="mt-1 max-w-2xl text-xs text-gray-500 dark:text-white">Status:
                    <select wire:model.defer="status" class="w-full px-1 py-1  mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                        <option value="1">Pending</option>
                        <option value="2">Grabbed</option>
                        <option value="3">Completed</option>
                    </select>
                </p>
            </div>
            <div class="px-2 py-3 sm:px-4">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    <button wire:click.prevent="update" class="px-2 py-1 text-xs font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        Save
                    </button>
                </h3>
            </div>
        </div>

        <!-- Task Table -->
        <div class="grid gap-2 md:grid-cols-2 xl:grid-cols-2 mb-2 ">
            <div class="border-black space-x-2 space-y-2 rounded-lg shadow-xs dark:bg-gray-700">
                <dl>
                    <div class="px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs mt-2 font-small text-gray-500 dark:text-gray-50">Case Number:</dt>
                        <dd class="text-xs text-gray-900 dark:text-gray-100 sm:mt-0 sm:col-span-2">
                            <input wire:model.defer="case" class="block w-1/2 px-1 py-1 text-xs dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Jane Doe" />
                        </dd>
                    </div>
                    <div class="px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs mt-2 font-small text-gray-500 dark:text-gray-50">Client:</dt>
                        <dd class="text-xs text-gray-900 dark:text-gray-100 sm:mt-0 sm:col-span-2">
                            <input wire:model.defer="client" class="block w-1/2 px-1 py-1 text-xs dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Jane Doe" />
                        </dd>
                    </div>
                </dl>
            </div>
            <div class="border-gray-200 space-x-2 space-y-2 rounded-lg shadow-xs  dark:bg-gray-700">
                <dl>
                    <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs font-small text-gray-500 dark:text-gray-50">Case Owner:</dt>
                        <dd class="text-xs text-gray-900 sm:mt-0 sm:col-span-2 dark:text-gray-100"> {{$task->Owner->name}} </dd>
                    </div>

                    <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs font-small text-gray-500 mt-1 dark:text-gray-50">Admin Owner:</dt>
                        <dd class="text-xs text-gray-900 sm:mt-0 sm:col-span-2 dark:text-gray-100 mt-1">
                            @isset($task->Admin->name){{$task->Admin->name}} @endisset</dd>
                    </div>
                </dl>
            </div>
        </div>

        <!--Onsite Tech Table -->
        @isset($task->OnsiteTech)
        @livewire('dashboard.update-task.onsite-tech',['task' => $task])
        @endisset

        <!--Invoice Request Table -->
        @isset($task->InvoiceRequest)
        @livewire('dashboard.update-task.invoice-request',['task' => $task])
        @endisset

        <!--OnsiteTech Scoping Table -->
        @isset($task->OnsiteTechScoping)
        @livewire('dashboard.update-task.onsite-tech-scoping',['task' => $task])
        @endisset

        <!--ItemInquiry Scoping Table -->
        @isset($task->ItemInquiry)
        @livewire('dashboard.update-task.item-inquiry',['task' => $task])
        @endisset

        <!--WarrantyRepair Table -->
        @isset($task->WarrantyRepair)
        @livewire('dashboard.update-task.warranty-repair',['task' => $task])
        @endisset

        <!--HardwareReturn Table -->
        @isset($task->HardwareReturn)
        @livewire('dashboard.update-task.hardware-return',['task' => $task])
        @endisset

        <!--SO Table -->
        @isset($task->SO)
        @livewire('dashboard.update-task.hardware-replacement',['task' => $task])
        @endisset
    </div>
</div>
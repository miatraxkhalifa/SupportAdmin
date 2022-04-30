<div>
    <div class="grid gap-2 mb-2 md:grid-cols-2 xl:grid-cols-2">
        <div class="border-gray-200 space-x-2 space-y-2 rounded-lg shadow-xs dark:bg-gray-700">
            <dl>
                <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                    <dt class="text-xs font-small mt-1 text-gray-500 dark:text-gray-100">Hardware Disposal:</dt>
                    <dd class="text-xs  sm:mt-0 sm:col-span-2 dark:text-gray-200 text-gray-900">
                        <select wire:model.defer="disposal" class="w-3/4 px-1 py-1  mt-1 text-xs dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                            <option value="1">Engagis Tech to Dispose</option>
                            <option value="2"> Store to Dispose</option>
                            <option value="3"> Return to Engagis</option>
                        </select>
                    </dd>
                </div>
                <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                    <dt class="text-xs font-small mt-1 text-gray-500 dark:text-gray-100">SO Status:</dt>
                    <dd class="text-xs  sm:mt-0 sm:col-span-2 dark:text-gray-200 text-gray-900">
                        <select wire:model.defer="Status" class="w-3/4 px-1 py-1  mt-1 text-xs dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                            <option value="WIP">Engagis Tech to Dispose</option>
                            <option value="Awaiting Dispatch">Awaiting Dispatch</option>
                            <option value="Awaiting Hardware">Awaiting Hardware</option>
                            <option value="Cancelled">Cancelled</option>
                            <option value="onHold">onHold</option>
                            <option value="Shipped"> Shipped</option>
                        </select>
                    </dd>
                </div>
                <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                    <dt class="text-xs mt-1 font-small text-gray-500 dark:text-gray-100"> Device Name:</dt>
                    <dd class="text-xs text-gray-900 sm:mt-0 sm:col-span-2 dark:text-gray-200">
                        <input wire:model.defer="deviceName" class="block  w-3/4 px-1 py-1 text-xs dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Device Name" />
                    </dd>
                </div>
                <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                    <dt class="text-xs mt-1 font-small text-gray-500 dark:text-gray-100"> Hardware Type:</dt>
                    <dd class="text-xs text-gray-900 sm:mt-0 ml-1 sm:col-span-2 dark:text-gray-200"> {{$task->SO->SO_TYPE->name }}</dd>
                </div>
                <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                    <dt class="text-xs mt-1 font-small text-gray-500 dark:text-gray-100"> Approver:</dt>
                    <dd class="text-xs ml-1 text-gray-900 sm:mt-0 mt-1 sm:col-span-2 dark:text-gray-200"> {{$task->SO->Approver->name }}</dd>
                </div>
            </dl>
        </div>
        <div class="border-gray-200 space-x-2 space-y-2 rounded-lg shadow-xs dark:bg-gray-700">
            <dl>
                <dl>
                    <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs mt-1 font-small text-gray-500 dark:text-gray-100"> Contact Name :</dt>
                        <dd class="text-xs text-gray-900 sm:mt-0 sm:col-span-2 dark:text-gray-200">
                            <input wire:model.defer="contactName" class="block  w-3/4 px-1 py-1 text-xs dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="contactName" />
                        </dd>
                    </div>
                    <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs font-small mt-1 text-gray-500 dark:text-gray-100"> Contact Number :</dt>
                        <dd class="text-xs text-gray-900 sm:mt-0 sm:col-span-2 dark:text-gray-200">
                            <input wire:model.defer="contactNumber" class="block  w-3/4 px-1 py-1 text-xs dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="contactNumber" />
                        </dd>
                    </div>
                    <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs font-small mt-1 text-gray-500 dark:text-gray-100"> Contact Email :</dt>
                        <dd class="text-xs text-gray-900 sm:mt-0 sm:col-span-2 dark:text-gray-200">
                            <input wire:model.defer="contactEmail" class="block  w-3/4 px-1 py-1 text-xs dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="contactEmail" />
                        </dd>
                    </div>
                    <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                        <dt class="text-xs mt-1 font-small text-gray-500 dark:text-gray-100"> Reason for Replacement:</dt>
                        <dd class="text-xs  text-gray-900 sm:mt-0 sm:col-span-2 dark:text-gray-200"> <input wire:model.defer="remarks" class="block w-3/4 px-1 py-1 text-xs dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Reason for replacement" /> </dd>
                    </div>
                </dl>
            </dl>
        </div>
    </div>
    @isset($task->SO->SO_Type_MP)
    @livewire('dashboard.update-task.hardware-replacement.media-player',['task' => $task])
    @endisset
    @isset($task->SO->SO_Type_Network)
    @livewire('dashboard.update-task.hardware-replacement.network',['task' => $task])
    @endisset
    @isset($task->SO->SO_Type_Others)
    @livewire('dashboard.update-task.hardware-replacement.others',['task' => $task])
    @endisset
    @isset($task->SO->SO_Type_Projector)
    @livewire('dashboard.update-task.hardware-replacement.projector',['task' => $task])
    @endisset
    @isset($task->SO->SO_Type_ProjectorLamp)
    @livewire('dashboard.update-task.hardware-replacement.projector-lamp',['task' => $task])
    @endisset
    @isset($task->SO->SO_Type_Screen)
    @livewire('dashboard.update-task.hardware-replacement.screen',['task' => $task])
    @endisset
</div>
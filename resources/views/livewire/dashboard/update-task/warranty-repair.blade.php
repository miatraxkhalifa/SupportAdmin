<div>
    <div class="grid gap-2 mb-2 md:grid-cols-2 xl:grid-cols-2">
        <div class="border-gray-200 space-x-2 space-y-2 rounded-lg shadow-xs dark:bg-gray-700">
            <dl>
                <div class="px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                    <dt class="text-xs mt-2 font-small text-gray-500 dark:text-gray-50">Issue Reported:</dt>
                    <dd class="text-xs text-gray-900 dark:text-gray-100 sm:mt-0 sm:col-span-2">
                        <input wire:model.defer="issue" class="block w-3/4 px-1 py-1 text-xs dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Jane Doe" />
                    </dd>
                </div>
                <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                    <dt class="text-xs font-small text-gray-500 dark:text-gray-100">Hardware Type:</dt>
                    <dd class="text-xs ml-1 sm:mt-0 sm:col-span-2 dark:text-gray-200 text-gray-900"> {{$task->WarrantyRepair->type}} </dd>
                </div>
                <div class="px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                    <dt class="text-xs mt-2 font-small text-gray-500 dark:text-gray-50">Contact Name:</dt>
                    <dd class="text-xs text-gray-900 dark:text-gray-100 sm:mt-0 sm:col-span-2">
                        <input wire:model.defer="contactName" class="block w-3/4 px-1 py-1 text-xs dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Jane Doe" />
                    </dd>
                </div>
                <div class="px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                    <dt class="text-xs mt-2 font-small text-gray-500 dark:text-gray-50">Contact Number:</dt>
                    <dd class="text-xs text-gray-900 dark:text-gray-100 sm:mt-0 sm:col-span-2">
                        <input wire:model.defer="contactNumber" class="block  w-3/4 px-1 py-1 text-xs dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Jane Doe" />
                    </dd>
                </div>
                <div class="px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                    <dt class="text-xs mt-2 font-small text-gray-500 dark:text-gray-50">Contact Email:</dt>
                    <dd class="text-xs text-gray-900 dark:text-gray-100 sm:mt-0 sm:col-span-2">
                        <input wire:model.defer="contactEmail" class="block  w-3/4  px-1 py-1 text-xs dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Jane Doe" />
                    </dd>
                </div>
                <div class="px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                    <dt class="text-xs mt-2 font-small text-gray-500 dark:text-gray-50">Site Address:</dt>
                    <dd class="text-xs text-gray-900 dark:text-gray-100 sm:mt-0 sm:col-span-2">
                        <input wire:model.defer="address" class="block  w-3/4  px-1 py-1 text-xs dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Jane Doe" />
                    </dd>
                </div>
            </dl>
        </div>
        <div class="border-gray-200 space-x-2 space-y-2 rounded-lg shadow-xs dark:bg-gray-700">
            <dl>
                <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                    <dt class="text-xs font-small text-gray-500 dark:text-gray-100"> Approver :</dt>
                    <dd class="text-xs ml-1 text-gray-900 sm:mt-0 sm:col-span-2 dark:text-gray-200"> {{$task->WarrantyRepair->Approver->name}} </dd>
                </div>
                <div class="px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                    <dt class="text-xs mt-2 font-small text-gray-500 dark:text-gray-50">Brand and Model:</dt>
                    <dd class="text-xs text-gray-900 dark:text-gray-100 sm:mt-0 sm:col-span-2">
                        <input wire:model.defer="brandModel" class="block w-1/2 px-1 py-1 text-xs dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Jane Doe" />
                    </dd>
                </div>
                <div class="px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                    <dt class="text-xs mt-2 font-small text-gray-500 dark:text-gray-50">Serial Number:</dt>
                    <dd class="text-xs text-gray-900 dark:text-gray-100 sm:mt-0 sm:col-span-2">
                        <input wire:model.defer="serial" class="block w-1/2 px-1 py-1 text-xs dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Jane Doe" />
                    </dd>
                </div>
                <div class="px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                    <dt class="text-xs mt-2 font-small text-gray-500 dark:text-gray-50">Vendor Quote:</dt>
                    <dd class="text-xs text-gray-900 dark:text-gray-100 sm:mt-0 sm:col-span-2">
                        <input wire:model.defer="quote" class="block w-1/2 px-1 py-1 text-xs dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Vendor Quote" />
                    </dd>
                </div>
                <div class="px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                    <dt class="text-xs mt-2 font-small text-gray-500 dark:text-gray-50"> T/S Steps Performed :</dt>
                    <dd class="text-xs text-gray-900 dark:text-gray-100 sm:mt-0 sm:col-span-2">
                        <textarea wire:model.defer="remarks" placeholder="Troubleshooting steps performed" rows="2" cols="50" class="block w-full mt-1 text-xs text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"></textarea>
                    </dd>
                </div>
              
           
            </dl>
        </div>
    </div>
</div>
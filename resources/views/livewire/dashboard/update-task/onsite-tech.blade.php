<div>
    <div class="grid gap-2 md:grid-cols-2 xl:grid-cols-2 mb-2">
        <div class="border-gray-200 space-x-2 space-y-2 rounded-lg shadow-xs dark:bg-gray-700">
            <dl>
                <div class="px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                    <dt class="text-xs mt-2 font-small text-gray-500 dark:text-gray-50">Device Device:</dt>
                    <dd class="text-xs text-gray-900 dark:text-gray-100 sm:mt-0 sm:col-span-2">
                        <input wire:model.defer="deviceName" class="block w-1/2 px-1 py-1 text-xs dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Jane Doe" />
                    </dd>
                </div>
                <div class="px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                    <dt class="text-xs mt-2 font-small text-gray-500 dark:text-gray-50">Issue Reported:</dt>
                    <dd class="text-xs text-gray-900 dark:text-gray-100 sm:mt-0 sm:col-span-2">
                        <input wire:model.defer="issue" class="block w-1/2 px-1 py-1 text-xs dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Jane Doe" />
                    </dd>
                </div>
                <div class="px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                    <dt class="text-xs mt-2 font-small text-gray-500 dark:text-gray-50">Site Status:</dt>
                    <dd class="text-xs text-gray-900 dark:text-gray-100 sm:mt-0 sm:col-span-2">
                        <input wire:model.defer="siteStatus" class="block w-1/2 px-1 py-1 text-xs dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Jane Doe" />
                    </dd>
                </div>
                <div class="px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                    <dt class="text-xs mt-2 font-small text-gray-500 dark:text-gray-50">Job Description:</dt>
                    <dd class="text-xs text-gray-900 dark:text-gray-100 sm:mt-0 sm:col-span-2">
                        <input wire:model.defer="jobDescription" class="block w-1/2 px-1 py-1 text-xs dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Jane Doe" />
                    </dd>
                </div>
                <div class="px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                    <dt class="text-xs mt-2 font-small text-gray-500 dark:text-gray-50">Date Completed:</dt>
                    <dd class="text-xs text-gray-900 dark:text-gray-100 sm:mt-0 sm:col-span-2">
                        <input type="date" wire:model.defer="dateCompleted" class="block w-1/2 px-1 py-1 text-xs dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                    </dd>
                </div>
                <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                    <dt class="text-xs font-small text-gray-500 dark:text-gray-100">Job Report:</dt>
                    <select wire:model.defer="jobReport" class="w-full px-1 py-1  mt-1 text-xs dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                        
                    </select>
                </div>
            </dl>
        </div>
        <div class="border-gray-200 dark:border-white space-x-2 space-y-2 rounded-lg shadow-xs dark:bg-gray-700">
            <dl>
                <div class="px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                    <dt class="text-xs mt-2 font-small text-gray-500 dark:text-gray-50">Contact Name:</dt>
                    <dd class="text-xs text-gray-900 dark:text-gray-100 sm:mt-0 sm:col-span-2">
                        <input wire:model.defer="contactName" class="block w-3/4 px-1 py-1 text-xs dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                    </dd>
                </div>

                <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                    <dt class="text-xs mt-2 font-small text-gray-500 dark:text-gray-50">Contact Email:</dt>
                    <dd class="text-xs text-gray-900 dark:text-gray-100 sm:mt-0 sm:col-span-2">
                        <input type="email" wire:model.defer="contactEmail" class="block w-3/4 px-1 py-1 text-xs dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                    </dd> 
                </div>
                <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                    <dt class="text-xs mt-2 font-small text-gray-500 dark:text-gray-50">Contact Number:</dt>
                    <dd class="text-xs text-gray-900 dark:text-gray-100 sm:mt-0 sm:col-span-2">
                        <input wire:model.defer="contactNumber" class="block w-3/4 px-1 py-1 text-xs dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                    </dd>  
                </div>
                <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                    <dt class="text-xs mt-2 font-small text-gray-500 dark:text-gray-50">Site Address:</dt>
                    <dd class="text-xs text-gray-900 dark:text-gray-100 sm:mt-0 sm:col-span-2">
                        <input wire:model.defer="address" class="block w-3/4 px-1 py-1 text-xs dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                    </dd>  
                </div>
                <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                    <dt class="text-xs mt-2 font-small text-gray-500 dark:text-gray-50">PO:</dt>
                    <dd class="text-xs text-gray-900 dark:text-gray-100 sm:mt-0 sm:col-span-2">
                        <input wire:model.defer="PO" class="block w-3/4 px-1 py-1 text-xs dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                    </dd>  
                </div>

                <div class="px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                    <dt class="text-xs mt-2 font-small text-gray-500 dark:text-gray-50"> Admin Remarks:</dt>
                    <dd class="text-xs text-gray-900 dark:text-gray-100 sm:mt-0 sm:col-span-2">
                        <textarea wire:model.defer="remarks" placeholder="Troubleshooting steps performed" rows="2" cols="50" class="block w-full mt-1 text-xs text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"></textarea>
                    </dd>
                </div>
            </dl>
        </div>
    </div>
   
    <div class="x-2 y-2 pl-2 pb-2 pt-2">
        <button wire:click.prevent="generateSOW" class="px-2 py-2 text-xs font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            Generate SOW
        </button>
    </div>
   
</div>

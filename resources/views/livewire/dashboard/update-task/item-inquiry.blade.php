<div>
    <div class="grid gap-2 mb-2 md:grid-cols-2 xl:grid-cols-2">
        <div class="border-gray-200 space-x-2 space-y-2 rounded-lg shadow-xs dark:bg-gray-700">
            <dl>
                <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                    <dt class="text-xs font-small text-gray-500 dark:text-gray-100">Item/Hardware Name:</dt>
                    <dd class="text-xs  sm:mt-0 sm:col-span-2 dark:text-gray-200 text-gray-900">
                        <input wire:model.defer="item" class="block  w-1/2 px-1 py-1 text-xs dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Item" />
                    </dd>
                </div>
                <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                    <dt class="text-xs font-small text-gray-500 dark:text-gray-100">Quantity:</dt>
                    <dd class="text-xs text-gray-900 sm:mt-0 sm:col-span-2 dark:text-gray-200">
                        <input wire:model.defer="quantity" class="block  w-1/2 px-1 py-1 text-xs dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Quantity" />
                    </dd>
                </div>
            </dl>
        </div>
        <div class="border-gray-200 space-x-2 space-y-2 rounded-lg shadow-xs dark:bg-gray-700">
            <dl>
                <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                    <dt class="text-xs font-small text-gray-500 dark:text-gray-100"> Remarks :</dt>
                    <dd class="text-xs text-gray-900 sm:mt-0 sm:col-span-2 dark:text-gray-200">
                        <textarea wire:model.defer="remarks" placeholder="Invoice request remarks" rows="2" cols="50" class="block w-full mt-1 text-xs text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"></textarea>
                    </dd>
                </div>
            </dl>
        </div>
    </div>
</div>
<div>
    <div class="grid gap-2 mb-2 md:grid-cols-2 xl:grid-cols-2">
        <div class="border-gray-200 space-x-2 space-y-2 rounded-lg shadow-xs dark:bg-gray-700">
            <dl>
                <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                    <dt class="text-xs mt-1 font-small text-gray-500 dark:text-gray-100">Network Device:</dt>
                    <dd class="text-xs  sm:mt-0 sm:col-span-2 dark:text-gray-200 text-gray-900">
                        <select wire:model.defer="type" class="w-3/4 px-1 py-1 text-xs dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                            <option value="Router Only"> Router Only</option>
                            <option value="Router & SIM"> Router with Sim </option>
                            <option value="Switch"> Switch </option>
                            <option value="Others"> Others.. Please specify </option>
                        </select>
                    </dd>
                </div>
                <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                    <dt class="text-xs mt-1 font-small text-gray-500 dark:text-gray-100">Additional Details:</dt>
                    <dd class="text-xs sm:mt-0 sm:col-span-2 dark:text-gray-200 text-gray-900">
                        <textarea wire:model.defer="details" placeholder="Admin notes here.." rows="2" cols="50" class="block w-full mt-1 text-xs text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"></textarea>
                    </dd>
                </div>
            </dl>
        </div>
        <div class="border-gray-200 space-x-2 space-y-2 rounded-lg shadow-xs dark:bg-gray-700">
            <dl>
                <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                    <dt class="text-xs mt-1 font-small text-gray-500 dark:text-gray-100">Connection Type:</dt>
                    <dd class="text-xs sm:mt-0 sm:col-span-2 dark:text-gray-200 text-gray-900">
                        <textarea wire:model.defer="connection_type" placeholder="Admin notes here.." rows="2" cols="50" class="block w-full mt-1 text-xs text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"></textarea>
                    </dd>
                </div>
            </dl>
        </div>
    </div>
</div>
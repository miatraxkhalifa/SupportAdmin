<div>
    <div class="grid gap-2 mb-2 md:grid-cols-2 xl:grid-cols-2">
        <div class="border-gray-200 space-x-2 space-y-2 rounded-lg shadow-xs dark:bg-gray-700">
            <dl>
                <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                    <dt class="text-xs font-small text-gray-500 mt-1 dark:text-gray-100"> Old Media Player:</dt>
                    <dd class="text-xs text-gray-900 sm:mt-0 sm:col-span-2 dark:text-gray-200">
                        <input wire:model.defer="oldMP" class="block  w-3/4 px-1 py-1 text-xs dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Existing Media Player Model" />
                    </dd>
                </div>
                <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                    <dt class="text-xs mt-1 font-small text-gray-500 dark:text-gray-100">LabTech Status:</dt>
                    <dd class="text-xs sm:mt-0 sm:col-span-2 dark:text-gray-200 text-gray-900">
                        <select wire:model.defer="status" class="w-3/4 px-1 py-1 text-xs dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                            <option value="0">Online</option>
                            <option value="1"> Offline</option>
                        </select>
                    </dd>
                </div>
                <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                    <dt class="text-xs font-small text-gray-500 mt-1 dark:text-gray-100"> Connection Type:</dt>
                    <dd class="text-xs text-gray-900 sm:mt-0 sm:col-span-2 dark:text-gray-200">
                        <textarea wire:model.defer="connection_type" placeholder="Admin notes here.." rows="2" cols="50" class="block w-3/4 mt-1 text-xs text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"></textarea>
                    </dd>
                </div>
                <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                    <dt class="text-xs font-small mt-1 text-gray-500 dark:text-gray-100"> Application:</dt>
                    <dd class="text-xs text-gray-900 sm:mt-0 sm:col-span-2 dark:text-gray-200">
                        <select wire:model.defer="application" class="w-3/4 px-1 py-1 text-xs dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                            <option value="7-Eleven"> 7-Eleven</option>
                            <option value="Compass"> Compass </option>
                            <option value="Eye Play"> Eye Play </option>
                            <option value="EzeImpress"> EzeImpress </option>
                            <option value="Menuboard"> Menuboard </option>
                            <option value="MH RR"> MH RR </option>
                            <option value="MRH Kiosk"> MRH Kiosk </option>
                            <option value="Telstra Pricer"> Telstra Pricer </option>
                            <option value="Urban Circus"> Urban Circus/Map Table </option>
                            <option value="Others"> Others.. Please specify </option>
                        </select>
                    </dd>
                </div>

            </dl>
        </div>
        <div class="border-gray-200 space-x-2 space-y-2 rounded-lg shadow-xs dark:bg-gray-700">
            <dl>
                <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                    <dt class="text-xs font-small mt-1 text-gray-500 dark:text-gray-100"> Solution:</dt>
                    <dd class="text-xs text-gray-900 sm:mt-0 sm:col-span-2 dark:text-gray-200">
                        <select wire:model.defer="solution" class="w-3/4 px-1 py-1 text-xs dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                            <option value="Single Screen"> Single</option>
                            <option value="2x1"> Dual </option>
                            <option value="3x1"> Triple </option>
                            <option value="4x1"> 4 x 1 </option>
                            <option value="5x1"> 5 x 1 </option>
                            <option value="B2B"> B2B </option>
                            <option value="Matrix"> Matrix </option>
                            <option value="VideoWall"> Video Wall </option>
                            <option value="LED"> LED </option>
                            <option value="Others"> Others.. Please specify </option>
                        </select>
                    </dd>
                </div>
                <div class=" px-1 py-1 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-5">
                    <dt class="text-xs font-small text-gray-500 dark:text-gray-100"> Orientation :</dt>
                    <dd class="text-xs text-gray-900 sm:mt-0 sm:col-span-2 dark:text-gray-200">
                        <select wire:model.defer="orientation" class="w-3/4 px-1 py-1 text-xs dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                            <option value="Portrait"> Portrait</option>
                            <option value="Landscape"> Landscape </option>
                        </select>
                    </dd>

                    <dt class="text-xs font-small text-gray-500 dark:text-gray-100"> Additional Details :</dt>
                    <dd class="text-xs text-gray-900 sm:mt-0 sm:col-span-2 dark:text-gray-200">
                        <textarea wire:model.defer="details" placeholder="Admin notes here.." rows="2" cols="50" class="block w-3/4 mt-1 text-xs text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"></textarea>
                    </dd>
                </div>
            </dl>
        </div>
    </div>
</div>
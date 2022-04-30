<div>
    <div class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400">
        <label class="block mt-4 text-sm">
            <select wire:model="connection_type" class="block w-full pl-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input">
                <option value="" selected>Connection Type </option>
                <option value="wired"> Wired</option>
                <option value="wireless"> Wireless</option>
            </select>
            <div class="absolute inset-y-0 flex items-center ml-3 pointer-events-none">
                <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                    </path>
                </svg>
            </div>
        </label>
    </div>

    @if($connection_type == 'wireless')
    <div class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400">
        <input wire:model="ssid" class="block w-full pl-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="Wifi SSID" />
        <div class="absolute inset-y-0 flex items-center ml-3 pointer-events-none">
            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                </path>
            </svg>
        </div>
    </div>

    <div class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400">
        <input wire:model="password" class="block w-full pl-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="Wifi password" />
        <div class="absolute inset-y-0 flex items-center ml-3 pointer-events-none">
            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                </path>
            </svg>
        </div>
    </div>
    @endif

    <div class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400">
        <label class="block mt-4 text-sm">
            <select wire:model="connection_status" class="block w-full pl-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input">
                <option value="" selected>DHCP or Static?</option>
                <option value="dhcp"> DHCP</option>
                <option value="static"> static </option>
            </select>
            <div class="absolute inset-y-0 flex items-center ml-3 pointer-events-none">
                <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                    </path>
                </svg>
            </div>
        </label>
    </div>

    @if($connection_status == 'static')
    <div class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400">
        <input wire:model="ip" class="block w-full pl-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="IP Address" />
        <div class="absolute inset-y-0 flex items-center ml-3 pointer-events-none">
            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                </path>
            </svg>
        </div>
    </div>

    <div class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400">
        <input wire:model="subnet" class="block w-full pl-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="Subnet Mask" />
        <div class="absolute inset-y-0 flex items-center ml-3 pointer-events-none">
            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                </path>
            </svg>
        </div>
    </div>

    <div class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400">
        <input wire:model="dg" class="block w-full pl-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="Default Gateway" />
        <div class="absolute inset-y-0 flex items-center ml-3 pointer-events-none">
            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                </path>
            </svg>
        </div>
    </div>

    <div class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400">
        <input wire:model="dns1" class="block w-full pl-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="Primary DNS" />
        <div class="absolute inset-y-0 flex items-center ml-3 pointer-events-none">
            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                </path>
            </svg>
        </div>
    </div>

    <div class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400">
        <input wire:model="dns2" class="block w-full pl-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="Secondary DNS" />
        <div class="absolute inset-y-0 flex items-center ml-3 pointer-events-none">
            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                </path>
            </svg>
        </div>
    </div>
    @endif

    <div class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400">
        <label class="block mt-4 text-sm">
            <select wire:model="hardware_type" class="block w-full pl-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input">
                <option value="" selected>Hardware Type </option>
                <option value="Router Only"> Router Only</option>
                <option value="Router & SIM"> Router with Sim </option>
                <option value="Switch"> Switch </option>
                <option value="Others"> Others.. Please specify </option>
            </select>
            <div class="absolute inset-y-0 flex items-center ml-3 pointer-events-none">
                <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                    </path>
                </svg>
            </div>
        </label>
    </div>

    <div class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400">
        <textarea wire:model.defer="details" placeholder="Additional Details" rows="4" cols="50" class="block w-full pl-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"></textarea>
    </div>

</div>
<div>
  <div class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400">
    <textarea wire:model.defer="jobDescription" placeholder="Job Description and Things to Bring" rows="4" cols="50" class="block w-full pl-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"></textarea>
  </div>

  <div class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400">
    <input wire:model="LTid" class="block w-full pl-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="LT ID" />
    <div class="absolute inset-y-0 flex items-center ml-3 pointer-events-none">
      <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
        <path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
        </path>
      </svg>
    </div>
  </div>

  <div class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400">
    <input wire:model="token" class="block w-full pl-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="Kioskadmin Password" />
    <div class="absolute inset-y-0 flex items-center ml-3 pointer-events-none">
      <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
        <path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
        </path>
      </svg>
    </div>
  </div>

  <div class="mt-4 text-sm">
    <span class="text-gray-700 dark:text-gray-400">
      Same Site Details?
    </span>
    <div class="mt-2">
      <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
        <input type="radio" class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" wire:model="sameSiteDetails" value="Yes" />
        <span class="ml-2">Yes</span>
      </label>
      <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
        <input type="radio" class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" wire:model="sameSiteDetails" value="No" />
        <span class="ml-2">No</span>
      </label>
    </div>
  </div>

  @if($sameSiteDetails == 'No')
  <hr class="mt-2 pb-2">

  <div class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400">
    <input wire:model.defer="contactName" class="block w-full pl-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="contactName" />
    <div class="absolute inset-y-0 flex items-center ml-3 pointer-events-none">
      <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
        <path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
        </path>
      </svg>
    </div>
  </div>
  <div class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400">
    <input wire:model.defer="contactEmail" class="block w-full pl-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="contactEmail" />
    <div class="absolute inset-y-0 flex items-center ml-3 pointer-events-none">
      <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
        <path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
        </path>
      </svg>
    </div>
  </div>
  <div class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400">
    <input wire:model.defer="contactNumber" class="block w-full pl-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="contactNumber" />
    <div class="absolute inset-y-0 flex items-center ml-3 pointer-events-none">
      <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
        <path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
        </path>
      </svg>
    </div>
  </div>
  <div class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400">
    <input wire:model.defer="address" class="block w-full pl-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="address" />
    <div class="absolute inset-y-0 flex items-center ml-3 pointer-events-none">
      <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
        <path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
        </path>
      </svg>
    </div>
  </div>
  @endif

</div>
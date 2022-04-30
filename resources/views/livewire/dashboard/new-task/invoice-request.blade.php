<div>
    <label class="block text-sm">

        <div class="space-y-1 pb-8">

            <label class="block mt-4 text-sm">
                <select wire:model="task" class="block w-full pl-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input">
                    <option value="" selected> Select Quote</option>
                    @forelse($quote as $quotes)
                    <option value="{{$quotes->id}}" selected> {{$quotes->quote}}</option>
                    @empty
                    @endforelse
                </select>
            </label>


            <div class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400">
                <textarea wire:model.defer="remarks" placeholder="Task Details" rows="4" cols="50" class="block w-full pl-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"></textarea>
            </div>

        </div>
        <x-secondary-button wire:click="close">
            Cancel
        </x-secondary-button>
        <x-button wire:click="save">
            Save
        </x-button>
    </label>
</div>
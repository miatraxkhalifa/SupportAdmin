<div>
    <div class="space-y-1 pb-8">
        <label class="block mt-4 text-sm">
            <select wire:model="return" class="block w-full pl-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input">
                <option value="" selected> Select Case</option>
                @forelse($returns as $return)
                <option value="{{$return->id}}" selected> {{$return->case}} </option>
                @empty
                @endforelse
            </select>
        </label>
    </div>
    <x-secondary-button wire:click="close">
        Cancel
    </x-secondary-button>
    <x-button wire:click="save">
        Save
    </x-button>
</div>
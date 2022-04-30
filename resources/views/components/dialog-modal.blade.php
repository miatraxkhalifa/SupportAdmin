@props(['id' => null, 'maxWidth' => null])

<x-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="px-6 py-4">
        <div class="text-lg text-black dark:text-white">
            {{ $title }}
        </div>

        <div class="mt-4 dark:bg-gray-700">
            {{ $content }}
        </div>
    </div>

    <div class="px-6 py-4 text-right bg-gray-100 dark:bg-gray-700">
        {{ $footer }}
    </div>
</x-modal>
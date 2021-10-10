<div class="w-full bg-white flex flex-col shadow rounded-lg border">
        <div class="px-4 py-2.5 flex justify-between items-center border-b-4" style="border-color: {{ config('tasks.categories.'.$task->category.'.color') }};">
            <h3 class="text-md font-bold text-secondary-700">{{ $task->label }}</h3>
            <div class="flex space-x-2 justify-end">
                <x-icon name="refresh" title="Automatic" class="w-5 h-5 {{ $task->is_automatic ? 'text-green-500' : 'text-gray-200' }} " />
                <x-icon name="play" title="Active" class="w-5 h-5 {{ $task->is_active ? 'text-green-500' : 'text-gray-200' }} " />
            </div>
        </div>

    <div class="px-2 py-5 md:px-4 text-secondary-700 flex-grow space-y-3" >
        @if($task->description)
            <p class="text-sm">{{ $task->description }}</p>
        @endif 

        <p class="text-md font-bold">{{ $task->getScheduleText() }}</p>
    </div>

    <div class="px-4 py-4 sm:px-6 rounded-t-none
                border-t dark:border-secondary-600 rounded-lg flex justify-between" style="background-color: {{ config('tasks.categories.'.$task->category.'.color') }};">
        <x-icon name="{{ config('tasks.categories.'.$task->category.'.icon') }}" class="w-8 h-8 text-white" />
        <x-button class="bg-white" wire:click="viewTask('{{ $task->id }}')" label="View" />
    </div>
</div>
<div class="bg-red-200 border-t-2 border-red-600 p-10 flex items-center justify-between">

    <x-icon name="bell" class="animate-bounce text-red-600 w-12 h-12" />

    <div class="text-lg text-center text-red-800 font-black">
        <p class="uppercase">Overdue Reminder</p> 
        <p>{{ $overdue->due_at->diffForHumans() }}</p>
    </div>

    <div class="flex items-center justify-end">
        <x-button positive wire:click="reminderComplete('{{ $overdue->id }}')" icon="check-circle" label="Mark As Done" />
    </div>

</div>
<div class="bg-yellow-200 border-t-2 border-yellow-600 p-10 flex items-center justify-between">

    <x-icon name="bell" class="animate-bounce text-yellow-600 w-12 h-12" />

    <div class="text-lg text-center text-yellow-800 font-black">
        <p class="uppercase">Due Today</p> 
        <p>{{ $next->due_at->diffForHumans() }}</p>
    </div>

    <div class="flex items-center text-yellow-600 justify-end">
        @if($next->is_complete)
            <x-icon name="thumb-up" class="w-6 h-6 mr-2" />
            <span class="text-lg font-bold">Completed!</span>
        @else
            <x-button positive wire:click="reminderComplete('{{ $next->id }}')" icon="check-circle" label="Mark As Done" />
        @endif
    </div>

</div>
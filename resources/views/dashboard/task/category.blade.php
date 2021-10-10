<div class="grid grid-cols-5 gap-4 md:gap-10 p-2 px-5 w-full sm:w-4/5 md:w-2/3 mx-auto">
    @foreach(config('tasks.categories') as $key => $value)
        @if(empty($category) || $category == $key)
            <div class="rounded-full border-2 p-2 lg:p-4 text-white transform hover:scale-110 transition" wire:click="setCategory('{{ $key }}')" style="background-color: {{ $value['color'] }};" title="{{ $value['label'] }}">
                <x-icon name="{{ $value['icon'] }}" alt="{{ $value['label'] }}" />
            </div>
        @else
            <div class="rounded-full border-2 p-2 lg:p-4 bg-white transform hover:scale-110 transition" wire:click="setCategory('{{ $key }}')" style="color: {{ $value['color'] }};" title="{{ $value['label'] }}">
                <x-icon name="{{ $value['icon'] }}" alt="{{ $value['label'] }}" />
            </div>
        @endif
    @endforeach
</div>
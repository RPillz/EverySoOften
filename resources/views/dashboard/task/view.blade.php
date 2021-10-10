<div class="p-5 flex items-center justify-between rounded-t-lg" style="background-color: {{ config('tasks.categories.'.$viewTask->category.'.color') }};">

    <x-button class="bg-white" wire:click="viewHome"><x-icon name="chevron-left" class="w-4 h-4 my-auto" /> Back</x-button>

    <span class="font-bold text-2xl text-white">{{ $viewTask->label }}</span>

    <x-icon name="{{ config('tasks.categories.'.$viewTask->category.'.icon') }}" class="w-12 h-12 text-white" />

</div>

@if($overdue = $viewTask->reminders()->overdue()->first())

    @include('dashboard.task.overdue')

@elseif($next = $viewTask->reminders()->due()->first())

    @include('dashboard.task.due')

@elseif($next = $viewTask->reminders()->upcoming()->first())

    @include('dashboard.task.next')

@endif

<div class="p-5">

    <div class="grid md:grid-cols-2 gap-8">

        <div class="space-y-10">

            @include('dashboard.task.info')

        </div>

        <div class="space-y-10">

            @include('dashboard.task.reminders')

            @include('dashboard.task.completed')

        </div>

    </div>

</div>
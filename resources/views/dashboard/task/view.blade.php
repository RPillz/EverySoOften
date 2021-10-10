<div class="p-5 flex items-center justify-between rounded-t-lg" style="background-color: {{ config('tasks.categories.'.$viewTask->category.'.color') }};">

    <x-button class="bg-white" wire:click="viewHome"><x-icon name="chevron-left" class="w-4 h-4 my-auto" /> Back</x-button>

    <span class="font-bold text-2xl text-white">{{ $viewTask->label }}</span>

    <x-icon name="{{ config('tasks.categories.'.$viewTask->category.'.icon') }}" class="w-12 h-12 text-white" />

</div>

@if($overdue = $viewTask->overdueReminders()->first())

    @include('dashboard.task.overdue')

@elseif($next = $viewTask->upcomingReminders()->first())

    @include('dashboard.task.next')

@endif

<div class="p-5">

    <div class="grid md:grid-cols-3 gap-8">

        <div class="">

            @include('dashboard.task.info')

        </div>

        <div class="">

            @include('dashboard.task.scheduler')

        </div>

        <div class="">

            @include('dashboard.task.reminders')

        </div>

    </div>

</div>
<div class="space-y-4">

    <h2 class="text-bold text-2xl">{{ $viewTask->label }}</h2>

    @if($viewTask->description)
        <p>{{ $viewTask->description }}</p>
    @endif

    <p>{{ $viewTask->getScheduleText() }}</p>

    
    <div class="flex justify-between">
        <x-button outline secondary label="Edit Info" wire:click="showModal('forms.task-info')" />

        <x-button outline negative label="Delete Task" wire:click="showModal('forms.delete-task')" />

        <x-button outline primary label="Edit Schedule" wire:click="showModal('forms.task-scheduler')" />
    </div>

</div>
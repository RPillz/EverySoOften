<div class="space-y-4">

    <h4 class="text-lg font-bold">Schedule</h4>

    <p>{{ $viewTask->getScheduleText() }}</p>

    <x-button label="Edit Schedule" wire:click="showModal('forms.task-scheduler')" />

</div>
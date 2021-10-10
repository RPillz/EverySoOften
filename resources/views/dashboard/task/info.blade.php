<div class="space-y-4">

    <h4 class="text-lg font-bold">Info</h4>

    <h2 class="text-bold text-2xl">{{ $viewTask->label }}</h2>

    <p>{{ $viewTask->description ?? 'No description' }}</p>

    <x-button label="Edit Info" wire:click="showModal('forms.task-info')" />

</div>
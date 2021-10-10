<form wire:submit.prevent="deleteTask">

    <div class="grid sm:grid-cols-2 gap-4">

        <div class="col-span-2">
            <p class="text-xl">Do you want to delete <strong>{{ $viewTask->label }}</strong> and all its reminders?</p>
        </div>

        <div class="col-span-2">
            <x-checkbox lg label="YES, I'm done with this forever!" wire:model.defer="confirmDelete" />
        </div>
        
        <div class="col-span-2 flex justify-between">
            <x-button wire:click="hideModal" label="Nevermind" />
            <x-button negative wire:click="deleteTask" label="Delete" />
        </div>

    </div>

</form>
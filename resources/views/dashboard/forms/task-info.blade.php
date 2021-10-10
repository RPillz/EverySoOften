<form wire:submit.prevent="saveTaskInfo">

    <div class="grid sm:grid-cols-2 gap-4">

        <div class="col-span-2">
            <x-input label="Label" wire:model.defer="viewTask.label" placeholder="Name Your Task" />
        </div>

        <div>
            <x-native-select label="Category" wire:model.defer="viewTask.category">

                @foreach(config('tasks.categories') as $key => $value)

                    <option value="{{ $key }}">{{ $value['label'] }}</option>

                @endforeach
            
            </x-native-select>
        </div>

        <div class="col-span-2">
            <x-textarea label="Description" wire:model.defer="viewTask.description" placeholder="Remind yourself what this task is all about." />
        </div>
        
        <div class="col-span-2 flex justify-between">
            <x-button wire:click="hideModal" label="Nevermind" />
            <x-button primary wire:click="saveTaskInfo" label="Save" />
        </div>

    </div>

</form>
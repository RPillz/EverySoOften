<form wire:submit.prevent="newTask">

    <div class="grid sm:grid-cols-2 gap-4">

        <div class="col-span-2">
            <x-input label="Label" wire:model="task.label" placeholder="Name Your Task" />
        </div>

        <div>
            <x-input label="Every" wire:model="task.schedule.frequency" placeholder="Number of..." />
        </div>

        <div>
            <x-native-select label="Period" wire:model="task.schedule.period">

                <option value="">- Select -</option>

                @foreach(config('tasks.periods') as $key => $period)

                    <option value="{{ $key }}">{{ $period }}</option>

                @endforeach
            
            </x-native-select>
        </div>

    </div>

</form>
<form wire:submit.prevent="saveTaskSchedule">

    <div class="grid sm:grid-cols-2 gap-4">

        <div>
            <x-input label="Every" wire:model="viewTask.schedule.frequency" placeholder="Number of..." />
        </div>

        <div>
            <x-native-select label="Period" wire:model="viewTask.schedule.period">

                @foreach(config('tasks.periods') as $key => $period)

                    <option value="{{ $key }}">{{ $period }}</option>

                @endforeach
            
            </x-native-select>
        </div>

        {{-- <div> 
            <x-datetime-picker
                label="From"
                placeholder="Start Date"
                wire:model.defer="viewTask.start_at"
                without-time=1
            />
        </div>

        <div> 
            <x-datetime-picker
                label="To"
                placeholder="End Date"
                wire:model.defer="viewTask.end_at"
                without-time=1
            />
        </div> --}}

        <div class="col-span-2">
            <x-native-select label="Next Cycle Begins" wire:model="viewTask.schedule.cycle">
                    <option value="on_schedule">Immediately On Schedule</option>
                    <option value="on_action">After Action Completed</option>
            </x-native-select>
        </div>

        <div class="col-span-2 flex justify-between">
            <x-button wire:click="hideModal" label="Nevermind" />
            <x-button primary wire:click="saveTaskSchedule" label="Save Schedule" />
        </div>

    </div>

</form>
<div class="space-y-4">

    <div class="flex items-center justify-between">

        <h4 class="text-lg font-bold">Reminders</h4>

        <x-toggle md wire:model="viewTask.is_active" left-label="Send Reminders" />

    </div>

    <div class="space-y-3">

        @forelse($viewTask->upcomingReminders() as $reminder)

        <div class="border-b flex justify-between items-center">

            <span class="@if($reminder->is_complete) line-through text-green-600 @endif">{{ $reminder->due_at->toFormattedDateString() }}</span>
            
            <span class="text-sm @if($reminder->is_complete) line-through text-green-600 @endif">{{ $reminder->due_at->diffForHumans() }}</span>

            <button class="rounded-full text-gray-400 hover:text-red-500 focus:outline-none focus:ring-2 focus:ring-red-500 transition"
                wire:click="deleteReminder('{{ $reminder->id }}')"
                >
                <x-icon name="trash" class="w-4 h-4" />
            </button>

        </div>

        @empty 

            <p class="text-gray-400 text-center">There are no upcoming reminders scheduled.</p>

            @if($viewTask->is_automatic)
                <p class="text-gray-400 text-center text-sm">New reminders will be automatically created.</p>
            @endif

        @endforelse

    </div>

    <div class="flex items-center justify-between">

        <x-button label="Add Reminder" wire:click="addReminder" />

        <x-toggle md wire:model="viewTask.is_automatic" left-label="Automatic" />

    </div>

</div>
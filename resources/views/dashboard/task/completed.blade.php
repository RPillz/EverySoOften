<div class="space-y-4">

    <div class="flex items-center justify-between">

        <h4 class="text-lg font-bold">Recently Completed</h4>

    </div>

    <div class="space-y-3">

        @forelse($viewTask->reminders()->completed()->limit(5)->get() as $reminder)

        <div class="border-b flex justify-between items-center">

            <span class="@if($reminder->is_complete) line-through text-green-600 @endif"><strong>Due:</strong> {{ $reminder->due_at->toFormattedDateString() }}</span>
            
            <span class="text-sm @if($reminder->is_complete) text-green-600 @endif">{{ $reminder->due_at->diffForHumans() }}</span>

        </div>

        @empty 

            <p class="text-gray-400 text-center">There are no completed tasks yet.</p>

        @endforelse

    </div>

</div>
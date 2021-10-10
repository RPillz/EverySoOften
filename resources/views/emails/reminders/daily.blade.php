@component('mail::message')
# Your Reminder Alerts

Hi {{ $user->name ?? 'there' }},

You asked me to send you a reminder about this stuff.

@if($user->reminders()->overdue()->count())
@component('mail::table')
| Overdue Tasks      | Due         |
| :------------- |-------------:|
@foreach($user->reminders()->overdue()->get() as $reminder)
| [{{ $reminder->task->label }}]({{ route('dashboard', ['modelSlug' => 'task', 'uuidSlug' => $reminder->task->id ]) }}) | {{ $reminder->due_at->diffForHumans() }} |
@endforeach
@endcomponent
@endif

@if($user->reminders()->due()->count())
@component('mail::table')
| Tasks Due Today    | Due         |
| :------------- |-------------:|
@foreach($user->reminders()->due()->get() as $reminder)
| [{{ $reminder->task->label }}]({{ route('dashboard', ['modelSlug' => 'task', 'uuidSlug' => $reminder->task->id ]) }}) | {{ $reminder->due_at->diffForHumans() }} |
@endforeach
@endcomponent
@endif

@if($user->reminders()->upcoming()->count())

@component('mail::table')
| Upcoming Tasks      | Due         |
| :------------- |-------------:|
@foreach($user->reminders()->upcoming()->limit(3)->get() as $reminder)
| [{{ $reminder->task->label }}]({{ route('dashboard', ['modelSlug' => 'task', 'uuidSlug' => $reminder->task->id ]) }}) | {{ $reminder->due_at->diffForHumans() }} |
@endforeach
@endcomponent

@endif

@component('mail::button', ['url' => route('dashboard')])
Go To Dashboard
@endcomponent

*Don't want these reminders?* You can turn email reminders on and off for individual tasks.

Thanks,<br>
{{ config('app.name') }}
@endcomponent

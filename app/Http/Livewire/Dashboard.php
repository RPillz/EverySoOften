<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use WireUi\Traits\Actions;
use App\Traits\HasModal;

use App\Models\Task;

class Dashboard extends Component
{

    use Actions;
    use HasModal;

    public $modelSlug;
    public $uuidSlug;

    public $task;
    public $category;
    public $myTasks;
    public $viewTask;

    protected function rules()
    {

        return [

            'task.label' => '',
            'task.description' => '',
            'task.category' => '',

            'task.schedule.frequency' => '',
            'task.schedule.period' => '',

            'viewTask.label' => '',
            'viewTask.description' => '',
            'viewTask.category' => '',
            'viewTask.start_at' => '',
            'viewTask.end_at' => '',
            'viewTask.is_active' => '',
            'viewTask.is_automatic' => '',

            'viewTask.schedule.frequency' => '',
            'viewTask.schedule.period' => '',
            'viewTask.schedule.cycle' => '',

        ];

    }

    public function mount(){

        if ($this->modelSlug == 'task'){

            $this->viewTask = Auth::user()->tasks()->findOrFail($this->uuidSlug);

        } else {

            $this->resetNewTask();

            $this->refreshTasks();

            \App\Jobs\ScheduleReminders::dispatchSync('daily');

        }

    }

    public function render()
    {

        return view('dashboard.home');
    }

    public function resetNewTask(){

        $this->task = new Task;
        $this->task->schedule = collect(['period' => 'day']);

    }

    public function refreshTasks(){

        if ($this->category){
            $this->myTasks = Auth::user()->tasks->where('category', $this->category);
        } else {
            $this->myTasks = Auth::user()->tasks;
        }

    }

    public function newTask(){

        $validatedData = $this->validate([

            'task.label' => 'required|min:3|max:50',
            'task.description' => 'nullable',
            'task.schedule.frequency' => 'required|digits_between:1,1000',
            'task.schedule.period' => [
                'required',
                Rule::in(array_keys(config('tasks.periods'))),
            ],

        ]);

        $this->task['category'] = $this->category ?? 'personal';

        $this->task->user()->associate(Auth::user());

        $this->task->save();

        $this->task->addReminder();

        $this->notification()->success(
            $title = 'Task Created',
        );

        $this->resetNewTask();

        $this->refreshTasks();

    }

    public function setCategory($category){

        if ($this->category == $category){

            $this->category = null;

        } else {

            $this->category = $category;

        }

        $this->refreshTasks();

    }

    public function viewHome(){

        $this->viewTask = null;

        $this->modelSlug = null;
        $this->uuidSlug = null;

        $this->resetNewTask();

        $this->refreshTasks();

    }

    public function viewTask($uuid){

        $this->viewTask = Auth::user()->tasks()->findOrFail($uuid);

        $this->modelSlug = 'task';
        $this->uuidSlug = $this->viewTask->id;

    }

    public function saveTaskInfo(){

        $this->viewTask->save();

        $this->hideModal();

        $this->notification()->success(
            $title = 'Task Updated',
        );

    }

    public function saveTaskSchedule(){

        $this->viewTask->save();

        $this->hideModal();

        $this->notification()->success(
            $title = 'Schedule Saved',
        );

    }

    public function updatedViewTaskIsAutomatic($value){

        $this->viewTask->save();

    }

    public function updatedViewTaskIsActive($value){

        $this->viewTask->save();
        
    }

    public function addReminder(){

        $this->viewTask->addReminder();

        // $this->notification()->success(
        //     $title = 'Reminder Added',
        // );

        $this->viewTask->refresh();

    }

    public function deleteReminder($uuid){

        $this->viewTask->reminders()->find($uuid)->delete();

        $this->viewTask->refresh();

    }

    public function reminderComplete($uuid){

        $reminder = $this->viewTask->reminders()->find($uuid);

        $reminder->is_complete = true;
        $reminder->completed_at = now();

        $reminder->save();

        $this->notification()->success(
            $title = 'Done!',
            $description = 'Task marked as complete',
        );

        $this->viewTask->refresh();

    }
}

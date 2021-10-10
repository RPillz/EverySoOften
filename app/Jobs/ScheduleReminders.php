<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Models\Task;

class ScheduleReminders implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $check;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($check = 'daily')
    {
        $this->check = $check;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $tasks = Task::where(['check' => $this->check, 'is_active' => 1, 'is_automatic' => 1])->get();
        
        foreach($tasks as $task){

            $reminder_count = $task->upcomingReminders()->count();

            if ($task->schedule->get('cycle') == 'on_action' && $reminder_count == 0){

                if ($task->overdueReminders()->count() == 0){
                    $task->addReminder(1);
                }

            } else {

                $to_add = 3-$reminder_count;

                if ($to_add > 0){
                    $task->addReminder($to_add);
                }

            }

        }

    }
}

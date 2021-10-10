<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\AsCollection;
use Illuminate\Support\Str;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Carbon;

use App\Traits\HasActions;
use App\Traits\HasNotes;

class Task extends Model
{
    use HasFactory;
    use HasActions;
    use HasNotes;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $casts = [
        'schedule' => AsCollection::class,
        'is_active' => 'boolean',
        'is_automatic' => 'boolean',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function reminders() {
        return $this->hasMany(Reminder::class);
    }

    public function getScheduleText(){

        $frequency = $this->schedule->get('frequency');

        $period = Str::of($this->schedule->get('period'))->plural($frequency);

        if ($this->schedule->get('cycle') == 'on_action'){
            $string = 'Action required every <strong>'.$frequency.' '.$period.'</strong>.';
        } else {
            $string = 'Every <strong>'.$frequency.' '.$period.'</strong>, like clockwork.';
        }

        return new HtmlString($string);

    }

    public function setReminder($next = 1, $start_date = null){

        if ($start_date){
            $date = new Carbon($start_date);
        } else {
            $date = Carbon::now();
        }

        for ($i = 0; $i < $next; $i++) {
            $date = $date->add($this->schedule->get('frequency'), $this->schedule->get('period'));
            $this->reminders()->create([
                'due_at' => $date,
            ]);
        } 

    }

    public function addReminder($next = 1){

        if ($final_reminder = $this->reminders()->whereDate('due_at', '>', Carbon::now())->orderBy('due_at', 'desc')->first()){
            $date = $final_reminder->due_at;
        } else {
            $date = Carbon::now();
        }

        $this->setReminder($next, $date);

    }

}

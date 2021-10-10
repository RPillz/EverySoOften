<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

use App\Traits\HasActions;
use App\Traits\HasNotes;

class Reminder extends Model
{
    use HasFactory;
    use HasActions;
    use HasNotes;

    protected $casts = [
        'remind_at' => 'datetime',
        'due_at' => 'datetime',
        'expire_at' => 'datetime',
    ];

    public function task(){
        return $this->belongsTo(Task::class);
    }


    
}

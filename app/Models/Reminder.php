<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

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

    public function scopeOverdue($query)
    {
        return $query->where('is_complete', false)->where('is_expired', false)->whereDate('due_at', '<=', Carbon::now())->whereDate('due_at', 'not like', Carbon::now()->format('Y-m-d').'%')->orderBy('due_at', 'desc');
    }

    public function scopeDue($query)
    {
        return $query->where('is_complete', false)->where('is_expired', false)->whereDate('due_at', 'like', Carbon::now()->format('Y-m-d').'%');
    }

    public function scopeUpcoming($query)
    {
        return $query->whereDate('due_at', '>', Carbon::now())->orderBy('due_at', 'asc');
    }

    public function scopeCompleted($query)
    {
        return $query->where('is_complete', true)->whereNotNull('completed_at')->orderBy('completed_at', 'desc');
    }
    
}

<?php

namespace App\Traits;

trait HasNotes
{

    public function notes() {
        return $this->morphMany(Note::class, 'notable')->orderBy('date_created', 'asc');
    }

}
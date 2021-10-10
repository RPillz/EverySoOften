<?php

namespace App\Traits;

trait HasActions
{

    public function actions() {
        return $this->morphMany(Action::class, 'actionable')->orderBy('date_created', 'asc');
    }

}
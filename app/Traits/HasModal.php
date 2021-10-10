<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait HasModal {

    public $modalDisplay = false;
    public $modalTitle = '';
    public $modalView = '';
    public $modalWidth = 'w-1/2';
    public $modaltab = null;
    
    public $returnToModalView = null;

    function showModal($view){

        $this->resetErrorBag();
        $this->resetValidation();

        // $this->confirmDelete = false;

        $this->modalView = $view;
        $this->modalTitle = Str::of(substr($view, strpos($view, '.')))->replace(['-','.','_'], ' ')->title();
        $this->modalDisplay = true;

    }

    function hideModal(){

        $this->resetErrorBag();
        $this->resetValidation();
        $this->resetActiveItem();

        $this->confirmDelete = false;

        $this->modalView = null;
        $this->modalTitle = null;
        $this->modalDisplay = false;
        $this->modalWidth = 'w-1/2';
        $this->modaltab = null;

    }

    function resetActiveItem(){
        //
    }

}
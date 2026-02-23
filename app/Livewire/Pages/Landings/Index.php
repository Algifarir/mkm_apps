<?php

namespace App\Livewire\Pages\Landings;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.landings.index')
            ->extends('layouts.app')
            ->section('content');
    }
}

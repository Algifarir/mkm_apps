<?php

namespace App\Livewire\Landings;

use Livewire\Component;

class Index extends Component
{

    protected string $layout = 'layouts.app';

    public function render()
    {
        return view('livewire.landings.index');
    }
}

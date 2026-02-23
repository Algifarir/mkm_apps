<?php

namespace App\Livewire\Pages\Landings;

use App\Models\Menu;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.landings.index', [
            'menus' => Menu::where('is_active', true)
                ->orderBy('sort_order')
                ->get(),
        ])
            ->extends('layouts.app')
            ->section('content');
    }
}

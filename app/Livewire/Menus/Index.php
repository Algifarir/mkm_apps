<?php

namespace App\Livewire\Menus;

use App\Models\Menu;
use Livewire\Component;
use Str;

class Index extends Component
{
    public $menuId;
    public $title;
    public $icon;
    public $url;
    public $category;
    public $keywords;
    public $sort_order = 0;
    public $is_active = true;
    public $slug;

    public $showModal = false;

    protected $rules = [
        'title' => 'required',
        'icon' => 'required',
        'url' => 'required',
        'category' => 'required',
        'sort_order' => 'integer',
        'is_active' => 'boolean',
    ];

    public function create()
    {
        $this->resetForm();
        $this->showModal = true;
    }

    public function edit(Menu $menu)
    {
        $this->menuId = $menu->id;
        $this->fill($menu->toArray());
        $this->showModal = true;

        $this->dispatch('open-modal');
    }

    public function save()
    {
        $this->validate();

        Menu::updateOrCreate(
            ['id' => $this->menuId],
            $this->only([
                'title',
                'icon',
                'url',
                'category',
                'keywords',
                'sort_order',
                'is_active',
                'slug'
            ])
        );

        $this->showModal = false;
        $this->resetForm();
    }

    public function delete(Menu $menu)
    {
        $menu->delete();
    }

    private function resetForm()
    {
        $this->reset([
            'menuId',
            'title',
            'icon',
            'url',
            'category',
            'keywords',
            'sort_order',
            'is_active',
            'slug'
        ]);
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->title);
    }

    public function render()
    {
        return view('livewire.menus.index', [
            'menus' => Menu::orderBy('sort_order')->get(),
        ])
            ->extends('layouts.app')
            ->section('content');
    }
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\categorias;

class Navegacion extends Component
{
    public function render()
    {
        $category = categorias::all();
        return view('livewire.navegacion', compact('category'));
    }
}

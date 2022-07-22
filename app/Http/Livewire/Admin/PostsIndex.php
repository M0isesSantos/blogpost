<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Posts;

/*Se importa Paginacion con Livewire */
use Livewire\WithPagination;


class PostsIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public $search;
    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {   
        $posts = Posts::where('user_id', auth()->user()->id)
                                ->where('titulo', 'LIKE', '%' . $this->search .'%')
                                ->latest('id')
                                ->paginate();


        return view('livewire.admin.posts-index', compact('posts'));
    }
}

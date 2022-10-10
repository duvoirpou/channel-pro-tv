<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Posts extends Component
{
    use WithPagination;
    //protected $paginationTheme = 'bootstrap';
    public $load;
    public $perPage = 8;
    public $query;

    public function updatingQuery()
    {
        $this->resetPage();
    }

    public function loadPosts()
    {
        sleep(2);
        $this->load = 1;
    }

    public function render()
    {
        $posts = Post::selectRaw('posts.*,rubriques.libelle')
            ->join('rubriques', 'rubriques.id_rubrique', '=', 'posts.id_rubrique')
            ->orderBy('id_post', 'desc')
            ->where('libelle', 'like', '%'. $this->query .'%')
            ->orWhere('titre', 'like', '%'. $this->query .'%')
            ->paginate($this->perPage);
        return view('livewire.loadposts', ['datas' => $posts]);
    }
}

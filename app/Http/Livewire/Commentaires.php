<?php

namespace App\Http\Livewire;

use App\Models\Commentaire;
use App\Models\Post;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;
use Livewire\WithPagination;

class Commentaires extends Component
{
    use WithPagination;

    public $recup_post;
    public $recup_utilisateur;

    public $ids;
    public $id_utilisateur;
    public $id_post;
    public $commentaire;

    public $recup_id_utilisateur;
    public $recup_id_post;
    public $recup_commentaire;

    public $deleteId = '';

    public $query;


    protected $listeners = [
        'refreshComponent' => '$refresh'
    ];


    public function mount()
    {

        $this->id_post = $this->recup_post;
        $this->id_utilisateur = $this->recup_utilisateur;

    }

    public function updatingQuery()
    {
        $this->resetPage();
    }

    function resetInputFields()
    {
        $this->commentaire = '';
        $this->recup_commentaire = '';
    }

    function store()
    {
        $this->resetPage();
        $validatedData = $this->validate([
            'id_utilisateur' => 'required',
            'id_post' => 'required',
            'commentaire' => 'required',
        ]);

        Commentaire::create($validatedData);
        session()->flash('message', 'Posté avec succes');
        $this->resetInputFields();
        $this->emitSelf('refreshComponent');
    }

    public function edit($id)
    {
        $comment = Commentaire::where('id_commentaire', $id)->first();
        $this->ids = $comment->id_commentaire;
        $this->recup_id_utilisateur = $comment->id_utilisateur;
        $this->recup_id_post = $comment->id_post;
        $this->recup_commentaire = $comment->commentaire;
    }

    public function update()
    {
        $this->validate([
            'recup_id_utilisateur' => 'required',
            'recup_id_post' => 'required',
            'recup_commentaire' => 'required',
        ]);

        if ($this->ids) {
            $comment = Commentaire::where('id_commentaire', $this->ids);
            $comment->update([
                'id_utilisateur' => $this->recup_id_utilisateur,
                'id_post' => $this->recup_id_post,
                'commentaire' => $this->recup_commentaire,
            ]);
            session()->flash('message', 'Message modifié avec succès');
            $this->resetInputFields();
            $this->emit('commentUpdated');
        }
    }

    public function deleteId($id)

    {

        $this->deleteId = $id;

    }

    public function delete()
    {

        $comment = Commentaire::where('id_commentaire', $this->deleteId)->delete();
        session()->flash('message', 'Message supprimé avec succès');

    }

    public function render()
    {
        $commentaires = Commentaire::selectRaw('commentaires.id_utilisateur,commentaires.id_post,commentaires.id_commentaire,commentaires.commentaire,commentaires.created_at,utilisateurs.pseudo')
            ->join('utilisateurs', 'utilisateurs.id_utilisateur', '=', 'commentaires.id_utilisateur')
            ->join('posts', 'posts.id_post', '=', 'commentaires.id_post')
            ->orderBy('id_commentaire', 'DESC')
            ->where('commentaires.id_post', '=', $this->id_post)
            ->where('utilisateurs.pseudo', 'like', '%'. $this->query .'%')
            ->paginate(5);

        if (session()->has("LoggedUtilisateur")) {
            $user = Utilisateur::where('id_utilisateur', '=', session("LoggedUtilisateur"))->first();

            $data = [
                "LoggedUtilisateurInfo" => $user
            ];
            return view('livewire.commentaires', $data, [
                'commentaires' => $commentaires,
            ]);
        } else {
            return view('livewire.commentaires', [
                'commentaires' => $commentaires,
            ]);
        }
        //return view('livewire.commentaires');
    }
}

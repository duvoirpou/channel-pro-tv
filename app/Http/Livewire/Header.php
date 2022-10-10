<?php

namespace App\Http\Livewire;

use App\Models\Utilisateur;
use Livewire\Component;

class Header extends Component
{
    public function render()
    {
        if (session()->has("LoggedUtilisateur")) {
            $user = Utilisateur::where('id_utilisateur', '=', session("LoggedUtilisateur"))->first();

            $data = [
                "LoggedUtilisateurInfo" => $user
            ];
            return view('livewire.header', $data);
        } else {
            return view('livewire.header');
        }
        //return view('livewire.header');
    }
}

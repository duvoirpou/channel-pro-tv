<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UtilisateursController extends Controller
{

    function login()
    {
        return view("connexion");
    }

    function register()
    {
        return view("inscription");
    }

    function check(Request $request)
    {
        $request->validate([
            "identifiant" => "required",
            "password" => "required|min:5",
        ]);

        /* Si le formulaire est validé avec succes */
        $utilisateur = Utilisateur::where('email', '=', $request->identifiant)
            ->orWhere("pseudo", $request->identifiant)
            ->first();


        if ($utilisateur) {
            if($utilisateur->permission==1){
                if (Hash::check($request->password, $utilisateur->password)) {
                    /* Si le mot de passe correspond, alors l utilisateur accede à son profil */
                    $request->session()->put('LoggedUtilisateur', $utilisateur->id_utilisateur);
                    return redirect('/');
                } else {
                    return back()->with('fail', 'Mot de passe incorrect');
                }
            } else{
                return back()->with('fail', 'Votre compte est bloqué');
            }
        } else {
            return back()->with('fail', 'Ce compte n\'existe pas');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            "nom" => "required",
            "prenom" => "required",
            "sexe" => "required",
            "pseudo" => "required|unique:utilisateurs",
            "email" => "required|email|unique:utilisateurs",
            "password" => "required|min:5",
        ]);

        $utilisateur = new Utilisateur;
        $utilisateur->nom = $request->nom;
        $utilisateur->prenom = $request->prenom;
        $utilisateur->pseudo = $request->pseudo;
        $utilisateur->tel = $request->tel;
        $utilisateur->sexe = $request->sexe;
        $utilisateur->email = $request->email;
        /* hasher le mdp */
        $utilisateur->password = Hash::make($request->password);
        $query = $utilisateur->save();


        if ($query) {
            return back()->with('success', 'Compte créé avec succès');
        } else {
            return back()->with('fail', 'Veuillez réessayer');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    function logout()
    {
        if (session()->has('LoggedUtilisateur')) {
            session()->pull('LoggedUtilisateur');
            return redirect('connexion');
        }
    }
}

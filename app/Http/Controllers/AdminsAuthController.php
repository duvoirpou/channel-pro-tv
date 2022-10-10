<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Post;
use App\Models\Rubrique;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AdminsAuthController extends Controller
{

    function login()
    {
        return view("auth.login");
    }

    function register()
    {
        return view("auth.register");
    }

    function allPosts()
    {
        if (session()->has("LoggedAdmin")) {
            $user = Admin::where('id', '=', session("LoggedAdmin"))->first();


            $data = [
                "LoggedAdminInfo" => $user
            ];

            $posts = Post::selectRaw('posts.*,rubriques.libelle')
                ->join('rubriques', 'rubriques.id_rubrique', '=', 'posts.id_rubrique')
                ->get();

            $rubriques = Rubrique::all();
        }
        return view("admin.posts", $data, [
            'posts' => $posts,
            'rubriques' => $rubriques,
        ]);
    }

    function allRubriques()
    {
        if (session()->has("LoggedAdmin")) {
            $user = Admin::where('id', '=', session("LoggedAdmin"))->first();


            $data = [
                "LoggedAdminInfo" => $user
            ];

            $rubriques = Rubrique::all();
        }
        return view("admin.rubriques", $data, [
            'rubriques' => $rubriques,
        ]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (session()->has("LoggedAdmin")) {
            $user = Admin::where('id', '=', session("LoggedAdmin"))->first();


            $data = [
                "LoggedAdminInfo" => $user
            ];
        }
        return view('admin.index', $data);
    }

    function check(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "password" => "required|min:5",
        ]);

        /* Si le formulaire est validé avec succes */
        $admin = Admin::where('email', '=', $request->email)->first();


        if ($admin) {
            if (Hash::check($request->password, $admin->password)) {
                /* Si le mot de passe correspond, alors l utilisateur accede à son profil */
                $request->session()->put('LoggedAdmin', $admin->id);
                return redirect('admin/connected');
            } else {
                return back()->with('fail', 'Mot de passe incorrect');
            }
        } else {
            return back()->with('fail', 'Ce compte nexiste pas');
        }
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
            "email" => "required|email|unique:admins",
            "password" => "required|min:5",
        ]);

        $admin = new Admin;
        $admin->name = $request->nom;
        $admin->email = $request->email;
        /* hasher le mdp */
        $admin->password = Hash::make($request->password);
        $query = $admin->save();


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
        if (session()->has('LoggedAdmin')) {
            session()->pull('LoggedAdmin');
            return redirect('admin/login');
        }
    }
}

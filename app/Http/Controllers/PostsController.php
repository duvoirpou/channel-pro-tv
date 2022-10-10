<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Rubrique;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class PostsController extends Controller
{

    /* La fonction de suppression des mots inutiles pour la recherche */
    private function remove_not_usefull_words($str)
    {
        // to lower case
        $str = strtolower($str);

        // exclude words (rajouter ceux qui manquent)
        $not_use_words = [
            'comment', 'que', 'qui', 'quand', 'pourquoi', 'pour', 'quoi',
            'comme', 'avec', 'sans', 'faire', 'avoir', 'être', 'mais',
            'ou', 'et', 'donc', 'or', 'ni', 'car', 'si', 'de', 'des',
            'un', 'une', 'juste', 'qu', 'est', 'sont', 'lors', 'en', 'a'
        ];

        $len = count($not_use_words);
        // remove words
        for ($i = 0; $i < $len; $i++) {
            $str = str_replace($not_use_words[$i] . ' ', '', $str);
        }

        return $str;
    }

    /* fonction de recherche */
    public function search(Request $request)
    {
        $title_part = $this->remove_not_usefull_words($request->input('title_part'));
        $title_words = explode(' ', $title_part);
        $posts = Post::select('*')
            ->Where(function ($query) use ($title_words) {
                for ($i = 0; $i < count($title_words); $i++) {
                    $query->orwhere('title', 'LIKE', '%' . $title_words[$i] . '%');
                }
            })
            ->get();

        return view('posts.results', compact('posts'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rubriques = Rubrique::all();


        return view('acceuil', [
            'rubriques' => $rubriques,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Taille max de la video 100 M
        $request->validate([
            "video" => "required|mimes:m4v,avi,flv,mp4,mov,mpg,mpa,mp3,mpeg,wmv,mkv,vob|max:100000",
            "rubrique" => "required",
            "titre" => "required",
            "description" => "required",
        ]);

        $post = new Post;
        $video = $request->file("video");
        $videoName = time() . "." . $video->extension();
        $video->move(public_path("videos"), $videoName);

        $post->video = $videoName;
        $post->id_rubrique = $request->input('rubrique');
        $post->titre = $request->input('titre');
        $post->description = $request->input('description');
        $query = $post->save();

        if ($query) {
            return back()->with('success', 'Post ajouté avec succès');
        } else {
            return back()->with('fail', 'Veuillez réessayer');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = Crypt::decrypt($id);
        $recup = Post::selectRaw('posts.*,rubriques.libelle')
        ->join('rubriques', 'rubriques.id_rubrique', '=', 'posts.id_rubrique')
        ->where("id_post", $id)
        ->first();

        if (session()->has("LoggedUtilisateur")) {
            $user = Utilisateur::where('id_utilisateur', '=', session("LoggedUtilisateur"))->first();

            $data = [
                "LoggedUtilisateurInfo" => $user
            ];
            return view('showpost', $data, compact("recup"));
        }else {
            return view('showpost', compact("recup"));
        }
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
        $row = Post::where("id_post", $id)
            ->first();


        Post::where("id_post", $id)->delete();

        /* Supprimer la photo du dossier */
        unlink(public_path("videos") . "/" . $row->video);

        return redirect()->route("admin.posts")
            ->with("success", "La vidéo dont le titre est « $row->titre » a été supprimée avec succès !");
    }
}

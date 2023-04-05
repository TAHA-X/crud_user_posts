<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all(); 
        return view("dashboard",compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("posts.ajouter");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            "title"=>"required",
            "img"=>"required"
        ]);
        $post = Post::create([
            "title"=>$request->title,
            "img"=>$request->img,
            "user_id"=>auth()->user()->id
        ]);
        $file =  $request->file("img");
        $filename=Str::uuid().$file->getClientOriginalName();
        $file->move(public_path("imgs"),$filename);
        $path = '/imgs/'.$filename;
        $post->update(["img"=>$path]);
        return redirect()->route("posts.index")->with("ajouter","post est ajouté avec succé");
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post = Post::where("id",$id)->first();
        if($post->user_id==auth()->user()->id){ // cette condition est pour améliorer la sécurité
            return view("posts.modifier",compact("post"));
        }
        else{
            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            "title"=>"required",
        ]);
        $post = Post::where("id",$id)->first();
        if($post->user_id==auth()->user()->id){ // cette condition est pour améliorer la sécurité
            if($request->img!=""){
                unlink(public_path()."/".$post->img);
                $img = $request->img;
                $file =  $request->file("img");
                $filename=Str::uuid().$file->getClientOriginalName();
                $file->move(public_path("imgs"),$filename);
                $path = '/imgs/'.$filename;
            }
            else{
                $path = $post->img;
            }
            $post->update([
                "title"=>$request->title,
                "img"=>$path
            ]);
            return redirect()->route("posts.index")->with("modifier","post est ajouté avec succé");
        }
        else{
            abort(403);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = Post::where("id",$id)->first();
        if($post->user_id==auth()->user()->id){ // cette condition est pour améliorer la sécurité
            unlink(public_path().$post->img);
            $post->delete();
            return redirect()->route("posts.index")->with("supprimer","post est supprimé avec succé");
        }
        else{
            abort(403);
        }
    }
}

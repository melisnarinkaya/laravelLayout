<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;


class LayoutsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }

    public function index()
    {
        //return session('message'); (misal kayıttan sonra mesaj göstermek için)
        $posts = Post::orderBy('created_at','desc')->get(); /*son girileni en üstte gösterir*/
        return view('posts.index', compact('posts'));
    }

    public function iletisim()
    {

        return view('posts.iletisim');
    }

    public function create()
    {

        return view('posts.create');
    }
    public function show(Post $post)
    {
        return view('posts.show',compact('post'));
    }

    public function store()
    {
        /* dd(request()->all());*/ /*tüm bilgileri bastırıyor*/

        /*dd(request(['title','body'])); /* sadece title ve body'i bastırıyor*/

       $this->validate(request(), [
            'title' => 'required',
            'body' => 'required'
        ]);

       auth()->user()->publish(
           new Post(request(['title','body']))
       );
        session()->flash('message','Your post has now been published');

        return redirect('/');

      /*  Post::create([
            'title' => request('title'),
            'body' => request('body'),
            'user_id'=>auth()->id()
        ]);*/

      return redirect('/home');

    }

}

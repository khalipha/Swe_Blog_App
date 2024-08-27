<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Collective\Html\HtmlFacade as HTML;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use DB;
use Response;

class PostController extends Controller
{
  
    public function index()
    {   
        $posts = Post::latest()->paginate(10);
        return view('PostViews.index',compact('posts'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

   
    public function create()
    {
        return view('PostViews.create');
    }

  
    public function store(Request $request)
    {
        request()->validate([

            'title'          => ['required','max:255'],
            'content'        => 'required',
        ]);

    
        $posts = Post::create([
            'title'          => $request->title,
            'content'        => $request->content,
            'author_id'      => Auth::id(),
            'created_at'     => date("Y-m-d H:i",strtotime('2 hour')),
         ]);
        return redirect()->route('posts.index')->with('success','Post created successfully');
    }

   
    public function show($id)
    {
        $posts = Post::find($id);
        return view('PostViews.show',compact('posts'));
    }

  
    public function edit($id)
    {
         $posts = Post::find($id);
         return view('PostViews.edit',compact('posts'));
    }

   
    public function update(Request $request, $id)
    {
        DB::table('posts')->where('postID',$id)->update([
            'title'                         => $request->title,
            'content'                       => $request->content,   
            'updated_at'                    => date("Y-m-d H:i",strtotime('2 hour')),
       ]);
        return redirect()->route('posts.index')->with('success','Post updated successfully');
    }

  
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('posts.index')
          ->with('Success', 'Post deleted successfully');
    }
}

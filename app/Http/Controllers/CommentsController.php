<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class CommentsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except' => ['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $post = Post::find($id);
        if(!$post){
            return redirect('/posts')->with('error', 'Post not found');
        }else{
            $comments = Comment::where('post_id',$post->id)->orderby('created_at','desc')->paginate(10);
        }
        //$comments = $post->comments()->with('user')->get();
        return view('comments.index')->with('post',$post)->with('comments',$comments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $post = Post::find($id);
        if(!$post){
            return redirect('/posts')->with('error', 'Post not found');
        }
        return view('comments.create')->with('post',$post);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'content' => 'required'
        ]);
        $post_id = $request->input('post_id');
        $comment = Comment::create([
            'content' => $request->input('content'),
            'post_id' => $post_id,
            'user_id' => auth()->user()->id
        ]);
        return redirect()->route('comment.index',$post_id)->with('success','Comment added Successfully');
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
    public function edit($post_id,$id)
    {
        $comment = Comment::find($id);
        if(auth()->user()->id !== $comment->user_id){
            return redirect()->route('comment.index',$post_id)->with('error','Unauthorized Page!');
        }
        return view('comments.edit')->with('comment',$comment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$post_id, $id)
    {
        $this->validate($request,[
            'content' => 'required'
        ]);
        $post_id = $request->input('post_id');
        $comment = Comment::find($id);
        $comment = $comment->update([
            'content' => $request->input('content'),
            'post_id' => $post_id,
            'user_id' => auth()->user()->id
        ]);
        return redirect()->route('comment.index',$post_id)->with('success','Comment updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($post_id,$id)
    {
        $comment = Comment::find($id);
        $post = Post::where('id',$post_id)->get();
        if($post->user_id == auth()->user->id){
            $comment->delete();
            return redirect()->route('comment.index',$post_id)->with('success','Post deleted successfully');
        }
        if(auth()->user()->id !== $comment->user_id){
            return redirect()->route('comment.index',$post_id)->with('error','Unauthorized Page!');
        }
        
        $comment->delete();
        return redirect()->route('comment.index',$post_id)->with('success','Post deleted successfully');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;
use Auth;
use Illuminate\Support\Facades\Session;

class CommentsController extends Controller
{
    // Only a registered user can posta comment
    public function __construct()
    {
        $this->middleware('auth')->only('store');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $post_id)
    {
        $this->validate($request, [
                'comment' => 'required|max:2000'
            ]);

        $post = Post::find($post_id);

        $comment = new Comment;
        $comment->name = Auth::user()->name;
        $comment->email = Auth::user()->email;
        $comment->comment = $request->comment;
        $comment->approved = true;
        $comment->post()->associate($post);
        $comment->save();

        Session::flash('new-comment', 'Your comment has been posted successfully');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comment = Comment::find($id);
        return view('backend/comments/show', compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::find($id);
        return view('backend/comments/edit', compact('comment'));
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
        $this->validate($request, [
                'comment' => 'required|max:2000'
            ]);

        $comment = Comment::find($id);
        $comment->comment = $request->comment;
        $comment->save();

        Session::flash('update-comment', 'Your comment has been updated successfully');
        return redirect()->route('posts.show', $comment->post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);

        $comment->delete();
        
        Session::flash('delete-comment', 'The comment was successfully deleted!');
        return redirect()->back();
    }
}

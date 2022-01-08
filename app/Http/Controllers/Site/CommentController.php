<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Place;
use App\Models\User;
use Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $comment = new Comment;

        $comment->comment = $request->comment;

        $comment->user()->associate($request->user());

        $place = Place::find($request->place_id);
        $comment->rating =$request->rating;

        $place->comments()->save($comment);

        $user = User::find(Auth::user()->id);

        return back();
    }

    public function replyStore(Request $request)
    {
        $reply = new Comment();

        $reply->comment = $request->get('comment');

        $reply->user()->associate($request->user());

        $reply->parent_id = $request->get('comment_id');

        $place = Place::find($request->get('place_id'));

        $place->comments()->save($reply);

        return back();

    }
}

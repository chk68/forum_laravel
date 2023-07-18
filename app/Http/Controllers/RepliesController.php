<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use App\Models\ReplytoReply;
use App\Models\Thread;
use Illuminate\Http\Request;

class RepliesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store($channelId, Thread $thread, Request $request)
    {

        $this->validate(request(), ['body' => 'required']);
       $test= $thread->addReply([
            'body' => request('body'),
            'user_id' => auth()->id()
        ]);

        if($request->div_text!="" ) {

    $replyReply = ReplytoReply::create([
        'user_id' => auth()->id(),
        'thread_id' => $thread->id,
        'body' => $request->div_text,
        'reply_id' =>$test->id

    ]);

    }
        return back();
    }


    public function destroy(Reply $reply)
    {
        /*$this->authorize('update', $reply);*/
        $reply->delete();
        return back();
    }
}

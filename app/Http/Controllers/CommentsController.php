<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\GuestList;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CommentsController extends Controller
{
    public function list()
    {
        $comments = Comments::latest()->paginate(10);

        return ['metadata' => $comments, 'render' => view('components.partial.comment-list', ['comments' => $comments])->render()];
    }

    public function store(Request $request)
    {
        $response = [];
        try {
            $guest = tap(GuestList::findOrFail($request->invitation_code))->update(['have_comments' => "1"]);
            $newComment = Comments::create($request->only(['comment_from', 'comment_text']));
            $fetchLatestComment = Comments::find($newComment->id);
            $response['data']['comment'] = $fetchLatestComment;
            $response['data']['guest'] = $guest;
        } catch (\Throwable $th) {
            $response['errors'] = $th->getMessage();
        } finally {
            return json_encode($response);
        }
    }
}

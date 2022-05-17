<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CommentsController extends Controller
{
    public function list()
    {
        return Comments::latest()->paginate(10);
    }

    public function store(Request $request)
    {
        $newGuest = Comments::create($request->only(['name', 'presence', 'person', 'comment']));

        return $newGuest;
    }
}

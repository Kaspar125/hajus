<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;


class CommentController extends Controller
{
    public function destroy(Comment $comment): RedirectResponse
    {
        $comment->delete();
        return redirect(route('chirps.index'))->with('success', 'Comment deleted.');
    }
}
<?php

namespace App\Repositories;

use App\Models\Admin\Comment;
use Illuminate\Support\Facades\Cache;
use App\Contracts\CommentRepositoryInterface;
use App\Http\Requests\CommentRequest;

class CommentRepository implements CommentRepositoryInterface
{
    // Comment Index
    public function indexComment()
    {
        $comments = config('adminetic.caching', true)
            ? (Cache::has('comments') ? Cache::get('comments') : Cache::rememberForever('comments', function () {
                return Comment::latest()->get();
            }))
            : Comment::latest()->get();
        return compact('comments');
    }

    // Comment Create
    public function createComment()
    {
        //
    }

    // Comment Store
    public function storeComment(CommentRequest $request)
    {
        // dd($request->validated());
        Comment::create($request->validated());
    }

    // Comment Show
    public function showComment(Comment $comment)
    {
        return compact('comment');
    }

    // Comment Edit
    public function editComment(Comment $comment)
    {
        return compact('comment');
    }

    // Comment Update
    public function updateComment(CommentRequest $request, Comment $comment)
    {
        $comment->update($request->validated());
    }

    // Comment Destroy
    public function destroyComment(Comment $comment)
    {
        $comment->delete();
    }
}

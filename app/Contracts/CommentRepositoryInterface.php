<?php

namespace App\Contracts;

use App\Models\Admin\Comment;
use App\Http\Requests\CommentRequest;

interface CommentRepositoryInterface
{
    public function indexComment();

    public function createComment();

    public function storeComment(CommentRequest $request);

    public function showComment(Comment $Comment);

    public function editComment(Comment $Comment);

    public function updateComment(CommentRequest $request, Comment $Comment);

    public function destroyComment(Comment $Comment);
}

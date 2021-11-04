<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Http\Controllers\Controller;
use App\Contracts\CommentRepositoryInterface;

class CommentController extends Controller
{
    protected $commentRepositoryInterface;

    public function __construct(CommentRepositoryInterface $commentRepositoryInterface)
    {
        $this->commentRepositoryInterface = $commentRepositoryInterface;
        $this->authorizeResource(Comment::class, 'comment');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.comment.index', $this->commentRepositoryInterface->indexComment());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.comment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request)
    {
        $this->commentRepositoryInterface->storeComment($request);
        return redirect()->back()->withSuccess('Comment Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        return view('admin.comment.show', $this->commentRepositoryInterface->showComment($comment));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        return view('admin.comment.edit', $this->commentRepositoryInterface->editComment($comment));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CommentRequest  $request
     * @param  \App\Models\Admin\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(CommentRequest $request, Comment $comment)
    {
        $this->commentRepositoryInterface->updateComment($request, $comment);
        return redirect(adminRedirectRoute('comment'))->withInfo('Comment Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $this->commentRepositoryInterface->destroyComment($comment);
        return redirect(adminRedirectRoute('comment'))->withFail('Comment Deleted Successfully.');
    }
}

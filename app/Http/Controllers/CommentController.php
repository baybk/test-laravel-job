<?php

namespace App\Http\Controllers;

use App\Lib\Helper;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    use Helper;

    public function __construct()
    {
        $this->middleware('auth:api')->only(['store', 'update', 'destroy']);
        $this->middleware('adminAuth')->only(['update', 'destroy']);
    }

    public function index(Request $request)
    {
        if ($request->input('post_id')) {
            $comments = Comment::with('user', 'post')
                ->where('approved', COMMENT_APPROVED)
                ->where('post_id', $request->input('post_id'))
                ->paginate(10);
        } else {
            $comments = Comment::with('user', 'post')->orderBy('id', 'DESC')->paginate(10);
        }
        return response()->json(['data' => $comments], 200);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'post_id' => 'required',
            'comment' => 'required'
        ]);

        $comment = new Comment();
        $comment->user_id = auth('api')->user()->id;
        $comment->post_id = $request->post_id;
        $comment->comment = $request->comment;

        $comment->save();

        return response()->json(
            [
                'data' => $comment,
                'message' => 'Comment created successfully! we will review and publish it soon'
            ],
            201
        );
    }

    public function show($id)
    {
        $comment = Comment::with('user', 'post')->findOrFail($id);
        return response()->json(['data' => $comment], 200);
    }

    public function update(Request $request, $id)
    {
        $comment = Comment::with('user', 'post')->findOrFail($id);

        if ($request->has('comment')) {
            $this->validate($request, [
                'comment' => 'required'
            ]);
        }

        if ($request->has('comment')) {
            $comment->comment = $request->comment;
        }

        if (isset($request->approved)) {
            $comment->approved = $request->approved;
        }

        $comment->save();

        return response()->json(['data' => $comment, 'message' => 'Updated successfully'], 200);
    }

    public function destroy($id)
    {
        Comment::findOrFail($id)->delete();
        return response()->json(['message' => 'Deleted successfully'], 200);
    }
}

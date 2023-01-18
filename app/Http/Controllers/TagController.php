<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as ResponseCode;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->only(['store', 'update', 'destroy']);
        $this->middleware('adminAuth')->only(['store', 'update', 'destroy']);
    }

    public function index(Request $request)
    {
        if ($request->input('all')) {
            $tags = Tag::all();
        } else {
            $tags = Tag::paginate(10);
        }
        return $this->sendSuccessWithoutMessage(
            ['data' => $tags]
        );
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required'
        ]);
        $tag = new Tag();
        $tag->title = $request->input('title');
        $tag->save();
        return $this->sendSuccess(
            ['data' => $tag],
            __('messages.create_success', ['objName' => transChoiceHp('messsages.tags')]),
            ResponseCode::HTTP_CREATED
        );
    }

    public function show($id)
    {
        $tag = Tag::findOrFail($id);
        return $this->sendSuccessWithoutMessage(
            ['data' => $tag]
        );
    }

    public function update(Request $request, $id)
    {
        $tag = Tag::findOrFail($id);
        $this->validate($request, [
            'title' => 'required'
        ]);
        $tag->title = $request->input('title');
        $tag->save();
        return $this->sendSuccess(
            ['data' => $tag],
            __('messages.update_success', ['objName' => transChoiceHp('messsages.tags')]),
        );
    }

    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();
        return $this->sendSuccess(
            [],
            __('messages.delete_success', ['objName' => transChoiceHp('messsages.tags')]),
        );
    }
}

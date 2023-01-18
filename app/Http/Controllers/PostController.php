<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\CreatePostRequest;
use App\Lib\Helper;
use App\Models\Post;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as ResponseCode;

class PostController extends Controller
{
    use Helper;

    public function __construct()
    {
        $this->middleware('auth:api')->only(['store', 'update', 'destroy']);
        $this->middleware('adminAuth')->only(['store', 'update', 'destroy']);
    }

    public function index(Request $request)
    {
        if ($request->input('recent')) {
            $posts = Post::with('category', 'user', 'tags')
                            ->where('published', POST_PUBLISHED)
                            ->orderBy('id', 'DESC')
                            ->limit(7)->get();
        } elseif ($request->input('category')) {
             $posts = Post::with('category', 'user', 'tags')
                            ->whereHas('category', function ($query) use ($request) {
                                $query->where('id', $request->input('category'));
                            })
                            ->where('published', POST_PUBLISHED)
                            ->orderBy('id', 'DESC')
                            ->paginate(10);
        } elseif ($request->input('tag')) {
            $posts = Post::with('category', 'user', 'tags')
                            ->whereHas('tags', function ($query) use ($request) {
                                $query->where('id', $request->input('tag'));
                            })
                            ->where('published', POST_PUBLISHED)
                            ->orderBy('id', 'DESC')
                            ->paginate(10);
        } else {
            $posts = Post::with('category', 'user', 'tags')
                            ->orderBy('id', 'DESC')
                            ->paginate(10);
        }

        return $this->sendSuccessWithoutMessage(
            ['data' => $posts]
        );
    }

    public function store(CreatePostRequest $request)
    {
        $post = new Post();
        $post->title = $request->input('title');
        $post->slug = $this->slugify($post->title);
        $post->content = $request->input('content');
        $post->published = $request->input('published');
        $post->category_id = $request->input('category_id');
        $post->user_id = auth("api")->user()->id;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $post->image = $filename;
        }

        $post->save();

        // store tags
        if ($request->has('tags')) {
            $post->tags()->sync($request->input('tags'));
        }

        $post = Post::with('tags')->find($post->id);
        return $this->sendSuccess(
            ['data' => $post],
            __('messages.create_success', ['objName' => transChoiceHp('messsages.posts')]),
            ResponseCode::HTTP_CREATED
        );
    }

    public function show($id)
    {
        $post = Post::with('category', 'user', 'tags', 'comments', 'approvedComments')->findOrFail($id);
        $post->prev_post = Post::where('id', '<', $id)->orderBy('id', 'desc')->first();
        $post->next_post = Post::where('id', '>', $id)->first();
        return $this->sendSuccessWithoutMessage(
            ['data' => $post]
        );
    }

    public function update(Request $request, $id)
    {
        $post = Post::with('tags')->findOrFail($id);
        $rules = [
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required',
            'published' => 'required'
        ];
        if ($post->image == "" || ($post->image != "" && !\File::exists('uploads/' . $post->image))) {
            $rules['image'] = 'required';
        }
        $this->validate($request, $rules);
        $post->title = $request->input('title');
        $post->slug = $this->slugify($post->title);
        $post->content = $request->input('content');
        $post->published = $request->input('published');
        $post->category_id = $request->input('category_id');
        if ($request->hasFile('image')) {
            $this->removeImage($post);
            $file = $request->file('image');
            $filename = time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $post->image = $filename;
        }

        $post->save();

        // remove tags
        foreach ($post->tags as $tag) {
            $post->tags()->detach($tag->id);
        }

        // store tags
        if ($request->has('tags')) {
            $post->tags()->sync($request->input('tags'));
        }

        return $this->sendSuccess(
            ['data' => $post],
            __('messages.update_success', ['objName' => transChoiceHp('messsages.posts')]),
        );
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $this->removeImage($post);
        $post->delete();
        return $this->sendSuccess(
            [],
            __('messages.delete_success', ['objName' => transChoiceHp('messsages.posts')]),
        );
    }

    private function removeImage($post)
    {
        if ($post->image != "" && !\File::exists('uploads/' . $post->image)) {
            @unlink(public_path('uploads/' . $post->image));
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Lib\Helper;
use App\Models\Category;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as ResponseCode;

class CategoryController extends Controller
{
    use Helper;

    public function __construct()
    {
        $this->middleware('auth:api')->only(['store', 'update', 'destroy']);
        $this->middleware('adminAuth')->only(['store', 'update', 'destroy']);
    }

    public function index(Request $request)
    {
        if ($request->input('all')) {
            $categories = Category::orderBy('id', 'DESC')->get();
        } else {
            $categories = Category::paginate(10);
        }

        return $this->sendSuccessWithoutMessage(
            ['data' => $categories],
        );
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required'
        ]);
        $category = new Category();
        $category->title = $request->input('title');
        $category->slug = $this->slugify($category->title);
        $category->save();
        return $this->sendSuccess(
            ['data' => $category],
            __('messages.create_success', ['objName' => transChoiceHp('messages.categories')]),
            ResponseCode::HTTP_CREATED
        );
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
        return $this->sendSuccessWithoutMessage(
            ['data' => $category],
        );
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $this->validate($request, [
            'title' => 'required'
        ]);
        $category->title = $request->input('title');
        $category->slug = $this->slugify($category->title);
        $category->save();
        return $this->sendSuccess(
            ['data' => $category],
            __('messages.update_success', ['objName' => transChoiceHp('messages.categories')]),
        );
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return $this->sendSuccess(
            [],
            __('messages.delete_success', ['objName' => transChoiceHp('messages.categories')]),
        );
    }
}

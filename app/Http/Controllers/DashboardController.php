<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
        $this->middleware('adminAuth');
    }

    public function dashboard() {
        $countUsers = User::all()->count();
        $countPosts = Post::all()->count();
        $countComments = Comment::all()->count();
        $countCategories = Category::all()->count();
        $data = [
            'count_users' => $countUsers,
            'count_posts' => $countPosts,
            'count_comments' => $countComments,
            'count_categories' => $countCategories
        ];
        return $this->sendSuccessWithoutMessage(
            ['data' => $data],
        );
    }
}

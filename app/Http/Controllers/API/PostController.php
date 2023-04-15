<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use App\Services\Web\Post\CreatePostAction;
use App\Services\Web\Post\DeletePostAction;
use App\Services\Web\Post\EditPostAction;
use App\Services\Web\Reply\CreateReplyAction;
use App\Services\Web\TopPage\GetIndexInfoAction;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        
    }

    /** 
        * @OA\Get( 
            * path="/api/toppage",
            * summary="Get data for Top page",
            * operationId="Toppage Api",
            * tags={"top-page"},
            * security={{"sanctum":{}}},
            
            * @OA\Response(
                * response=200,
                * description="Success response",
                * @OA\JsonContent( 
                    * @OA\Property(property="success", type="boolean", example=true),
                    * @OA\Property(property="message", type="string", example=""),
                    * @OA\Property(property="status_code", type="integer", example=200),
                    * @OA\Property(property="data", type="object", example={
                        
                    * }) 
                * )
            * ) 
        * ) 
    */
    public function index(Request $request)
    {
        $user = auth('api')->user();
        $rdata = resolve(GetIndexInfoAction::class)->run($user->id, []);
        return $this->sendSuccessWithoutMessage($rdata, 200);
    }

    public function create(Request $request)
    {
        $user = auth('api')->user();
        $rdata = resolve(CreatePostAction::class)->run($user->id, $request->all());
        return $this->sendSuccessWithoutMessage($rdata, 200);
    }

    public function edit(Request $request, $postId)
    {
        $post = Post::findOrFail($postId);
        $user = auth('api')->user();
        if (!$user->is_admin) {
            if ($user->id !== $post->user_id) {
                return $this->sendError([], 'You are not allowed to edit this post');
            }
        }
        $rdata = resolve(EditPostAction::class)->run($postId, $request->all());
        return $this->sendSuccessWithoutMessage($rdata, 200);
    }

    public function delete(Request $request, $postId)
    {
        $post = Post::findOrFail($postId);
        $user = auth('api')->user();
        if (!$user->is_admin) {
            if ($user->id !== $post->user_id) {
                return $this->sendError([], 'You are not allowed to delete this post');
            }
        }
        $rdata = resolve(DeletePostAction::class)->run($postId);
        return $this->sendSuccessWithoutMessage($rdata, 200);
    }

    public function reply(Request $request, $postId)
    {
        $user = auth('api')->user();
        $rdata = resolve(CreateReplyAction::class)->run($user->id, $postId, $request->all());
        return $this->sendSuccessWithoutMessage($rdata, 200);
    }
}

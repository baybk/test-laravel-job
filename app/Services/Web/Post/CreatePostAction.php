<?php

namespace App\Services\Web\Post;

use App\Services\Action;
use App\Repositories\PostRepository;
use App\Http\Resources\PostResource;

class CreatePostAction extends Action
{
    protected $repository;

    public function __construct(PostRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($userId, $data)
    {
        try {
            $data1 = [
                'user_id' => $userId,
            ];
            $dataCreate =  array_merge($data1, $data);

            $post =  $this->repository->create($dataCreate);
            
            return new PostResource($post);
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
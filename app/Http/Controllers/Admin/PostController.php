<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Repository\api\PostRepositoryApi;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct(PostRepositoryApi $postRepositoryApi)
    {
        $this->postRepositoryApi = $postRepositoryApi;
    }


    public function select(PostRepositoryApi $postRepositoryApi)
    {
        return $postRepositoryApi->select();
    }

    public function insert(PostRepositoryApi $postRepositoryApi,CreatePostRequest $request)
    {
        return $postRepositoryApi->insert($request);
    }
    public function destroy(PostRepositoryApi $postRepositoryApi,Request $request)
    {
        return $postRepositoryApi->destroy($request);
    }
    public function update(PostRepositoryApi $postRepositoryApi,UpdatePostRequest $request)
    {
        return $postRepositoryApi->update($request);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repository\api\PostRepositoryApi;

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
}

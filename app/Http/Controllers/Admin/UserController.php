<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repository\api\UserRepositoryApi;

class UserController extends Controller
{
    public function __construct(UserRepositoryApi $userRepositoryApi)
    {
        $this->userRepositoryApi = $userRepositoryApi;
    }


    public function select(UserRepositoryApi $userRepositoryApi)
    {
        return $userRepositoryApi->select();
    }
}

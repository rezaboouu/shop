<?php

namespace App\Repository\api\Contract;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Nette\Utils\Json;


interface ProductRepositoryInterfaceApi
{
    public function select() :JsonResponse;

}

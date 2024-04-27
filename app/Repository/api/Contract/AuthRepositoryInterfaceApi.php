<?php

namespace App\Repository\api\Contract;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Nette\Utils\Json;
use phpseclib3\Math\PrimeField\Integer;


interface AuthRepositoryInterfaceApi
{


//    public function update(UpdateProductRequest $request) :JsonResponse;

    public function login(LoginRequest $request):JsonResponse;

    public function register(RegisterRequest $request):JsonResponse;



}

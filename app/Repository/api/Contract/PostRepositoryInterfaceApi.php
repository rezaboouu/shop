<?php

namespace App\Repository\api\Contract;

use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Nette\Utils\Json;
use phpseclib3\Math\PrimeField\Integer;


interface PostRepositoryInterfaceApi
{
    public function select() :JsonResponse;
    public function insert(CreatePostRequest $request): JsonResponse;
    public function destroy(Request $request): JsonResponse;
    public function update(UpdatePostRequest $request): JsonResponse;


}

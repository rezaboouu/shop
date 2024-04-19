<?php

namespace App\Repository\api\Contract;

use App\Http\Requests\StoreProductRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Nette\Utils\Json;
use phpseclib3\Math\PrimeField\Integer;


interface ProductRepositoryInterfaceApi
{
    public function select() :JsonResponse;
    public function insert(StoreProductRequest $request) :JsonResponse;
    public function destroy(Request $request) :JsonResponse;


}

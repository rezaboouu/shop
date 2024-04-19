<?php

namespace App\Repository\api;


use App\Models\Admin\Task\Task;
use App\Models\Admin\Task\TaskCompletions;
use App\Models\Admin\User;
use App\Models\product;
use App\Repository\api\Contract\ProductRepositoryInterfaceApi;
use App\Repository\api\Contract\ProfileRepositoryInterfaceApi;
use App\Repository\api\Contract\TaskRepositoryInterfaceApi;
use App\Repository\api\Contract\UserRepositoryInterfaceApi;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;




class ProductRepositoryApi   implements ProductRepositoryInterfaceApi
{


    public function select(): JsonResponse
    {
        $product = product::select("name","desc","sku","category_id","inventory_id","price")
            ->paginate(20);


        if ($product->isEmpty()){
            return response()->json([
                'code' => 2,
                'message' => 'محصولی پیدا نشد',
                'data' => null,
            ], 400);
        }
        return response()->json([
            'code' => 1,
            'message' => 'محصولات',
            'data' => [$product],
        ], 200);

    }
}
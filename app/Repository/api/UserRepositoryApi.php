<?php

namespace App\Repository\api;


use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\product;
use App\Models\User;
use App\Repository\api\Contract\ProductRepositoryInterfaceApi;
use App\Repository\api\Contract\UserRepositoryInterfaceApi;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;




class UserRepositoryApi implements UserRepositoryInterfaceApi
{

    //select users and pagination in address  domain/v1/api/user
    public function select(): JsonResponse
    {
        $users = User::select("role","username","password","first_name","last_name","phone",
        "address","email","email_verified_at")
            ->paginate(20);

        if ($users->isEmpty()){
            return response()->json([
                'code' => 2,
                'message' => 'کاربری پیدا نشد',
                'data' => null,
            ], 400);
        }
        return response()->json([
            'code' => 1,
            'message' => 'کاربران',
            'data' => [$users],
        ], 200);
    }

//    //insert product and pagination in address  domain/v1/api/product/create
//    public function insert(StoreProductRequest $request): JsonResponse
//    {
//
//        $data = $request->all();
//
//        if (!$data){
//            return response()->json([
//                'code' => 2,
//                'message' => 'اطلاعات وارد شده اشتباع است ',
//                'data' => null,
//            ], 400);
//        }
//
//      $product= product::create($data);
//
//        if ($product){
//
//            return response()->json([
//                'code' => 1,
//                'message' => 'محصول جدید اضافی شد ',
//                'data' => $product,
//            ], 200);
//        }
//
//        return response()->json([
//            'code' => 2,
//            'message' => 'اطلاعات وارد شده اشتباع است ',
//            'data' => null,
//        ], 400);
//
//    }
//
//    //delete product and pagination in address  domain/v1/api/product/delete
//    public function destroy(Request $request): JsonResponse
//    {
//        $id = $request->id;
//
//        if (!$id){
//            return response()->json([
//                'code' => 2,
//                'message' => 'ایدی پیدا نشد ',
//                'data' => null,
//            ], 400);
//        }
//
//        $product = product::find($id);
//
//        if (!$product){
//            return response()->json([
//                'code' => 2,
//                'message' => 'ایدی پیدا نشد ',
//                'data' => null,
//            ], 400);
//        }
//        $product->delete();
//        return response()->json([
//            'code' => 1,
//            'message' => 'محصول حذف شد',
//            'data' => true,
//        ], 200);
//    }
//
//
//    //update product and pagination in address  domain/v1/api/product/delete
//    public function update(UpdateProductRequest $request): JsonResponse
//    {
//        $data = $request->all();
//
//        $id = $request->id;
//
//        if (!$id){
//            return response()->json([
//                'code' => 2,
//                'message' => 'شناسه محصول اشتباه است ',
//                'data' => null,
//            ], 400);
//        }
//        $product = product::find($id);
//
//
//        $product->update($data);
//
//        return response()->json([
//            'code' => 1,
//            'message' => 'عملیات با موفقیت انجام شد',
//            'data' => $product,
//        ], 400);
//    }
}

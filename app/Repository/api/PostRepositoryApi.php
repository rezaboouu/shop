<?php

namespace App\Repository\api;


use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Post;
use App\Models\product;
use App\Repository\api\Contract\PostRepositoryInterfaceApi;
use App\Repository\api\Contract\ProductRepositoryInterfaceApi;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class PostRepositoryApi implements PostRepositoryInterfaceApi
{

    //select posts and pagination in address  domain/v1/api/posts
    public function select(): JsonResponse
    {
        $posts = Post::select("author_id","category_id","slug","title","published","summary",
        "content")
            ->paginate(20);

        if ($posts->isEmpty()){
            return response()->json([
                'code' => 2,
                'message' => 'پستی پیدا نشد',
                'data' => null,
            ], 400);
        }
        return response()->json([
            'code' => 1,
            'message' => 'پست ها',
            'data' => [$posts],
        ], 200);
    }

    //insert post and pagination in address  domain/v1/api/admin/post/create
    public function insert(CreatePostRequest $request): JsonResponse
    {

        $data = $request->all();
        if (!$data){
            return response()->json([
                'code' => 2,
                'message' => 'اطلاعات وارد شده اشتباع است ',
                'data' => null,
            ], 400);
        }

        $post= Post::create($data);

        if ($post){
            return response()->json([
                'code' => 1,
                'message' => 'پست جدید اضافی شد ',
                'data' => $post,
            ], 200);
        }

        return response()->json([
            'code' => 2,
            'message' => 'اطلاعات وارد شده اشتباع است ',
            'data' => null,
        ], 400);
    }

    //delete post and pagination in address  domain/v1/api/admin/post/delete
    public function destroy(Request $request): JsonResponse
    {
        $id = $request->id;

        if (!$id){
            return response()->json([
                'code' => 2,
                'message' => 'ایدی پیدا نشد ',
                'data' => null,
            ], 400);
        }

        $post = Post::find($id);

        if (!$post){
            return response()->json([
                'code' => 2,
                'message' => 'ایدی پیدا نشد ',
                'data' => null,
            ], 400);
        }
        $post->delete();
        return response()->json([
            'code' => 1,
            'message' => 'محصول حذف شد',
            'data' => true,
        ], 200);
    }


    //update product and pagination in address  domain/v1/api/product/delete
    public function update(UpdatePostRequest $request): JsonResponse
    {
        $data = $request->all();

        $id = $request->id;



        if (!$id){
            return response()->json([
                'code' => 2,
                'message' => 'شناسه محصول اشتباه است ',
                'data' => null,
            ], 400);
        }

        $post = Post::find($id);



        $post->update($data);

        return response()->json([
            'code' => 1,
            'message' => 'عملیات با موفقیت انجام شد',
            'data' => $post,
        ], 400);
    }
}

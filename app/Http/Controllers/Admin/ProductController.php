<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Repository\api\ProductRepositoryApi;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function __construct(ProductRepositoryApi $productRepositoryApi)
    {
        $this->productRepositoryApi = $productRepositoryApi;
    }

    public function select(ProductRepositoryApi $productRepositoryApi)
    {
        return $productRepositoryApi->select();
    }
    public function insert(ProductRepositoryApi $productRepositoryApi, StoreProductRequest $request)
    {
        return $productRepositoryApi->insert($request);
    }
    public function destroy(ProductRepositoryApi $productRepositoryApi,Request $request)
    {
        return $productRepositoryApi->destroy($request);
    }
    public function update(ProductRepositoryApi $productRepositoryApi,UpdateProductRequest $request)
    {
        return $productRepositoryApi->update($request);
    }

}

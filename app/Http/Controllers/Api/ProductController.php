<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\CreateProductValidator;
use App\Http\Requests\Product\UpdateProductValidator;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends BaseController
{
    public $productService;
    public function __construct(ProductService $productService){
        $this->productService=$productService;
    }
    public function index()
    {
        return $this->productService->getProducts();
    }

    public function create()
    {
        //
    }

    public function store(CreateProductValidator $createProductValidator)
    {
        if(!empty($createProductValidator->getErrors()))
        {
            return response()->json($createProductValidator->getErrors(),406);
        }
        $data = $createProductValidator->request()->all();
        $data['user_id']=Auth::user()->id;
        $response=$this->productService->createProduct($data);
        return $this->sendResponse($response);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        
    }

    public function update(UpdateProductValidator $updateProductValidator, $id)
    {
        if(!empty($updateProductValidator->getErrors()))
        {
            return response()->json($updateProductValidator->getErrors(),406);
        }
        $data=$updateProductValidator->request()->all();
        $data['user_id']=Auth::user()->id;
        $response=$this->productService->updateProduct($id,$data);
        return $this->sendResponse($response);
    }

    public function destroy($id)
    {
        $this->productService->deleteProduct($id);
        return $this->sendResponse(['Result'=>'Deleted Successfully']);
    }

    public function export()
    {
        
    }
    public function import()
    {

    }
}

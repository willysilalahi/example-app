<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use App\Http\Requests\ProductRequest;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProductController extends Controller
{
    function index()
    {
        $name = 'INDEX';
        return view('product', compact('name'));
    }

    /**
     *    @OA\Get(
     *       path="/kategori-berita",
     *       tags={"Berita"},
     *       operationId="kategoriBerita",
     *       summary="Kategori Berita",
     *       description="Mengambil Data Kategori Berita",
     *       @OA\Response(
     *           response="200",
     *           description="Ok",
     *           @OA\JsonContent
     *           (example={
     *               "success": true,
     *               "message": "Berhasil mengambil Kategori Berita",
     *               "data": {
     *                   {
     *                   "id": "1",
     *                   "nama_kategori": "Pendidikan",
     *                  }
     *              }
     *          }),
     *      ),
     *  )
     */
    function detail($id)
    {
        $pro = 'DETAIL';
        $product = ProductModel::whereIn('id', [1, 2, 3, 4, 5, 6, 7, 8, 9, 10])->get();
        return response($product);
    }

    function add()
    {
        $name = 'ADD VIEW';
        return view('product', compact('name'));
    }

    function getProducts()
    {
        $product = ProductModel::orderByDesc('id')->take(10)->get();
        return response([
            'status' => true,
            'message' => 'Success get product data',
            'data' => $product
        ]);
    }

    function createProducts(ProductRequest $request)
    {
        try {
            $product = ProductModel::create([
                'name' => $request->name,
                'price' => $request->price,
                'status' => $request->status,
                'desc' => 'desc',
                'slug' => 'slug',
                'expired' => 'sip',
            ]);
            return response([
                'status' => true,
                'message' => 'Success create product',
                'data' => $product
            ]);
        } catch (\Throwable $th) {
            return response([
                'status' => false,
                'message' => 'Failed create product',
                'error' => $th->getMessage()
            ]);
        }
    }
}

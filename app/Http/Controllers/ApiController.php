<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiController extends Controller
{
    public function getProducts(): JsonResponse
    {
        $products = Product::where('active', 1)
            ->with(['category' => function ($query) {
                $query->select('id', 'title');
            }]);

        return response()->json([
            'success' => true,
            'total' => $products->count(),
            'products' => $products->get()
        ]);
    }

    public function getProductDetails(Request $request, $id): JsonResponse
    {
        $product = Product::where('id', $id)->with(['category' => function ($query) {
            $query->select('id', 'title');
        }])->first();

        if (is_null($product)) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found'
            ], Response::HTTP_NOT_FOUND);
        }

        return response()->json([
            'success' => true,
            'product' => $product
        ]);
    }
}

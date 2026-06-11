<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private function formatProduct(Product $product): array
    {
        return [
            ...$product->toArray(),
            '_id' => $product->id,
        ];
    }

    private function productCollection($products)
    {
        return response()->json($products->map(fn (Product $product) => $this->formatProduct($product))->values());
    }

    public function getProducts()
    {
        return $this->productCollection(Product::all());
    }
    
    public function getProduct($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
        return response()->json($this->formatProduct($product));
    }
    
    public function addProduct(Request $request)
    {
        $validated = $request->validate([
            'img' => 'required|string',
            'brand' => 'required|string',
            'title' => 'required|string',
            'rating' => 'nullable|numeric|min:0|max:5',
            'reviews' => 'nullable|integer|min:0',
            'sellPrice' => 'required|numeric',
            'orders' => 'nullable|string',
            'mrp' => 'nullable|string',
            'discount' => 'nullable|integer|min:0|max:100',
            'category' => 'required|string'
        ]);
        
        $product = Product::create($validated);
        return response()->json($this->formatProduct($product), 201);
    }
    
    public function getByCategory($category)
    {
        $products = Product::where('category', $category)->get();
        return $this->productCollection($products);
    }
    
    public function getTopRated()
    {
        $products = Product::where('rating', '>=', 4)
            ->orderBy('rating', 'desc')
            ->get();
        return $this->productCollection($products);
    }
    
    public function getBestSellers()
    {
        $products = Product::orderByRaw('CAST(orders AS UNSIGNED) DESC')
            ->take(10)
            ->get();
        return $this->productCollection($products);
    }
    
    public function searchProducts(Request $request)
    {
        $query = $request->get('q');
        $products = Product::where('title', 'like', "%{$query}%")
            ->orWhere('brand', 'like', "%{$query}%")
            ->get();
        return $this->productCollection($products);
    }
    
    public function filterProducts(Request $request)
    {
        $query = Product::query();
        
        if ($request->has('minPrice')) {
            $query->where('sellPrice', '>=', $request->minPrice);
        }
        if ($request->has('maxPrice')) {
            $query->where('sellPrice', '<=', $request->maxPrice);
        }
        if ($request->has('brand')) {
            $query->where('brand', $request->brand);
        }
        if ($request->has('rating')) {
            $query->where('rating', '>=', $request->rating);
        }
        
        return $this->productCollection($query->get());
    }

    
    public function listOfProducts($list)
    {
        switch($list) {
            case 'new':
                $products = Product::orderBy('created_at', 'desc')->take(20)->get();
                break;
            default:
                $ids = collect(explode(',', $list))
                    ->map(fn ($id) => (int) trim($id))
                    ->filter()
                    ->values();

                $products = $ids->isEmpty()
                    ? Product::take(20)->get()
                    : Product::whereIn('id', $ids)->get()->sortBy(
                        fn (Product $product) => $ids->search($product->id)
                    )->values();
        }

        return $this->productCollection($products);
    }
}

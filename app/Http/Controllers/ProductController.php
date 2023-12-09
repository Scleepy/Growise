<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function store(Request $request)
    {

        $fields = $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'category' => 'required|string',
            'stock' => 'required|integer',
            'productDescription' => 'required|string',
            'impact' => 'required|string',
            'productImage' => 'required|image|mimes:jpeg,png,jpg',
            'galleryImages.*' => 'image|mimes:jpeg,png,jpg',
        ]);

        $category = Category::where('CategoryName', $fields['category'])->first();

        // dd($category);

        if (!$category) {
            return redirect()->back()->withErrors(['category' => 'Invalid category selected']);
        }

        $productImagePath = $request->file('productImage')->store('products', 'public');

        // Store gallery images
        $galleryImages = [];
        if ($request->hasFile('galleryImages')) {
            foreach ($request->file('galleryImages') as $galleryImage) {
                $galleryImages[] = $galleryImage->store('products/gallery', 'public');
            }
        }

        $productData = [
            'ProductName' => $fields['name'],
            'Description' => $fields['productDescription'],
            'ITE' => $fields['impact'],
            'Price' => $fields['price'],
            'StockQuantity' => $fields['stock'],
            'ProductImage' => $productImagePath,
            'GalleryImages' => json_encode($galleryImages),
            'CategoryID' => $category->id
        ];

        $product = Product::create($productData);

        return redirect('/product-detail')->with('product', $product);
    }
}

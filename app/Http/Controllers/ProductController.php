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

        $fileName = time()  . '-' . $request->name . '-' . $request->file('productImage')->getClientOriginalName();

        $path = public_path('image/products');
        !is_dir($path) &&
            mkdir($path, 0777, true);
        $request->productImage->move($path, $fileName);

        // dd($request);

        $galleryImages = [];
        if ($request->hasFile('galleryImages')) {
            foreach ($request->file('galleryImages') as $galleryImage) {
                $galleryFileName = time() . '-' . $galleryImage->getClientOriginalName();
                $galleryImage->move($path, $galleryFileName);
                $galleryImages[] = $galleryFileName;
            }
        }

        // dd($galleryImages);

        $productData = [
            'ProductName' => $fields['name'],
            'Description' => $fields['productDescription'],
            'ITE' => $fields['impact'],
            'Price' => $fields['price'],
            'StockQuantity' => $fields['stock'],
            'ProductImage' => $fileName,
            'GalleryImages' => json_encode($galleryImages),
            'CategoryID' => $category->id
        ];

        $product = Product::create($productData);

        return redirect('/product-detail')->with('product', $product);
    }
}

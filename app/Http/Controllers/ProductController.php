<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function adminProducts()
    {
        $products = Product::all();

        return view('screens.admin.product', compact('products'));
    }

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

        if (!$category) {
            return redirect()->back()->withErrors(['category' => 'Invalid category selected']);
        }

        $fileName = time()  . '-' . $request->name . '-' . $request->file('productImage')->getClientOriginalName();

        $path = public_path('image/products');
        !is_dir($path) &&
            mkdir($path, 0777, true);
        $request->productImage->move($path, $fileName);

        $galleryImages = [];
        if ($request->hasFile('galleryImages')) {
            foreach ($request->file('galleryImages') as $galleryImage) {
                $galleryFileName = time() . '-' . $galleryImage->getClientOriginalName();
                $galleryImage->move($path, $galleryFileName);
                $galleryImages[] = $galleryFileName;
            }
        }

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

        return redirect('/admin/product');
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        // dd($product);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'price' => 'required|numeric',
            'category' => 'required|string',
            'stock' => 'required|integer',
            'productDescription' => 'required|string',
            'impact' => 'required|string',
            'productImage' => 'image|mimes:jpeg,png,jpg',
            'galleryImages.*' => 'image|mimes:jpeg,png,jpg',
        ]);

        // dd($validator);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        dd($product->ProductName);
        // Update the product data
        if ($request->hasFile('productImage')) {
            // Handle the product image update
            $fileName = time() . '-' . $request->name . '-' . $request->file('productImage')->getClientOriginalName();
            $path = public_path('image/products');
            !is_dir($path) && mkdir($path, 0777, true);
            $request->productImage->move($path, $fileName);
            $product->ProductImage = $fileName;
        }

        // Update other fields
        $product->ProductName = $request->input('name');
        $product->Description = $request->input('productDescription');
        $product->ITE = $request->input('impact');
        $product->Price = $request->input('price');
        $product->StockQuantity = $request->input('stock');


        // Update the category
        $category = Category::where('CategoryName', $request->input('category'))->first();

        if (!$category) {
            return redirect()->back()->withErrors(['category' => 'Invalid category selected']);
        }

        $product->CategoryID = $category->id;

        $product->save();

        // Handle gallery images update if provided
        if ($request->hasFile('galleryImages')) {
            $galleryImages = [];
            foreach ($request->file('galleryImages') as $galleryImage) {
                $galleryFileName = time() . '-' . $galleryImage->getClientOriginalName();
                $galleryImage->move($path, $galleryFileName);
                $galleryImages[] = $galleryFileName;
            }

            $product->GalleryImages = json_encode($galleryImages);
            $product->save();
        }

        return redirect('/admin/product');
    }
}

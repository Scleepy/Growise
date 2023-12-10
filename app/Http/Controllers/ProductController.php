<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

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

    public function edit(Product $product){
        return view('screens.admin.editproduct', ['product' => $product]);
    }

    public function update(Request $request, $id)
    {            
        $product = Product::findOrFail($id);
        
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

        $category = Category::where('CategoryName', $request->input('category'))->first();

        $fileName = $product->ProductImage;
        
        if ($request->hasFile('productImage')) {

            $imageFile = 'image/products/'.$product->ProductImage;

            if (File::exists($imageFile)) {
                File::delete($imageFile);
            }

            $fileName = time()  . '-' . $request->name . '-' . $request->file('productImage')->getClientOriginalName();

            $path = public_path('image/products');
            !is_dir($path) &&
                mkdir($path, 0777, true);
            $request->productImage->move($path, $fileName);
        }
        
        $galleryImages = $product->GalleryImages;

        if ($request->hasFile('galleryImages')) {
            $galleryImages = [];
            
            foreach ($request->file('galleryImages') as $galleryImage) {
                $galleryFileName = time() . '-' . $galleryImage->getClientOriginalName();
                $galleryImage->move($path, $galleryFileName);
                $galleryImages[] = $galleryFileName;
            }
        }

        $product->update([
            'ProductName' => $request->input('name'),
            'Description' => $request->input('productDescription'),
            'ITE' => $request->input('impact'),
            'Price' => $request->input('price'),
            'StockQuantity' => $request->input('stock'),
            'CategoryID' => $category->id,
            'ProductImage' => $fileName,
            'GalleryImages' => json_encode($galleryImages),
        ]);

        return redirect('/admin/product');
    }

    public function destroy(Product $product){
        $product->delete();
        return redirect('/admin/product');
    }
}

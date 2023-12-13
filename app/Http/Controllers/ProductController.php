<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function getAllProducts()
    {
        $products = Product::all();

        if (Auth::check() && Auth::user()->IsAdmin) {
            return view('screens.admin.product', compact('products'));
        } else {
            return view('screens.catalogue', ['products' => $products]);
        }
    }

    public function getAllProductsBySlug($slug)
    {
        $category = Category::where('Slug', $slug)->first();
        $products = Product::where('CategoryID', $category->id)->get();

        return view('screens.catalogue', ['products' => $products]);
    }

    public function productDetails($categorySlug, $productSlug)
    {
        $category = Category::where('Slug', $categorySlug)->first();
        $product = Product::where('CategoryID', $category->id)->where('Slug', $productSlug)->first();

        return view('screens.product-detail', ['product' => $product]);
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

        $slug = $this->generateSlug($fields['name']);

        $productData = [
            'ProductName' => $fields['name'],
            'Slug' => $slug,
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

    private function generateSlug($string) {
        $string = iconv('UTF-8', 'ASCII//TRANSLIT', $string);
        $string = preg_replace('/[^a-zA-Z0-9]/', ' ', $string);
        
        $string = strtolower($string);
        $string = trim(preg_replace('/\s+/', '-', $string), '-');
        
        return $string;
    }

    public function edit(Product $product)
    {
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

            $imageFile = 'image/products/' . $product->ProductImage;

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

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('/admin/product');
    }
}

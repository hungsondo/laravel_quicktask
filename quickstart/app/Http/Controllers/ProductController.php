<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products =  Product::paginate(config('app.product_number'));

        return view(
            'product.index',
            compact('products'),
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {
        $input = $request->all();
        $input["category_id"] = (int) $input["category_id"];
        if ($request->hasFile('image')){
            $file = $request->image;
            $filename = Str::slug($request->name, '-') . '.' . $file->getClientOriginalExtension();
            $request->file('image')->storeAs('public', $filename, 'local');
            $input["img"] = $filename;
        } else{
            $input["img"] = "no-img.jpg";
        }
        Product::create($input);

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        
        return view(
            'product.show',
            compact('product'),
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();

        return view(
            'product.edit',
            compact('product', 'categories'),
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $input = $request->all();
        if ($request->hasFile('image')){
            $file = $request->image;
            $filename = Str::slug($request->name, '-') . '.' . $file->getClientOriginalExtension();
            $request->file('image')->storeAs('public', $filename, 'local');
            $input["img"] = $filename;
        } else{
            $input["img"] = $product->img;
        }
        $product->update($input);

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        
        return redirect()->route('products.index');
    }
}

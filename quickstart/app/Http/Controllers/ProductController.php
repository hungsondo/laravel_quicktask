<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products =  Product::all();

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
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|int',
            'category_id' => 'required|int',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:14096',
        ]);

        $input = $request->all();

        if ($request->hasFile('image')){
            $file = $request->image;
            $filename = Str::slug($request->name, '-') . '.' . $file->getClientOriginalExtension();
            $request->file('image')->storeAs('public', $filename, 'local');
            $input["img"] = $filename;
        } else{
            $input["img"] = "no-img.jpg";
        }
        Product::create($input);

        return redirect()->route('product.index');
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

        return view(
            'product.edit',
            compact('product'),
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'price' => 'required|int',
            'category_id' => 'required|int',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:14096',
        ]);
        
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

        return redirect()->route('product.index');
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
        
        return redirect()->route('product.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        // $products = Product::with('user','category','brand')->orderby('created_at','DESC')->get();
        $products = Product::orderby('created_at','DESC')->get();
        // dd($products);
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('products.create', compact('categories','brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request,[
            'name' => 'required|min:2|max:20|unique:products',
            'sku' => 'required|min:2|max:20|unique:products',
            'image' => 'required',
            'cost_price' => 'required|min:2|max:20',
            'retail_price' => 'required|min:2|max:20',
            'year' => 'required',
            'description' => 'required',
        ]);

         if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/products/', $filename);
        }

        $product = new Product();
        // dd($product);
        $product->user_id = Auth::id();
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->image = $filename;
        $product->cost_price = $request->cost_price;
        $product->retail_price = $request->retail_price;
        $product->year = $request->year;
        $product->description = $request->description;

        $product->save();
        flash('Product Created Successfully!')->success();
        return back();


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Product::findOrFail($id);
        $categories = Category::all();
        $brands = Brand::all();
        return view('products.edit', compact('products','categories','brands'));
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

         $this->validate($request,[
            'name' => 'required|min:2|max:20|unique:brands,name,' . $id,
        ]);

        $product = Product::findOrFail($id);
        $product->user_id = Auth::id();
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->cost_price = $request->cost_price;
        $product->retail_price = $request->retail_price;
        $product->year = $request->year;
        $product->description = $request->description;

        if($request->hasfile('image'))
        {
            $destination = 'uploads/products/'. $product->image;
            if(File::exists($destination)){
                File::delete($destination);
            }

            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/products/', $filename);
            $product->image = $filename;
        }

        $product->save();

        flash('Product Updated Successfully!')->success();
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

        $destination = 'uploads/products/'.$product->image;
        
        if(File::exists($destination)){
            File::delete($destination);
            
        }

        $product->delete();

        flash('Product Deleted Successfully!')->success();
        return redirect()->route('products.index');
    }
}

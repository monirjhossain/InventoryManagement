<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Support\Facades\File;
// use Image;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::orderby('created_at','DESC')->get();
        return view('brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|min:2|max:20|unique:brands',
            'photo' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
        
        if($request->hasfile('photo'))
        {
            $file = $request->file('photo');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/brands/', $filename);
        }

        $brand = new Brand();
        $brand->name = $request->name;
        $brand->photo = $filename;

        $brand->save();
        
        flash('Brand Created Successfully')->success();
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
        $brand = Brand::findOrFail($id);
        return view('brand.edit', compact('brand'));
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

        $brand = Brand::findOrFail($id);
        $brand->name = $request->name;

        if($request->hasfile('photo'))
        {
            $destination = 'uploads/brands/'. $brand->photo;
            if(File::exists($destination)){
                File::delete($destination);
            }

            $file = $request->file('photo');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/brands/', $filename);
            $brand->photo = $filename;
        }

        $brand->save();

        flash('Brand Updated Successfully!')->success();
        return redirect()->route('brands.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);

        $destination = 'uploads/brands/'.$brand->photo;
        
        if(File::exists($destination)){
            File::delete($destination);
            
        }

        $brand->delete();

        flash('Brand Deleted Successfully!')->success();
        return redirect()->route('brands.index');
    }
}

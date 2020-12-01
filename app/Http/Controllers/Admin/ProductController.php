<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryContent;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use File;
use Auth;

class ProductController extends Controller{

    public function index(Request $request,$id)
    {
        $data['title'] = 'Product';
        $data['category'] =  Product::where('category_product_id',$id)->get();    
        return view('backend.product.index', compact('data'));
    }

    public function create($category_product_id)
    {
        
        $data['title'] = 'Product';
        $data['type'] = 'create';
        
        return view('backend.product.form', compact('data'));
    }

    public function store(Request $request)
    {
        

        Product::create([
            'category_product_id'   => $request->category_product_id,
            'kode'                 => $request->kode,
            'harga'                 => $request->harga,
            'keterangan'           => $request->keterangan,
            'status'               => $request->status,
            'created_by'            => Auth::user()['id']
        ]);

        return redirect()->route('product.index',['id'=> $request->category_product_id]);
    }

    public function edit($category_product_id,$id)
    {
        $data['title'] = 'Edit';
        $data['type'] = strtolower($data['title']);
        $data['content'] = Product::find($id);
        
       
        return view('backend.product.form', compact('data'));
    }

    public function update(Request $request,$id)
    {
        
        $category = Product::find($id);
        $category->update([
            'kode'                 => $request->kode,
            'harga'                 => $request->harga,
            'keterangan'           => $request->keterangan,
            'status'               => $request->status,
            'created_by'            => Auth::user()['id']
        ]);
        return redirect()->route('product.index',['id'=> $request->category_content_edit]);


    }


    public function destroy($id)
    {
        Product::where('id',$id)->delete();
        return redirect()->back();

    }


}

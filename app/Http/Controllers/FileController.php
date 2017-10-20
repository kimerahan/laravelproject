<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
       /* public function index(Request $request){
        $products = Product::orderBy('id','DESC')->paginate(5);
        return view('files.index',compact('products'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

        public function create(){
        return view('files.create');
    }

    public function store(Request $request) {
        
        $this->validate($request, [
            'name' => 'required',
            'details' => 'required',
            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $product = new Product($request->input()) ;
     
         if($file = $request->hasFile('product_image')) {
            
            $file = $request->file('product_image') ;
            
            $fileName = $file->getClientOriginalName() ;
            $destinationPath = public_path().'/images/' ;
            $file->move($destinationPath,$fileName);
            $product->product_image = $fileName ;
        }
        $product->save() ;
         return redirect()->route('upload-files.index')
                        ->with('success','You have successfully uploaded your files');
    }*/
}

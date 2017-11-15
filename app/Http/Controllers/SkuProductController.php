<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\SkuProduct;
use App\Models\Category;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class SkuProductController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }
    public function index()
    {
    	$products = SkuProduct::get();
    	return view('product.index', compact('products'));
    }
    public function create()
    {
    	$categoryList = Category::pluck('name', 'id');
    	return view('product.create', compact('categoryList'));
    }
    public function store(Request $request)
    {
    	$input = Input::all();
	    $rules = [
	    	'name' => 'required',
	    	'category_id' => 'required',
	    	'sku_price' => 'numeric|required'
	    ];
	    $messages = [
            'name.required' => 'The SKU Product Name field is required.',
            'category_id.required' => 'The Category field is required.',
            'sku_price.required' => 'The SKU Price field is required.'
        ];
	    
    	$validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
        	flash()->error('Something Wrong!');
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $existProduct = SkuProduct::where('name', $request->name)
                                    ->where('category_id', $request->category_id)
                                    ->get();
        
        if( count($existProduct) ) {
            flash()->error("This SKU Product already created in this Category.");
            return redirect()->back()
                        ->withInput();
        }

        $product = new SkuProduct;
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->sku_price = $request->sku_price;
        $product->description = $request->description;
        $product->created_by = Auth::id();
        $product->save();
        flash()->success($product->name.' SKU Product Created Successfully');
    	return redirect('sku-product');
    }
    public function edit($id)
    {
    	$product = SkuProduct::find($id);
    	$categoryList = Category::pluck('name', 'id');
    	return view('product.edit', compact('product', 'categoryList'));
    }
    public function update(Request $request, $id)
    {
    	
    	$input = Input::all();
	    $rules = [
	    	'name' => 'required',
	    	'category_id' => 'required',
	    	'sku_price' => 'numeric|required'
	    ];
	    $messages = [
            'name.required' => 'The SKU Product Name field is required.',
            'category_id.required' => 'The Category field is required.',
            'sku_price.required' => 'The SKU Price field is required.'
        ];
	    
    	$validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
        	flash()->error('Something Wrong!');
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $existProduct = SkuProduct::where('name', $request->name)
                                    ->where('category_id', $request->category_id)
                                    ->get();
        
        if( count($existProduct) > 1) {
            flash()->error("This SKU Product already created in this Category.");
            return redirect()->back()
                        ->withInput();
        }

        $product = SkuProduct::find($id);
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->sku_price = $request->sku_price;
        $product->description = $request->description;
        $product->updated_by = Auth::id();
        $product->save();
        flash()->success($product->name.' SKU Product Updated Successfully');
    	return redirect('sku-product');
    }
}
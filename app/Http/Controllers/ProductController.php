<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Product;
use App\ProductCategory;
use App\ProductSubcategory;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;

class ProductController extends Controller
{

    private $validator = [
        'name' => ['required','max:100'],
        'product_category_id' => ['required'],
        'product_subcategory_id' => ['required'],
        'product_content' => ['required','max:500'],
    ];

    private $formItems = [
        'product_category_id',
        'product_subcategory_id',
        'name',
        'image_1',
        'image_2',
        'image_3',
        'image_4',
        'product_content'
    ];

    public function show(){
        $product_categories = ProductCategory::orderBy('id','asc')->get();
        $product_subcategories = ProductSubcategory::orderBy('id','asc')->get();
        return view('product_regist')->with(['product_categories' => $product_categories,'product_subcategories' => $product_subcategories]);
	}

    public function subcategory(Request $request) {
        $product_category_id = $request->input('product_category_id');
        $product_subcategories = ProductSubcategory::where('product_category_id', $product_category_id)->get();
        return response()->json($product_subcategories);
    }

    public function imageUpload(Request $request)
    {
        //storageに保存してパスを返す
        $path = $request->file('image')->store('public/images');

        return basename($path);
    }

   public function post(Request $request){
        $input = $request->only($this->formItems);

        $validator = Validator::make($input, $this->validator);
		if($validator->fails()){
			return redirect()->action("ProductController@show")
				->withInput()
				->withErrors($validator);
		}
        
        $request->session()->put('form_input', $input);

        return redirect()->action("ProductController@confirm");
   }

   public function confirm(Request $request){

        $input = $request->session()->get('form_input');

        $category = ProductCategory::find($input['product_category_id']);
        $subcategory = ProductSubcategory::find($input['product_subcategory_id']);
        return view("product_confirmation",compact('input','category','subcategory'));
   }

   public function add(){
    
   }      
}

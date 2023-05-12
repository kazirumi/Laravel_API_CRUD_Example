<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    //get all product
    public function  index(){
        //return new ProductCollection(Product::all());

       return  CategoryResource::collection(Category::with('Products')->get());
    }

    // get product by id
    public function GetProductByID($id){
         //return new ProductResource(Product::findOrFail($id));

        //many to one
        //return Product::find($id)->Category;

        //one to many
        //return Category::find($id)->Products;

        // this one is for eager loading with sub table conditions
        return Category::with(['products'=> function($query){
           // $query->where('id', 12);
        }])->find($id);
    }

    // Store Product /insert

    public function Store(Request $request){

        $Input= $request->all();
        $validator = Validator::make($Input,[
            'ProductName'=>'required',
            'Price'=>'required',
            'Amount'=>'required',
            'Available'=>'required'
        ]);

        if($validator->fails())
            return $this->sendError('Validation error',$validator->errors());

        $product= Product::create($Input);
        return response()->json([
            'success'=> true,
            'message'=>'product created successfully',
            'product'=> $product
        ]);
    }

    public function UpdateProduct(Request $request,$id){
        if(Product::where('id',$id)->exists()){
            $product=Product::find($id);
            $product->ProductName=$request->ProductName;
            $product-> Price=$request->Price;
            $product->Amount=$request->Amount;
            $product->Available=$request->Available;
            $product->save();
            return response()->json([
                'message'=>'Product Updated successfully'
            ],200);
        }else{
            return response()->json([
                'message'=>'Product Record Not Found'
            ],400);
        }
    }
    public function DeleteProduct($id){
        if(Product::where('id',$id)->exists()){
            $product=Product::find($id);
            $product->delete();
            return response()->json([
                'message'=>'Product Delete successfully'
            ],200);
        }else{
            return response()->json([
                'message'=>'Product Record Not Found'
            ],404);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\Authenticate;
use App\Http\Controllers\Controller;

use App\Category;
use App\Product;

class ProductsController extends Controller {

    public function showProducts($category_name) {
        try {
            $category = Category::where('name', $category_name);
        } catch (\Exception $e) {
            $e -> getMessage();
            return response() -> setStatusCode(400);
        }
        return view('pages.products', ['category_name'=>$category_name,'category'=> $category]);
    }

    public function showAddProduct($category_name){
        try{
            $category = Category::where('name',$category_name);
        }catch(\Exception $e){
            $e -> getMessage();
            return response() -> setStatusCode(400);
        }
        return view('pages.add_product',['category_name'=>$category_name]);
    }

    public function showEditProduct($id){

        $product = Product::where('id',$id)->first();
        $category_name = Category::where('id',$product->category_id)->get()->name;

        $photos = Photo::where('product_id',$id)->get();


        return view('pages.add_product',['category_name'=>$category_name,'product'=>$product,'photos'=>$photos]);
        

    }

}

?>
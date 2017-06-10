<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\SellerData;
use App\SubCategory;
use App\MainCategory;

use Session;
class GuestController extends Controller
{
    public function index(){
      // fetch all the main category for nav
      $mains = MainCategory::all();
      return view('front.home')->withMains($mains);
    }
    public function categoryProducts($id){
      //find all products
      $mains = MainCategory::all();
      $products = Product::where('category_id', $id)->paginate(12);
      $category = Category::find($id);
      //return to view.
      return view('front.categoryProducts')->withProducts($products)->withCategory($category)->withMains($mains);
    }
    public function single($id){
      $mains = MainCategory::all();
      $product = Product::find($id);
      return view('front.single')->withProduct($product)->withMains($mains);
    }
    public function search(Request $request){
      $mains = MainCategory::all();
      $products = Product::where('name', 'like', '%' . $request->search . '%')->orWhere('description', 'like', '%' . $request->search . '%')->paginate(12);
       return view('front.search')->withProducts($products)->withMains($mains);
    }
}

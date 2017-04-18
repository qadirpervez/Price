<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\SellerData;
use App\SUbCategory;

use Session;
class GuestController extends Controller
{
    public function index(){
      // fetch all the category
      $asideCategories = Category::all();
      //Redirect to page with variables
      return view('front.home')->withAsidecategories($asideCategories);
    }
    public function categoryProducts($id){
      //find all products
      $asideCategories = Category::all();
      $products = Product::where('category_id', $id)->paginate(12);
      $category = Category::find($id);
      //return to view.
      return view('front.categoryProducts')->withProducts($products)->withCategory($category)->withAsidecategories($asideCategories);
    }
    public function single($id){
      $asideCategories = Category::all();
      $product = Product::find($id);
      return view('front.single')->withProduct($product)->withAsidecategories($asideCategories);
    }
}

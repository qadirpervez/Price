<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
class AdminController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
    }
    public function index(){
      $products = Product::paginate(12);
      return view('admin.dashboard')->withProducts($products);
    }
    public function categoryProducts($id){
      //find all products
      $products = Product::where('category_id', $id)->paginate(12);
      $category = Category::find($id);
      //return to view.
      return view('admin.categoryProducts')->withProducts($products)->withCategory($category);
    }
    public function search(Request $request){
      $products = Product::where('name', 'like', '%' . $request->search . '%')->orWhere('description', 'like', '%' . $request->search . '%')->paginate(12);
       return view('admin.search')->withProducts($products);
    }
}

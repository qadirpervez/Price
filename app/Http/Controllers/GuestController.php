<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Category;
use App\Product;
use App\SellerData;
use App\SubCategory;
use App\MainCategory;
use App\Brand;
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
      $brands = Brand::all();
      // getting products
      $query = Product::query();
      $prices = Input::has('prices') ? Input::get('prices') : '';
      $brand_filter = Input::has('brands') ? Input::get('brands') : '';
      $query = $query->where('category_id', '=', $id);
      if($prices){
        if(in_array(1, $prices)) {
          $query = $query->whereBetween('min_price', [0, 1999]);
        } else if(in_array(2, $prices)) {
          $query = $query->whereBetween('min_price', [2000, 4999]);
        } else if(in_array(3, $prices)) {
          $query = $query->whereBetween('min_price', [5000, 6999]);
        } else if(in_array(4, $prices)) {
          $query = $query->whereBetween('min_price', [7000, 9999]);
        } else if(in_array(5, $prices)) {
          $query = $query->whereBetween('min_price', [10000, 14999]);
        } else if(in_array(6, $prices)) {
          $query = $query->whereBetween('min_price', [15000, 99999999999999]);
        }
        foreach ($prices as $price) {
          if($price == 1) {
            $query = $query->orWhereBetween('min_price', [0, 1999]);
          } else if($price == 2) {
            $query = $query->orWhereBetween('min_price', [2000, 4999]);
          } else if($price == 3) {
            $query = $query->orWhereBetween('min_price', [5000, 6999]);
          } else if($price == 4) {
            $query = $query->orWhereBetween('min_price', [7000, 9999]);
          } else if($price == 5) {
            $query = $query->orWhereBetween('min_price', [10000, 14999]);
          } else if($price == 6) {
            $query = $query->orWhereBetween('min_price', [15000, 999999999999999999]);
          }
        }
      }
      if($brand_filter){
        foreach ($brand_filter as $brand) {
          $query = $query->where('brand_id', $brand);
          break;
        }
        foreach ($brand_filter as $brand) {
          $query = $query->orWhere('brand_id', $brand);
        }
      }
      $products = $query->paginate(12);
      $category = Category::find($id);
      //return to view.
      return view('front.categoryProducts')->withProducts($products)->withCategory($category)->withMains($mains)->withBrands($brands);
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

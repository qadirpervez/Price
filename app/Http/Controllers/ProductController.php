<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Seller;
use Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //fetch all products
        $products = Product::paginate(12);
        // redirect to the page with products
        return view('admin.product.index')->withProducts($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create')->withCategories($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // validate the data
        $this->validate($request, [
          'name' => 'required|max:255',
          'description' => 'required|max:255',
          'category_id' => 'required|numeric|max:255',
          'image_url' => 'required|url'
        ]);
        //store th data
        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->image_url = $request->image_url;
        $product->save();
        //Redirect with messages
        Session::flash('success', 'The Product is sucessfully added');
        return redirect()->route('product.show', $product->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //fetch the product
        //something called model binding dont need id in the show function parameter it knows that if Product model is used then this will accept a product bases on id.
        //return the view
        return view('admin.product.show')->withProduct($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //already fetched the product without doing $product = Product::find($id); using model binding
        $categories = Category::all();
        return view('admin.product.edit')->withProduct($product)->withCategories($categories);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      // validate the data
        $this->validate($request, [
          'name' => 'required|max:255',
          'description' => 'required|max:255',
          'category_id' => 'required|numeric|max:255',
          'image_url' => 'required|url'
        ]);
        //store th data
        $product = Product::find($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->image_url = $request->image_url;
        $product->save();
        //Redirect with messages
        Session::flash('success', 'The Product is sucessfully Changed');
        return redirect()->route('product.show', $product->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      //delete the pRODUCT
      $product = Product::find($id);
      $sellers = Seller::query()->where('product_id', $id)->get();
      foreach ($sellers as $seller) {
        $seller->delete();
      }
      $product->delete();

      //set session message and return to all category
      Session::flash('success', 'Product was sucessfully deleted.');
      return redirect()->route('product.index');
    }
}

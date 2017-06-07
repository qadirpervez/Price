<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\SubCategory;
use Session;
class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
      $this->middleware('auth');
    }

    public function index()
    {
      // create a variable and store all fetched categories
      $subCategories = SubCategory::all();
      // return view with categories
      return view('admin.subCategory.index')->withSubcategories($subCategories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $categories = Category::all();
      return view('admin.subCategory.create')->withCategories($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //validate the data
      $this->validate($request, [
        'name' => 'required|max:255',
        'category_id' => 'required|max:255|numeric'
      ]);
      //store in db
      $subCategory = new SubCategory;
      $subCategory->category_id = $request->category_id;
      $subCategory->name = $request->name;
      $subCategory->save();
      //redirect to another page
      Session::flash('success', 'The sub category "' . $subCategory->name . '" in "' . $subCategory->category->name . '" is sucessfully created');
      return redirect()->route('subCategory.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // fetch the category
         $subCategory = SubCategory::find($id);
         //return view with the category
         return view('admin.subCategory.delete')->withsubcategory($subCategory);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $categories = Category::all();
      // Find sub category
      $subCategory = SubCategory::find($id);
      // return with view
      return view('admin.subCategory.edit')->withSubcategory($subCategory)->withCategories($categories);
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
      //validate the data
      $this->validate($request, [
        'name' => 'required|max:255'
      ]);
      //save the data
      $subCategory = SubCategory::find($id);
      $subCategory->name = $request->name;
      $subCategory->save();
      //set flash and redirect
      Session::flash('success', 'The Sub Category is sucessfully updated.');
      return redirect()->route('subCategory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      //delete the Category
      $subCategory = SubCategory::find($id);
      $subCategory->delete();

      //set session message and return to all category
      Session::flash('success', 'Sub Category was sucessfully deleted.');
      return redirect()->route('subCategory.index');
    }
}

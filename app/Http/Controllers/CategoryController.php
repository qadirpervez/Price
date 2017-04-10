<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\SubCategory;
use Session;
class CategoryController extends Controller
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
      $categories = Category::all();
      // return view with categories
      return view('admin.category.index')->withCategories($categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
          'name' => 'required|max:255|unique:categories'
        ]);
        //store in db
        $category = new Category;
        $category->name = $request->name;
        $category->save();
        //redirect to another page
        Session::flash('success', 'The category "' . $category->name . '" is sucessfully created');
        return redirect()->route('category.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   // fetch the category
        $category = Category::find($id);
        //return view with the category
        return view('admin.category.delete')->withCategory($category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Find category
        $category = Category::find($id);
        // return with view
        return view('admin.category.edit')->withCategory($category);
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
          'name' => 'required|max:255|unique:categories,name,'.$id
        ]);
        //save the data
        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();
        //set flash and redirect
        Session::flash('success', 'The Category is sucessfully updated.');
        return redirect()->route('category.index');

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
        $category = Category::find($id);
        $subCategories = SubCategory::query()->where('category_id', $id)->get();
        foreach ($subCategories as $subCategory) {
          $subCategory->delete();
        }
        $category->delete();

        //set session message and return to all category
        Session::flash('success', 'Category and its Sub Categories were sucessfully deleted.');
        return redirect()->route('category.index');
    }
}

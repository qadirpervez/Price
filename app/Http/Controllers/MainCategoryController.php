<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MainCategory;
use Session;

class MainCategoryController extends Controller
{
    public function __condtruct()
    {
      $this->middleware('auth');
    }

    public function index()
    {
      $mains = MainCategory::all();
      return view('admin.main.index')->withMains($mains);
    }
    public function edit($id)
    {
        $maincategory = MainCategory::find($id);
        return view('admin.main.edit')->withMaincategory($maincategory);
    }
    public function update(Request $request, $id)
    {
      $this->validate($request, [
        'name' => 'required|max:255',
        'sponsor_pic1_url' => 'required|url',
        'sponsor_pic2_url' => 'required|url',
        'sponsor_pic3_url' => 'required|url',
        'sponsor1_url' => 'required|url',
        'sponsor2_url' => 'required|url',
        'sponsor3_url' => 'required|url'
      ]);
      $main = MainCategory::find($id);
      $main->name = $request->name;
      $main->sponsor_pic1_url = $request->sponsor_pic1_url;
      $main->sponsor_pic2_url = $request->sponsor_pic2_url;
      $main->sponsor_pic3_url = $request->sponsor_pic3_url;
      $main->sponsor1_url = $request->sponsor1_url;
      $main->sponsor2_url = $request->sponsor2_url;
      $main->sponsor3_url = $request->sponsor3_url;
      $main->save();

      Session::flash('success', 'The Main category "' . $main->name . '" is sucessfully updated');
      return redirect()->route('mainCategory.index');
    }
}

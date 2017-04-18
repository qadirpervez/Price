<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SellerData;
use App\Seller;
use Session;
class SellerDataController extends Controller
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
        $sellers = SellerData::all();
        return view('admin.seller.index')->withSellers($sellers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.seller.create');
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
        'name' => 'required|max:255|unique:seller_datas',
        'picture_url' => 'required|url'
      ]);
      //store in db
      $seller = new SellerData;
      $seller->name = $request->name;
      $seller->picture_url = $request->picture_url;
      $seller->save();
      //redirect to another page
      Session::flash('success', 'The Seller "' . $seller->name . '" is sucessfully added');
      return redirect()->route('sellerData.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $seller = SellerData::find($id);

        return view('admin.seller.delete')->withSeller($seller);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $seller = SellerData::find($id);

        return view('admin.seller.edit')->withSeller($seller);
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
        'name' => 'required|max:255|unique:seller_datas,name,'.$id,
        'picture_url' =>'required|url'
      ]);
      //save the data
      $seller = SellerData::find($id);
      $seller->name = $request->name;
      $seller->picture_url = $request->picture_url;
      $seller->save();
      //set flash and redirect
      Session::flash('success', 'The Seller is sucessfully updated.');
      return redirect()->route('sellerData.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      //delete the seller
      $seller = SellerData::find($id);
      $singleSellers = Seller::query()->where('seller_data', $id)->get();
      foreach ($singleSellers as $singleSeller) {
        $singleSeller->delete();
      }
      $seller->delete();

      //set session message and return to all category
      Session::flash('success', 'Seller was sucessfully deleted.');
      return redirect()->route('sellerData.index');
    }
}

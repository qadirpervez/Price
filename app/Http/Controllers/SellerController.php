<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seller;
use Session;

class SellerController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
       $this->middleware('auth');
    }
    public function store(Request $request)
    {
        //validate the data

        $this->validate($request, [
          'seller_data_id' => 'required|integer|max:255',
          'product_url' => 'required|url',
          'price' => 'required|numeric',
          'product_id' => 'required|numeric'
        ]);

        //store the data

        $seller = new Seller;
        $seller->seller_data_id = $request->seller_data_id;
        $seller->product_url = $request->product_url;
        $seller->price = $request->price;
        $seller->product_id = $request->product_id;

        $seller->save();

        //redirect with message
        Session::flash('success', 'Seller sucessfully added.');
        return redirect()->route('product.show', $request->product_id);
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
        'seller_data_id' => 'required|integer|max:255',
        'product_url' => 'required|url',
        'price' => 'required|numeric',
        'product_id' => 'required|numeric'
      ]);

      //store the data

      $seller = Seller::find($id);
      $seller->seller_data_id = $request->seller_data_id;
      $seller->product_url = $request->product_url;
      $seller->price = $request->price;
      $seller->product_id = $request->product_id;

      $seller->save();

      //redirect with message
      Session::flash('success', 'Seller sucessfully edited.');
      return redirect()->route('product.show', $seller->product_id);

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
      $seller = Seller::find($id);

      $seller->delete();

      //set session message and return to all category
      Session::flash('success', 'Seller was sucessfully deleted.');
      return redirect()->back();
    }
}

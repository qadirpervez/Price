<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct(){
      $this->middleware('guest', ['except' => 'destroy']);
    }
    public function create(){
      return view('admin.login');
    }
    public function store(){
      // login here...
      if(! auth()->attempt(request(['email', 'password']))){
        return back()->withErrors([
          'message' => 'Your credentials Didn\'t match.'
        ]);
      }

      return redirect()->route('admin');
    }
    public function destroy(){
      auth()->logout();
      return redirect('/');
    }
}

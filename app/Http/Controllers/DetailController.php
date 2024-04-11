<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Detail;
use Illuminate\Http\Request;
use CArbon\Carbon;

class DetailController extends Controller
{
   public function store(Request $request)
   {
        $photo = $request->file('photo'); 
        $name= base64_encode(Carbon::now()).$photo->getClientOriginalName();
        $photo->move(public_path('images/'),$name);
        
        $resume = new Detail();
        $resume->first_name = $request->input('first_name');
        $resume->last_name = $request->input('last_name');
        $resume->email = $request->input('email');
        $resume->photo = $name;
        $resume->save();
        return response(200);
   }

   public function verify(Request $request)
   {
      $email = $request->input('email');
      $vfy = Detail::where('email', '=', $email)->get();
      return response()->json($vfy);
   }
}

<?php

namespace App\Http\Controllers;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class DropdownController extends Controller
{
     // dropdown controller ------------------

     public function index()
     {
         $countries= Country::get(["name", "id"]);
        //  dd($countries);
         return view('user', compact('countries'));
     }
     /**
      * Write code on Method
      *
      * @return response()
      */
     public function fetchState(Request $request)
     {
       
         $data['states'] = State::where("country_id", $request->country_id)
                                 ->get(["name", "id"]);
   
         return response()->json($data);
     }
     /**
      * Write code on Method
      *
      * @return response()
      */
     public function fetchCity(Request $request)
     {
         $data['cities'] = City::where("state_id", $request->state_id)
                                     ->get(["name", "id"]);
                                       
         return response()->json($data);
     }
}

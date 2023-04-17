<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
   public function user(){
    return view('user');
   }
    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|regex:/^[a-zA-Z\s\-]+$/u|max:255',
            'pass' => 'required',
            'email' => 'required',
            'mobileno' => 'required',
            'address' => 'required',
            'country' => 'required',
        ]
    );
        $data=new User();
        $data->name=$request->name;
        $data->password=bcrypt($request->pass);
        $data->email=$request->email;
        $data->mobileno=$request->mobileno;
        $data->address=$request->address;
        $data->country_id=$request->country_id;
        $data->state=$request->state;
        $data->city_id=$request->city_id;

         $data->save();
         return redirect()->route('table')->with('msg','Data has store successfully');;
    }
    public function table(){
        $data=User::all();
        return view('table',compact('data'));
    }
    
     public function edit($id){
        $data=User::find($id);
        return view('edit',compact('data'));
     }
      
     public function update(Request $request,$id){


        $validated = $request->validate([
            'name' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
            'pass' => 'required',
            'email' => 'required',
            'mobileno' => 'required',
            'address' => 'required',
        ]);
        $data=User::find($id);
        $data->name=$request->name;
        $data->password=bcrypt($request->pass);
        $data->email=$request->email;
        $data->mobileno=$request->mobileno;
        $data->address=$request->address;
        $data->country=$request->country;


        $data->save();
        return redirect()->route('table')->with('msg','Data has update successfully');;

}
     public function delete($id){
        $data=User::find($id);
        $data->delete();
        return redirect()->route('table')->with('msg','Data has delete successfully');
    }

  
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

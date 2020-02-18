<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class UsersController extends Controller
{
   public function showProfile($id){
      $user = \App\User::find($id); 

      return view('profile')->with(['user'=>$user]);
      
   }

   public function editProfile($id){
      if($id==0){ 
          $user=new \App\User();
          $user->id=0;
      }
      else{
          $user = \App\User::find($id);
      }
      return view('profile_edit')->with(['user'=>$user]);
      
  }

  public function saveProfile(Request $request,$id){
      // validate & show error msg
      $validator = Validator::make($request->all(),[
         'name' => 'required|max:100',
         'city'=>'required|max:100', 
         'country' => 'required',
         'postcode' => 'required|max:20',
         'address'=>'required|max:255', 
         'phone' => 'required',
         'gender' => 'required',
         
     ],[
         'name.required'=>"The name field is required",
         'name.max'=>"The name may not exceed 100 characters",
         'city.required'=>"The city field is required",
         'city.max'=>"The city may not exceed 100 characters",
         'country.required'=>"The country field is required",
         'postcode.required'=>"The postcode field is required",
         'postcode.max'=>"The postcode may not exceed 20 characters",
         'address.required'=>"The address field is required",
         'address.max'=>"The city may not exceed 255 characters",
         'phone.required'=>"The phone field is required",
         'gender.required'=>"The gender field is required"
     ]);
     $validator->validate();

      if($id==0){ 
         $user = \App\User::create($request->all());
      }
      else{
         $user = \App\User::find($id);
         $user->update($request->all());
      }

      if($request->file('photo')){
         $path = $request->file('photo')->move('storage/users',$request->file('photo')->getClientOriginalName());
         $user->update(['image_url'=>$path]);
     }

      return redirect()->route('profile', [$id]);
   }
}

?>

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;

class AddressController extends Controller
{
    public function AddAddress(Request $request){
        $request->validate([
                'city' => 'required',
                'state' => 'required',
                'address' => 'required',
                'pincode' => 'required'
        ]);
        if(session('user')){

            $insert=new Address();
            $insert->city=$request->city;
            $insert->state=$request->state;
            $insert->address=$request->address;
            $insert->pincode=$request->pincode;
            $insert->user_id=session('user');
            $insert->save();
            return redirect()->back();
        }
        else{
            return redirect('/register');
        }
    }
}

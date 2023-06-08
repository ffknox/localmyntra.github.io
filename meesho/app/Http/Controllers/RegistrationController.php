<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Register;

class RegistrationController extends Controller
{
    public function registrationSubmit(Request $request)
    {

            $request->validate([
                'PhoneNumber' => 'required|numeric'
            ]);
            $number=$request->PhoneNumber;

        $exists = Register::where('phone_number', '=', $number)->first();

        if ($exists) {
            if($exists){
                session()->put(['user'=>$exists->id]);
                return redirect('/');
            }
            else{
                session()->flash('loginmessage', 'Failed. Please try agian');
                return redirect()->back();
            }
        } else {
            $insert = new Register;
            $insert->phone_number = $number;
            $insert->save();
            $sid = Register::where('phone_number', '=', $number)->first();
            session()->put(['user'=>$sid->id]);
            session()->flash('registermessage', 'Registration successful.');
            return redirect('/');
        }

    }
}

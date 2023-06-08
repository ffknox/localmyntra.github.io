<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MainAddress;
use Illuminate\Support\Facades\DB;

class MainAddressController extends Controller
{
     public function index($addressid){
       $selectaddress = DB::select('SELECT * FROM main_address WHERE user_id = ?', [session('user')]);

       if($selectaddress){
        // First method
        DB::update("UPDATE main_address SET address_id='$addressid' WHERE user_id = ?", [session('user')]);
        // Second method
        // MainAddress::where('user_id','=',session('user'))->update(['address_id' => $addressid]);
    }
    else{
        $insert=new MainAddress();
        $insert->user_id=session('user');
        $insert->address_id=$addressid;
        $insert->save();
    }
    return redirect()->back();
     }
}

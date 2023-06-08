<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sizes;
use App\Models\Products;
use App\Models\ProductImage;
use App\Models\ProductDetails;
use App\Models\Carts;


class CartController extends Controller
{
    public function AddToCartAction($product_id , $size){

        $products = Carts::where('user_id', '=', session('user'))
        ->where('product_size', '=', $size)
        ->where('product_id', '=', $product_id)
        ->first();
       if($products){
            //  increase quntity
            $products->user_id=session('user');
            $products->product_id=$product_id;
            $products->product_size=$size;
            $products->quantity=$products->quantity+1;
            $products->save();
            session()->flash('gotobag','GO TO BAG');
       }
       else{
           $insert=new Carts;
           $insert->user_id=session('user');
           $insert->product_id=$product_id;
           $insert->product_size=$size;
           $insert->quantity=1;
           $insert->save();
           session()->flash('gotobag','GO TO BAG');
        }
        return redirect()->back();
    }
}



<?php
    use App\Models\Carts;
    use App\Models\Sizes;
    use App\Models\Products;
    use App\Models\ProductImage;
    use App\Models\ProductDetails;
    use App\Models\Address;
    use App\Models\Register;
    use App\Models\MainAddress;
    $mainaddress=MainAddress::select('name', 'state', 'city', 'pincode', 'address', 'phone_number')
    ->join('registers', 'main_address.user_id', '=', 'registers.id')
    ->join('address', 'main_address.address_id', '=', 'address.id')
    ->where('main_address.user_id', '=', session('user'))
    ->first();

   $addresses=Address::where('user_id','=',session('user'))->get();
   $user=Register::where('id','=',session('user'))->first();

$cartdata=Carts::where('user_id','=',session('user'))->get();

?>
<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>
<body>

<style>
    html{
        font-size: 10px;
    }
    .maincontainer{
        width: 100%;
        padding: 1.2rem;
        display: flex;
        border-top:1px solid rgba(0, 0, 0, 0.151);
        padding:3rem 7rem 0rem 7rem;
        box-sizing: border-box;
    }
    .cartcontainer{
        width:60%;
    }
    .detailcontainer{
        padding: 1rem;
        width:40%;
        border: none;
        border-left:1px solid rgba(0, 0, 0, 0.171);
        padding-left: 1.2px;
        box-sizing:border-box;
        padding-left: 1rem;
    }
    .cart{
        width:95%;
        display:flex;
        border: 1px solid rgba(0, 0, 0, 0.575);
        box-sizing:border-box;
        padding: 1rem;
    }
    .cart .cartimg{
        width:23%;
        height:100%;
        overflow:hidden;
        position: relative;
    }
    .cart .cartimg img{
        width:100%;

    }
    .cartcontent{
        width:70%;
        padding-left: 1rem;
        font-family: system-ui;
     }
     .cartcontentdiv{
        margin-top:-5px;
        font-size: 1.1rem;
    font-weight: 500;
    color: #00000085;
     }
     .cartcontent h1{
        font-size: 1.7rem;
    font-weight: 700;
    color: #000000a4;
     }

     @media only screen and (max-width: 444px) {
    html {
        font-size: 8px;
    }
    .maincontainer {
        display: block;
        padding: 3rem 7rem 0rem 7rem;
        box-sizing: border-box;
    }
    .cartcontainer {
        width: 100%;
        padding-left: 1rem;
        font-family: system-ui;
    }
    .detailcontainer {
        width: 100%;
    }
}
     @media only screen and (min-width: 444px) and (max-width: 506px) {
    html {
        font-size: 8.3px;
    }
    .maincontainer {
        display: block;
        padding: 3rem 7rem 0rem 7rem;
        box-sizing: border-box;
    }
    .cartcontainer {
        width: 100%;
        padding-left: 1rem;
        font-family: system-ui;
    }
    .detailcontainer {
        width: 100%;
    }
}
     @media only screen and (min-width: 506px) and (max-width: 524px) {
    html {
        font-size: 8.7px;
    }
    .maincontainer {
        display: block;
        padding: 3rem 7rem 0rem 7rem;
        box-sizing: border-box;
    }
    .cartcontainer {
        width: 100%;
        padding-left: 1rem;
        font-family: system-ui;
    }
    .detailcontainer {
        width: 100%;
    }
}

/* Small devices (portrait tablets and large phones, 600px and up) */
@media only screen and (min-width: 524px) and (max-width: 600px) {
    html {
        font-size: 9px;
    }
    .maincontainer {
        display: block;
        padding: 3rem 7rem 0rem 7rem;
        box-sizing: border-box;
    }
    .cartcontainer {
        width: 100%;
        padding-left: 1rem;
        font-family: system-ui;
    }
    .detailcontainer {
        width: 100%;
    }
}

/* Medium devices (landscape tablets, 768px and up) */
@media only screen and (min-width: 600px) and (max-width: 768px) {
    html {
        font-size: 9.5px;
    }
}

/* Hide the default checkbox */
#cardcheckboxicon {
  appearance: none;
  -webkit-appearance: none;
  -moz-appearance: none;
  width: 16px;
  height: 16px;
  border: 1px solid #c2c2c2;
  border-radius: 2px;
  outline: none;
  cursor: pointer;
}

/* Create a custom checkbox */
#cardcheckboxicon:checked {
  background-color: #ff0080; /* Tick color */
  border-color: #ff0080;

}

/* Style the tick icon */
#cardcheckboxicon:checked::after {
  content: '';
  display: block;
  width: 5px;
  height: 8px;
  border: solid white;
  border-width: 0 2px 2px 0;
  transform: rotate(45deg);
  margin: 3px 0 0 4px;
}

</style>
<br><br>
<div class="maincontainer" style="">
    <div class="cartcontainer">
        <div style="margin-top:1.4rem;width: 95%;border:1px solid rgba(0, 0, 0, 0.089);display:flex;justify-content:space-between;padding:1.9rem;">
            @if($mainaddress)
            <div>
                <div>
                    <span style="color:rgba(0, 0, 0, 0.568);font-size: 12px;line-height: 15px;margin-top: 4px;overflow: hidden;text-overflow: ellipsis;text-transform: capitalize;">Delivery to: </span>
                    <span style="font-size: 1.2rem;color: #000000c2;font-weight:900;font-family:sans-serif;">
                        <span class="usernum">
                            @if (session('user'))
                            @if ($mainaddress->name)
                            {{$mainaddress->name}}
                            @else
                                           Guest

                            @endif
            @else
                           Guest
            @endif
            <span>&nbsp;&nbsp;<img style="width:13px;" src="{{url('img/edit.png')}}" alt=""></span>
        </span>
                    </span>
                    <span style="font-size: 1.2rem;color: #000000c2;font-weight:900;font-family:sans-serif;">, {{$mainaddress->city}}</span>
                </div>
                <div>
                 <span style="color:rgba(0, 0, 0, 0.568);font-size: 1rem;line-height: 15px;margin-top: 4px;overflow: hidden;text-overflow: ellipsis;text-transform: capitalize;">Lorem, ipsum dolor sit amet consectetur adipisicing,jaijaipur
                 </span>
                </div>
            </div>
            @endif
            <button onclick="changeaddressmodel()" style="background-color:rgba(255, 255, 255, 0);padding:.7rem 2rem;border-radius:2px;border:1px solid rgba(255, 0, 98, 0.199);color:rgba(255, 10, 92, 0.61);font-weight:800;">ADD NEW ADDRESS</button>
        </div>
        <br>
        <div>Your Items</div>
        @foreach($cartdata as $cart)
<?php
        $products = Products::join('product_details', 'products.id', '=', 'product_details.id')
        ->join('product_images', 'products.id', '=', 'product_images.product_id')
        ->select('products.*', 'product_details.color', 'product_details.point_one', 'product_details.point_two', 'product_images.imglink')
        ->where('products.id', '=',$cart->product_id)
        ->get();
        $product_sizes=Sizes::where('product_id','=',$cart->product_id)->get();
?>
@foreach ($products as $product)
        <div style='margin-bottom:10px;border:1px solid rgba(0, 0, 0, 0.089);' class="cart">
            <div class="cartimg">
                <img src="{{url($product->imglink)}}" class="img-fluid rounded-start" alt="...">
                     <input id="cardcheckboxicon" name="" type="checkbox" style="position: absolute;top:3px;left:3px;" value="" />
            </div>
            <div class="cartcontent">
               <h1>{{$product->name}}</h1>
               <div class="cartcontentdiv">{{$product->description}}</div>
               <div class="cartcontentdiv"><span>Sold By: </span><span>Caronotaoo satan</span></div>
               <br>
               <div>
                   <span>
                       <button style="background-color:rgb(240, 240, 240);border:none;padding:3px 5px;color: #000000c4;
                        font-size: 1.2rem;
                        font-weight: 700;
                        letter-spacing: .5px;">Size: {{$cart->product_size}}</button>
                    </span>
                    <span style="margin-left:1rem;">
                        <button style="background-color:rgb(240, 240, 240);border:none;padding:3px 5px;color: #000000bb;
                        font-size: 1.2rem;
                        font-weight: 700;
                        letter-spacing: .5px;">Quantity: {{$cart->quantity}}</button>
                    </span>
                </div>
                <br>
               <div class="cartcontentdiv"><span><span>Rs. </span><span> ${{$product->price}} </span></span><span style="text-decoration: line-through"> $1389 </span><span style="color:rgba(255, 0, 0, 0.671);">55% OFF</span></span></div>
               <br>
               <div style="font-weight: 400;" class="cartcontentdiv">100% delivery <span style='color:rgba(0, 128, 0, 0.836);'>FREE</span></div>
               <div style="font-weight: 400;" class="cartcontentdiv">14 day return<span style='color:rgba(0, 128, 0, 0.836);'>available</span></div>
        </div>
        </div>

        @endforeach
        @endforeach

    </div>
    <div class="detailcontainer">
<br>
<hr style="color:rgba(0, 0, 0, 0.432);">
<div>
<div style="display:flex;justify-content:space-between;color:rgba(0, 0, 0, 0.623);font-weight:500;font-size:1.2rem;">PRICE DETAILS (11 items)</div>
<br>
<div style="display:flex;justify-content:space-between;color:rgba(0, 0, 0, 0.623);font-weight:500;font-size:1.4rem;"><span>Total MRP</span><span>$54,432</span></div>
<div style="display:flex;justify-content:space-between;color:rgba(0, 0, 0, 0.623);font-weight:500;font-size:1.4rem;"><span>Discount MRP</span><span style="color:rgba(0, 128, 0, 0.808);">-$34,293</span></div>
<div style="display:flex;justify-content:space-between;color:rgba(0, 0, 0, 0.623);font-weight:500;font-size:1.4rem;"><span>Convenience Fee</span><span><span style="text-decoration:line-through;">$99</span>$34</span></div>
<hr>
<div style="font-size:1.7rem;display:flex;justify-content:space-between;font-weight:700;color:rgba(0, 0, 0, 0.774);"><span>Total Amount</span><span>$20,444</span></div>
<br>
<center>
    <a style="display:flex;justify-content:space-between;font-weight:700;color:rgba(255, 255, 255, 0.938);background-color:rgb(255, 49, 84);padding:1rem 4.5rem;border-radius:2px;font-size:1.4rem;border:none;text-decoration:none;width:fit-content;" href="">PLACE ORDER</a>
</center>
</div>
    </div>
</div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>




<style>
    #addaddressmodelcontainer{
        background-color:rgba(0, 0, 0, 0.116);
        display: flex;
        justify-content:center;
        align-items: center;
        height: 100vh;
        width: 100%;
        position: fixed;
        top:1px;
        left:1px;
        z-index: 444444444444444444444444444444444444444444;
        visibility:hidden;
}
.card{
    padding:1.6rem;box-sizing:border-box;border:none;border-bottom:1px solid black;
    display:flex;

}
</style>
    <div id='addaddressmodelcontainer'>
        <div style="width:60%;background-color:white;    width: 40%;
        background-color: rgb(238, 238, 238);
        height: 70%;border-radius:5px;overflow:hidden;
       ">
<div style="height: 5rem;width:inherit;">
    <div style="padding:1.6rem;background-color:rgb(255, 255, 255);display:flex;justify-content:space-between;    height: 5rem;
        align-items: center;position:fixed; width: inherit;z-index:4444;">
            <h5 class="card-header">
                Change Delivery Address OR <span><a type="button" class="btn btn-light" href="/address">Add</a></span>
            </h5>
            <span onclick="changeaddressmodelclose()" style="
                font-size: 15px;
                font-weight: 700;
                font-family: cursive;cursor:pointer;">X</span>
                </div>

    </div>

       <br>
            <div style="    height: 84%;
            overflow: scroll;">
            @foreach ($addresses as $address)
                        <?php
                          $mainadressel=MainAddress::where(['user_id'=>session('user'),'address_id'=>$address->id])->first();
                          ?>
            @if ($mainadressel)


            <label class="card" onclick="window.location.href='/default_address/{{$address->id}}'" style="    background-color: #ff0090;
                color: white;
                font-family: system-ui;
                font-weight: 900;
                letter-spacing: .1px; margin-top:5px;
                border-bottom: ;      box-shadow: inset white 0px 6px 27px 0px;  font-size: 1.1rem;">

                <span>
                </span>
                <div>
                        <h5 class="card-title">{{$user->name}}</h5>
                        <p class="card-text">{{$address->city}}</p>
                        <p class="card-text">{{$address->pincode}}</p>
                        <p class="card-text">{{$address->address}}</p>
                    </div>
                </label>
                @else

                <label style="  margin-top:5px;  background-color: #ffffff;
                color: rgba(0, 0, 0, 0.671);
                font-family: system-ui;
                font-weight: 900;
                letter-spacing: .1px;
                border-bottom: ;    font-size: 1.1rem;" class="card" onclick="window.location.href='/default_address/{{$address->id}}' ">
                <span>
                </span>
                <div>
                    <h5 class="card-title">{{$user->name}}</h5>
                    <p class="card-text">{{$address->city}}</p>
                    <p class="card-text">{{$address->pincode}}</p>
                    <p class="card-text">{{$address->address}}</p>
                </div>
            </label>
                    @endif


                {{-- <div>
                <h5 class="card-title">{{$mainaddress->name}}</h5>
                <p class="card-text">{{$address->city}}</p>
                <p class="card-text">{{$address->pincode}}</p>
                <p class="card-text">{{$address->address}}</p>
        </div> --}}
            @endforeach
        </div>
</div>
</div>
<script>
    let model=document.getElementById('addaddressmodelcontainer');
    function changeaddressmodel(){
         model.style.visibility='visible';
    }
    function changeaddressmodelclose(){
         model.style.visibility='hidden';
    }
</script>


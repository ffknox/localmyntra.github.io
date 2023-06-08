@extends('myntra')
@section('content')
<?php
    use App\Models\Sizes;
    use App\Models\Products;
    use App\Models\ProductImage;
    use App\Models\ProductDetails;

    $products = Products::join('product_details', 'products.id', '=', 'product_details.id')
    ->join('product_images', 'products.id', '=', 'product_images.product_id')
    ->select('products.*', 'product_details.color', 'product_details.point_one', 'product_details.point_two', 'product_images.imglink')
    ->where('products.category_id', '=', $category)
    ->where('products.id', '=', $id)
    ->first();
    $product_sizes=Sizes::where('product_id','=',$category)->get();

?>
<style>
    .imganddetailscontainer{
        display: flex;
        justify-content: space-around;
        padding:1.5rem;
    }
.imgcontainer{
    width: 60%;
    /* height:40rem; */
    overflow: hidden;
}
.imgcontainer .buydressimg{
    display: flex;
}
.imgcontainer .buydressimg div{
    width:50%;
    max-height: 25rem;
    overflow: hidden;
}
.imgcontainer .buydressimg div img{
    width: 100%;
}
.detailscontainer{
    width: 40%;
    padding-left: 1rem;
}
.colorbtn{
    border-radius: 444px;
border: 1px solid rgba(0, 0, 0, 0.322);
padding: .4rem 1.5rem;
background-color: white;
}
ul{
    font-size: 1.4rem;
    font-family: system-ui;
    color: #000000ad;
}
.classsizebtn{
    color: black;
    padding:.5rem 1rem;border:1px solid black;background-color:white;border-radius:1113px;margin:6px;
    transition: .3s;
}
.classsizebtn:focus{
    color: white;
    border: none;
    background-color: #ff3e6c;
}
#addtocartbtnid{
display: inline-block;
}
/* Extra small devices (phones, 600px and down) */
@media only screen and (max-width: 600px) {
    html{
    font-size:10px;
 }
}

/* Small devices (portrait tablets and large phones, 600px and up) */
@media only screen and (max-width: 600px) {
    html{
    font-size:10.4px;
 }
}

/* Medium devices (landscape tablets, 768px and up) */
@media only screen and (max-width: 768px) {

    html{
    font-size:11px;
 }
 .imganddetailscontainer{
        display:block;
        padding:1.5rem;
    }
    .detailscontainer{
        margin-top:2.2rem;
    width: 100%;
    padding-left: 1rem;
    padding-left: 0px;
}
.imgcontainer{
    width: 100%;
    /* height:40rem; */
    overflow: hidden;
}

}

/* Large devices (laptops/desktops, 992px and up) */
@media only screen and (max-width: 992px) {
    html{
    font-size:11.8px;
 }
}

/* Extra large devices (large laptops and desktops, 1200px and up) */
@media only screen and (max-width: 1200px) {
    html{
    font-size:12px;
 }
}
</style>

<main>

<div class="imganddetailscontainer">
<div class="imgcontainer">
    <div class='buydressimg'>
        <div>
            <img src="{{ url($products->imglink) }}" alt="">
        </div>
        <div>
            <img src="{{ url($products->imglink) }}" alt="">
        </div>
    </div>
    <div class='buydressimg'>
        <div>
            <img src="{{ url($products->imglink) }}" alt="">
        </div>
        <div>
            <img src="{{ url($products->imglink) }}" alt="">
        </div>
    </div>
</div>

<div class="detailscontainer">
    <div style="border-left:1px solid rgba(0, 0, 0, 0.24);padding-left:1.1rem;" class="detailscontainerchild">

        <h2>{{$products->name}}</h2>
        <p style="color: #535665;padding: .5rem 2rem 1.4rem 0;font-size: 1.5rem;opacity: .8;font-weight: 400;">{{$products->description}}</p>
        <hr>
        <div ><span><b style="color: #535665;padding: .5px .2rem 1.4rem 0;font-size: 1.6rem;opacity: .8;font-weight: 400;">${{$products->price}}</b></span><span style="color: #535665;padding: .5rem 2rem 1.4rem 0;font-size: 1.2rem;opacity: .8;font-weight: 400;"> MRP $454</span><span style="color:rgba(255, 0, 0, 0.685); font-size:1.1rem"><b>(Rs.8800 OFF)</b></span></div>
        <div><span style="    color: #03a685;font-weight: 700;font-size: 1.2rem;display: block;margin: .5rem 1rem 0 0;">inclusive of all taxes</span></div>
        <br>
        <div>
            <div style="font-weight:700;font-size: 1.6rem;
            text-transform: uppercase;
            letter-spacing: .2rem;">COLORS</div>
                <br>
                <div class="colorscontainer">
                    <button class='colorbtn'>{{$products->color}}</button>
                </div>

            </div>
            <br>
            <br>
        <div class="buydresssize">
            <div><span style="    display: inline-block;
                font-size: 16px;
                margin: 0;
                font-weight: 700;">SELECT SIZE</span>&nbsp;&nbsp;&nbsp;&nbsp;<span style="outline: 0;background-color: transparent;border: 0;letter-spacing: .5px;text-align: right;padding: 0 0 5px;color: #ff3e6c;font-size: 14px;font-weight: 700;text-transform: uppercase;margin-top: 0;">SIZE CHART</span></div>
    <br>
    <div style="display: flex;flex-wrap:wrap;" class="sizes">
        @foreach ($product_sizes as $ps)
        <button onclick="selectsize('{{$ps->size}}')" style="" class="classsizebtn"><b>{{$ps->size}}</b></button>
       @endforeach
    </div>
    <p id="sizeselecterror">Please select Size to add</p><style> #sizeselecterror{ color:red;font-family:system-ui;font-size:1rem;display:none; } </style>
        </div>
        <br>
        <div class="mainbtncontainer">
            <button style="margin-right:5px;background-color: #ff1f46;
            border: none;
            color: white;
            padding: 1.1rem 2.4rem;" onclick="addtocart()" id='addtocartbtnid'><b>
                ADD TO CART
            </b></button>
            @if (session('gotobag'))
            <style>
#addtocartbtnid{
    display: none;
}
            </style>
            <button style="margin-right:5px;background-color: #ff1f46;
                border: none;
                color: white;
                padding: 1.1rem 2.4rem;" onclick='window.location.href = "/cart";' id="gotobagbtnid"><b>
                    GO TO CART
                </b></button>
                @endif
            <button style="
            border:1px solid rgba(0, 0, 0, 0.384);
            border-radius;3px;
            background-color:white;
            color:black;
            padding:1.1rem 2.4rem;"><b>WISHLIST</b></button>
        </div>
        <br><br>
        <ul>
            <li>Nemo enim</li>
            <br>
            <li>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit sed quia consequuntur magni</li>
            <br>
            <li>Nemo enim ipsam voluptatem quia consequuntur magni</li>
        </ul>
</div>
</div>
</div >

</main>

<script>
    let size=null;
    let user=@json(session('user'));
    let gotobag=@json(session('gotobag'));
    let sizeselecterror = document.getElementById('sizeselecterror');
    let gotobagbtnid = document.getElementById('gotobagbtnid');
    let addtocartbtnid = document.getElementById('addtocartbtnid');
    function selectsize($sizevalue){
        size=$sizevalue;
        sizeselecterror.style.display='none';
        gotobagbtnid.style.display='none';
        addtocartbtnid.style.display='inline-block';
    }
    function addtocart(){
        if (size !== null) {
            if(user===null){
                window.location.href = '/register';
            }
            else{
                window.location.href = '/addedintocart/' + <?= $products->id ?> + '/' + size;
            }
        sizeselecterror.style.display='none';
    } else {
        sizeselecterror.style.display='block';
    }
    }
</script>


@endsection


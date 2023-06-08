<?php
    use App\Models\Products;
    use App\Models\ProductImage;
    use App\Models\ProductDetails;
?>

<style>
    .maincontainer {
        display: flex;
        flex-wrap: wrap;
        padding: 10px;
        justify-content: center;
    }
    .card {
        /* display: inline-block; */
        margin: 1rem;
        width: 15rem;
        border: none;
        box-shadow: #0000001a 1px 1px 4px 0px;
        transition: 0.3s;
        height: 26rem;
    }
    .card:hover {
        height: 27rem;
        width: 16rem;
        box-shadow: #00000054 1px 1px 5px 0px;
    }
    .cardhoverdestwo{
        display: none;
        transition:display 0.3s;
    }
    .cardhoverdesone{
        display: block;
        transition:display 0.3s;
    }
    .card:hover .cardhoverdestwo{
    display: block;
    }
    .card:hover .cardhoverdesone{
display: none;
    }
    .card .img {
        border: red;
        overflow: hidden;
        width: 100%;
        height: 18rem;
    }
    .card .content {
        padding: 7px;
        height: auto;
        width: 100%;
    }
    .wishlistbtn {
        width: 20px;
        transition: 0.3s;
    }
    .wishlistbtn:hover {
        width: 22px;
    }
</style>

<main>
    <div class="maincontainer">
        <?php
            $products = Products::join('product_details', 'products.id', '=', 'product_details.id')
                ->join('product_images', 'products.id', '=', 'product_images.product_id')
                ->select('products.*', 'product_details.color', 'product_details.point_one', 'product_details.point_two', 'product_images.imglink')->where('category_id','=',1)
                ->get();
        ?>

        @foreach ($products as $product)
            <div onclick="window.location.href = '/buy/{{$product->name}}/{{$product->category_id}}/{{$product->id}}/buy'" class="card">
                <div class="img">
                    <img style="width:100%;" src="{{ asset($product->imglink) }}" alt="">
                </div>
                <div class="content">
                    <div>
                        <h3 style="font-size: 1.5rem;color: #404040;">{{ $product->name }}</h3>
                        <p class="cardhoverdesone" style="font-size: 1.1rem;color: #404040bd;"> {{substr($product->description, 0, 23)}}..</p>
                        <p class="cardhoverdestwo" style="font-size: 1.1rem;color: #404040bd;"> {{substr($product->description, 0, 50)}}..</p>
                    </div>
                    <div style="display:flex;justify-content:space-between;">
                        <span><span><b>Rs. </b></span>{{$product->price}}</span>
                        <span>
                            <img class="wishlistbtn" src="{{ asset('img/pngwing.com (9).png') }}" alt="">
                        </span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</main>

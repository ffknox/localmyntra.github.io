@extends('myntra')
@section('content')



<?php
    use App\Models\Sizes;
    use App\Models\Address;
    use App\Models\Register;
    use App\Models\Products;
    use App\Models\MainAddress;
    use App\Models\ProductImage;
    use App\Models\ProductDetails;

   $addresses=Address::where('user_id','=',session('user'))->get();
   $user=Register::where('id','=',session('user'))->first();

?>

<style>
    main{
        padding: 3rem;
    }
    html{
        font-size: 12px;
    }
    .maincontainer{
        width: 100%;
        display: flex;
        border-top: 1px solid rgba(0, 0, 0, 0.171);
    }
    .addresscontainer{
        width: 75%;
        border-left: 1px solid rgba(0, 0, 0, 0.171);
        padding-left: 1.5rem;
        height: 100vh;
    }
    .card{
        width: 85%;
        border: 1px solid rgba(0, 0, 0, 0.144);
        margin-top: 1.4rem;

    }
    .linkcontainer{
        width:25%;
        height: 100vh;

    }
    .card-text{
        margin-top:-.9rem;
        color: rgba(0, 0, 0, 0.616);
        font-weight: 500;
    }
    .card-title{
        padding-bottom:.7rem;
    }
    .accountnamenumcontainer{
    margin-top:2rem;
padding-left: 10px;
box-sizing: border-box;
    }
    .username{
        font-weight: 800;
    color: #000000bb;
    }
    .usernum{

    }


    #color-blue {
        margin-top:2px;
  appearance: none;
  -webkit-appearance: none;
  -moz-appearance: none;
  width: 16px;
  height: 16px;
  border: 1px solid #c2c2c2;
  border-radius: 23333px;
  cursor: pointer;
  position: absolute;
  top: 4px;
  left: 3px;
}

/* Create a custom checkbox */
#color-blue:checked {
  background-color: #ff0080; /* Tick color */
  border-color:  1px solid black;
  border: 3px solid white;
    outline: 1px solid #000000a6;

}

/* Style the tick icon */

    </style>

    <main>
        <div class="accountnamenumcontainer">
            <div class="username">ACCOUNT</div>
            <div class="usernum">
                @if (session('user'))
                @if ($user->name)
                {{$user->name}}
                @else
                               Guest

                @endif
@else
               Guest
@endif
<span>&nbsp;&nbsp;<img style="width:13px;" src="{{url('img/edit.png')}}" alt=""></span>
            </div>
        </div>
        <div class="maincontainer">
                <div class="linkcontainer">

                </div>
                <div class="addresscontainer">
                    <div style="margin-top:1.4rem;width: 85%;display:flex;justify-content:space-between;padding:.3rem;">
                        <h1 style="font-size: 2rem;color: #000000c2;">Saved Address</h1>
                        <button onclick="addressmodel()" style="background-color:rgba(255, 255, 255, 0);padding:.7rem 2rem;border-radius:2px;border:1px solid rgba(0, 0, 255, 0.199);color:rgba(0, 0, 255, 0.589);font-weight:800;">ADD NEW ADDRESS</button>
                    </div>
                    @if (!session('user'))
                    <center>
                        <img style="width:45%;" src="{{url('img/pngwing.com (8).png')}}" alt="">
                        <br>
                        <a style="padding:.8rem 1.6rem;border:none;background-color:#0c4dffce;border-radius:4px;color:white;text-decoration:none;font-weight:700;" href="/register">SIGNUP OR LOGIN</a>

                    </center>
                        @else
                        @if ($addresses->count()==0)
                        <center>
                            <img style="width:45%;" src="{{url('img/pngwing.com (8).png')}}" alt="">
                            <br>
                            <b>No address found</b>
                        </center>
                    @else
                    @foreach ($addresses as $address)

                        <label class="card" onclick="window.location.href='/default_address/{{$address->id}}'">
                            <span style="position: absolute;top1px; left:1px;">
                                <?php
                                  $mainadressel=MainAddress::where(['user_id'=>session('user'),'address_id'=>$address->id])->first();
                                  ?>
                            @if ($mainadressel)
                            <input type="radio" id="color-blue" name="color" checked>
                            @else
                            <input type="radio" id="color-blue" name="color">
                            @endif
                        </span>
                        <div>
                            <h5 style="background-color:rgba(247, 247, 247, 0.781);" class="card-header">
                            &nbsp;&nbsp;&nbsp;&nbsp; @if ($user->name)
                            {{$user->name}}
                            @else
                            Guest
                            @endif
                        </h5>
                        <div class="card-body">
                            <h5 class="card-title">{{$address->state}}</h5>

                            <p class="card-text">City {{$address->city}}</p>
                            <p class="card-text">Pincode {{$address->pincode}}</p>
                            <p class="card-text">Address {{$address->address}}</p>
                            <p class="card-text" style="cursor:pointer;color:rgba(0, 173, 9, 0.788);font-weight:800;letter-spacing:.1px;font-size:.9rem;margin-top:.5rem;">MAKE THIS DEFAULT</p>
                            <span>
                                <a href="#" class="btn btn-primary">EDIT</a>
                                <a href="#" class="btn btn-primary">REMOVE</a>
                            </span>
                        </div>
            </div>
        </label>
        @endforeach
        @endif
        @endif
    </div>
    </div>

</main>
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
</style>
    <div id='addaddressmodelcontainer'>
        <div style="width:60%;">
            @include('addaddressform')
        </div>
    </div>

<script>
    let model=document.getElementById('addaddressmodelcontainer');
    function addressmodel(){
         model.style.visibility='visible';
    }
    function closeaddaddressmodel(){
         model.style.visibility='hidden';
    }
</script>

@endsection

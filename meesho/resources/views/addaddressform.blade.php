
    <style>
        html{
            font-size: 12px;
        }
        .title-style{
    font-family: Georgia, 'Times New Roman', Times, serif;
    font-weight: 700;
    font-size: 2rem;
    color: hsl(52, 0%, 98%);
    }
    .title-quote{
    font-family: Georgia, 'Times New Roman', Times, serif;
    font-weight: 400;
    color: hsl(52, 0%, 98%);
    }
    </style>
        <form action="/add/address" method="get" style="width:100%;">
            @csrf
    <div style="height:fit-content;" class="container py-5">
        <div class="row d-flex justify-content-center align-items-center">
          <div  class="col">
            <div style="width:100%;" class="card my-4 shadow-3">
              <div class="row g-0">
                <div class="col-xl-6">
                  <div class="card-body p-md-5 text-black">
                    <h3 class="mb-4 text-uppercase">Delivery Address</h3>

                    <div class="row">


                    <div class="form-outline mb-4">
                      <input type="text" id="form3Example8" class="form-control form-control-lg" name="address" />
                      <label class="form-label" for="form3Example8">Address</label>
                    </div>
                    @error('address')
                    <span style="    color: red;
                        font-size: 0.9rem;
                        font-family: system-ui;" class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror


                    <div class="row">
                        <div class="col-md-6 mb-4">
                        <div class="form-outline mb-4">
                            <input type="text" id="form3Example3" class="form-control form-control-lg" name="state" />
                            <label class="form-label" for="form3Example3">State</label>
                        </div>

                        @error('state')
                        <span style="    color: red;
                            font-size: 0.9rem;
                            font-family: system-ui;" class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-4">

                          <div class="form-outline mb-4">
                            <input type="text" id="form3Example3" class="form-control form-control-lg" name="city" />
                            <label class="form-label" for="form3Example3">City</label>
                          </div>
                          @error('city')
                          <span style="    color: red;
                              font-size: 0.9rem;
                              font-family: system-ui;" class="text-danger">
                                  {{ $message }}
                              </span>
                          @enderror


                      </div>
                    </div>

                    <div class="form-outline mb-4">
                      <input type="text" id="form3Example3" class="form-control form-control-lg" name="pincode" />
                      <label class="form-label" for="form3Example3">Pincode</label>
                    </div>

                    @error('pincode')
                    <span style="    color: red;
                        font-size: 0.9rem;
                        font-family: system-ui;" class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                    <div class="display:flex; justify-content:space-between;">
                      <input type="submit" class="btn btn-success btn-lg ms-2"
                        style="background-color:hsl(210, 100%, 50%) " value="Add Address" />
                        <span class="btn btn-success btn-lg ms-2"
                          style="background-color:hsl(210, 100%, 50%) " onclick="closeaddaddressmodel()">CLose</span>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
      </div>
    </form>







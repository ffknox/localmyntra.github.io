

    <style>
html{
    font-size:12px;

}
        .submitbtn{
            padding: 1rem 2.3rem;
        color: white;
        background-color: rgba(255, 37, 128, 0.774);
        border: none;
        font-weight: 700;
        width: 85%;
        margin-top:1.8rem;
}
form img{
    width:100%;
}
form h1{
    color: rgba(0, 0, 0, 0.699);
    font-size: 1.5rem;
    font-weight: 700;
    font-family: system-ui;
}
.registerform{
    width: 50%;
    border-radius: 7px;
    background-color:;
    overflow: hidden;
    background-color: white;
    padding-bottom:2rem;
}
.phonenumberinput{
    border: none;
    border-bottom:1px solid rgba(0, 0, 0, 0.568);
    color: rgba(0, 0, 0, 0.801);
    width: 85%;
    margin-top:1rem;
    height: 35px;
    outline: none;
    transition: .4s;
}
.phonenumberinput:focus{
    border-bottom:1px solid rgba(255, 37, 92, 0.774);
    width:81%;
}
.registerformcontainer{
    width: 100%;
    height: 100%;
    display: flex;
    justify-items: center;
justify-content: center;
}
.formfooter{

margin-top: 4rem;
}


/* Extra small devices (portrait phones, up to 407px) */
@media only screen and (max-width: 407px) {
    html {
        font-size: 8.5px;
    }
}

/* Small devices (portrait phones, 408px to 599px) */
@media only screen and (min-width: 408px) and (max-width: 599px) {
    html {
        font-size: 9px;
    }
}

/* Medium devices (landscape tablets, 600px to 767px) */
@media only screen and (min-width: 600px) and (max-width: 767px) {
    html {
        font-size: 11px;
    }
}

</style>


<form class="registerform" action="/submit" method="post">
    @csrf
    <img src="{{ url('img/1661417516766.webp') }}" alt="">
    <br>
    <br>
    <div style="padding: 10px; display: flex; flex-wrap: wrap; justify-content: space-around;">
        <h1 style="font-size:2rem;">SIGNUP OR LOGIN</h1>

        <input name="PhoneNumber" placeholder="Phone Number" class="phonenumberinput" type="text">
        @error('PhoneNumber')
        <span style="    color: red;
            font-size: 0.9rem;
            font-family: system-ui;" class="text-danger">
                {{ $message }}
            </span>
        @enderror
        <input class="submitbtn" type="submit" value="SUBMIT">
    </div>
    <div class="formfooter">
        <center>
            <h5 style="font-size: 1rem;
            font-family: system-ui;">By continuing, you agree to Meesho’s</h5>
            <h5 style="margin-top: -2px;font-size: 1rem;
            font-family: system-ui;">
                <span style="color: rgb(255, 45, 80);">Terms & Conditions</span>
                <span>and</span>
                <span style="color: rgb(255, 45, 80);">Privacy Policy</span>
            </h5>
        </center>
    </div>
</form>

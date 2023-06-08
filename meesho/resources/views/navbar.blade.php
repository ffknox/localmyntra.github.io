
<style>
    header{
        position: fixed;
        width: 100%;
        z-index: 100000000000;
    }
    html{
        font-size: 12px;
    }
    nav {
        display: flex;
        align-items: center;
        justify-content: space-between;
        background-color: #fff;
        padding: 1.0rem;
        color: #333;
        box-shadow: 0 .2rem .4rem rgba(0, 0, 0, 0.1);
    }

    .logo img {
        height: 4.0rem;
        width: auto;
    }

    .menu ul {
        list-style: none;
  display: flex;
  margin: 0;
  padding: 0;
}

.menu li {
    margin-right: 2rem;
}

.menu a {
    text-decoration: none;
    color: #858585;
    font-weight: 600;
    transition: color 0.3s;
    font-size: 1.06rem;
    font-weight: bolder;
    font-family: system-ui;
}

.menu a:hover {
    color: #ff0c71;
}

.search-profile form {
    display: flex;

}


.search-profile input[type="text"] {
    background: none;
    outline: none;
    border: none;
}

.search-profile button {
    padding: .8rem;
    border: none;
    background-color: transparent;
    cursor: pointer;
}

.user-profile a {
    margin-left: 1rem;
    color: #333;
    text-decoration: none;
    font-size: 2rem;
}
.user-profile{
    display: flex;
    align-items: center;
}
.search-profile a{
    display: flex;
    align-items: center;
}
.search-profile {

  border: none;
  border-radius: .2rem;
  font-size: 1.4rem;
  background-color: #ededed;;
}
/* Responsive styles */
@media screen and (max-width: 768px) {
    .menu {
        display: none;
    }

    .search-profile {
        display: flex;
    }

    .search-profile input[type="text"],
    .search-profile button {
        font-size: 1.4rem;
    }
}

</style>










<header>


    <nav>
        <div class="logo">
            <img src="{{url('img/Myntra_logo_vertical-e1630242496586.png')}}" alt="Myntra Logo">
        </div>
        <div class="menu">
            <ul>
                <li><a href="#">MEN</a></li>
                <li><a href="/wom">WOMEN</a></li>
                <li><a href="#">KIDS</a></li>
                <li><a href="#">HOME &amp; LIVING</a></li>
                <li><a href="#">BEAUTY</a></li>
                <li><a href="#">STUDIO NEW</a></li>
            </ul>
        </div>
        <div style="display:flex;align-items:center; height: 35px;" class="search-profile">
          <form style="display: flex;align-items:center;margin-bottom:0px;    height: 100%;">
            <div type="submit">
              <svg style="width:30px;fill: #8f8f8f;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 460 512"><!--! Font Awesome Free 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. --><path d="M220.6 130.3l-67.2 28.2V43.2L98.7 233.5l54.7-24.2v130.3l67.2-209.3zm-83.2-96.7l-1.3 4.7-15.2 52.9C80.6 106.7 52 145.8 52 191.5c0 52.3 34.3 95.9 83.4 105.5v53.6C57.5 340.1 0 272.4 0 191.6c0-80.5 59.8-147.2 137.4-158zm311.4 447.2c-11.2 11.2-23.1 12.3-28.6 10.5-5.4-1.8-27.1-19.9-60.4-44.4-33.3-24.6-33.6-35.7-43-56.7-9.4-20.9-30.4-42.6-57.5-52.4l-9.7-14.7c-24.7 16.9-53 26.9-81.3 28.7l2.1-6.6 15.9-49.5c46.5-11.9 80.9-54 80.9-104.2 0-54.5-38.4-102.1-96-107.1V32.3C254.4 37.4 320 106.8 320 191.6c0 33.6-11.2 64.7-29 90.4l14.6 9.6c9.8 27.1 31.5 48 52.4 57.4s32.2 9.7 56.8 43c24.6 33.2 42.7 54.9 44.5 60.3s.7 17.3-10.5 28.5zm-9.9-17.9c0-4.4-3.6-8-8-8s-8 3.6-8 8 3.6 8 8 8 8-3.6 8-8z"/></svg>
                {{-- <img style="width: 4.0rem;" src="{{url('img/Myntra_logo_vertical-e1630242496586.png')}}" onclick="menusidebar()" alt="Myntra Logo"> --}}
            </div>
            <div style="height: 100%;">
                <input style="height: 100%;" type="text" placeholder="Search prduct here">
            </div>
        </form>
    </div>
    <div class="sidebarmenu">
            <svg id="menubtn" onclick="menusidebar()" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/></svg>
            {{-- <img style="width: 4.0rem;" src="{{url('img/Myntra_logo_vertical-e1630242496586.png')}}" onclick="menusidebar()" alt="Myntra Logo"> --}}
          </div>
    </nav>

    <style>
        .sidebarmenu{
      width: fit-content;
    }
    #menubtn{
      width: 2.4rem;fill: #6d6d6d;
      transition: fill 0.3s;
    }
       #menubtn:hover{
        fill:#ff0c71;
       }


    .sidebarpage{
        width: 25rem;
        height: 100vh;
        background-color: rgb(248, 247, 247);
        overflow-y: scroll;
        border-right: rgb(255, 9, 50) solid 2px;
        box-sizing: border-box;
        padding:10px;
        margin-left:-210px;
        visibility:hidden;
        opacity: 0;
        transition: 1s;
      }
      .sidebarpagecontainer{
        background-color: rgba(0, 0, 0, 0.418);
        width: 100%;
        height: 100vh;
        position: absolute;
        top:0px;
        visibility:hidden;
        opacity: 0;
        transition: 1s;
        display: flex;
    }
    .sidebarlinka{
      text-decoration: none;
  color: #333333b2;
  font-weight: 600;
  transition: color 0.3s;
  font-size: 1.1rem;
  font-weight: bolder;
  font-family: system-ui;
  transition: .2s;
}
.sidebarlinka:hover{
color: #ff0c71;;

}
.sidebarlinksheading{
      text-decoration: none;
      color: #333;
      font-weight: 600;
      transition: color 0.3s;
      font-size: 1.2rem;
      font-weight: bolder;
      font-family: system-ui;
    }
</style>
<div  id="idsidebarpagecontainer" class="sidebarpagecontainer">
  <div id="idsidebarpage" class="sidebarpage">

      <div style="display:flex;width:100%;">
        <a style="padding:.8rem 1.6rem;border:none;background-color:#ff0c71;border-radius:4px;color:white;text-decoration:none;font-weight:700;" href="/register">SIGNUP OR LOGIN</a>
    </div>
    <br>
      <div style="display: flex;justify-content:space-between;align-items:center;width:100%;">
          <div class="sidebarlinksheading">PROFILE</div>
          <div>
            <span style="cursor: pointer;font-size: 20px;font-family: cursive;font-weight: bolder;color: #7e7e7e" onclick="slideclose()">X</span>
          </div>
        </div>
    <div class="sidebarlinks">

      <br>
      <div class="sidebarlinksheading">CATEGORIES</div>
      <hr>
      <br>
      <div><a class="sidebarlinka" href="">MEN</a></div>
      <br>
      <div><a class="sidebarlinka" href="/wom">WOMEN</a></div>
      <br>
      <div><a class="sidebarlinka" href="">KIDS</a></div>
      <br>
      <div><a class="sidebarlinka" href="">HOME & LIVING</a></div>
      <br>
      <div><a class="sidebarlinka" href="">BEAUTY</a></div>
      <br>
      <div><a class="sidebarlinka" href="">STUDIO</a></div>
      <br>
      <div><a class="sidebarlinka" href="">ORDER</a></div>
      <br>
      <div><a class="sidebarlinka" href="">WISHLIST</a></div>
      <br>
      <div><a class="sidebarlinka" href="/address">ADDRESS</a></div>
      <br>
      <hr>
      <div><a class="sidebarlinka" href="">BAG</a></div>
      <br>
      <div><a class="sidebarlinka" href="">ABOUT</a></div>
      <br>
      <div><a class="sidebarlinka" href="">CONTACT US</a></div>
      <br>
      <div><a class="sidebarlinka" href="">FEEDBACK</a></div>
      <br>
      <div><a class="sidebarlinka" href="/logout">Logout</a></div>
      <br>

</div>
</div>
<div style=" flex-grow: 1;
height: 100vh;" onclick="slideclose()">

</div>
</div>


</header>

<script>
  let sidebarcontainer=document.getElementById('idsidebarpagecontainer');
  let sidebarpage=document.getElementById('idsidebarpage');
function menusidebar(){
  sidebarpage.style.marginLeft='0px';
  sidebarpage.style.opacity='1';
  sidebarpage.style.visibility='visible';
  sidebarcontainer.style.marginLeft='0px';
  sidebarcontainer.style.opacity='1';
  sidebarcontainer.style.visibility='visible';
}
function slideclose(){
  sidebarcontainer.style.opacity='0';
  sidebarcontainer.style.visibility='hidden';
  sidebarpage.style.marginLeft='-210px';
  sidebarpage.style.opacity='0';
  sidebarpage.style.visibility='hidden';
}
</script>


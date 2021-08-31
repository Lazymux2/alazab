
<nav   class="navbar  mt-1 navbar-expand-sm sticky-top bg-light "  >
      <a style="background-image: url('myimages/bg-images/headerLogo.png')" class="navbar-brand h2" href="{{ route('Main') }}">
          <img src="myimages/bg-images/haederLogo.png" height="50" width="" alt="">
      
      </a>
      <button  type="button" class="navbar-toggler " onclick="openNav()" data-toggle="collapse" >
        <span class="fa fa-navicon"></span>
      </button>
        
      
      <div  class="collapse navbar-collapse justify-content-end" id="myNavbar">
        <ul  class="navbar-nav justify-content-end">
          @if ($stat=='Main')
          
          <li class="nav-item"><a class="nav-link" href={{ route('Main') }}>{{__('الرئيسية')}}<span class="fa fa-home"></span></a></li>
            
          <li class="nav-item"><a class="nav-link" href="#locm">فروعنا <span class="fa fa-map-marker"></span></a></li>
          <li class="nav-item"><a class="nav-link" href="#footer">المكتب الرئيسي</a></li>
          
          <li class="nav-item dropdown">
            <a  class=" nav-link" data-toggle="dropdown" href="#">{{__('تواصل معنا')}}
              <span class="fa fa-angle-double-down"></span>         
              <div class="dropdown-menu">
              @isset($info['facebook'])
                  
              
              <a class="dropdown-item" href="{{$info['facebook']}}">{{__('Facebook')}}</a>
              <a class="dropdown-item" href="{{$info['gmail']}}">{{__('Emial')}}</a>
              @endisset


            </div>
          </li>
          <li class="nav-item">
            <form method="POST" action="MainSearch" class="form-inline"><div class="input-group">
              @csrf
              
              <input type="hidden" name="FromMain" value="Yes"/>
              <input type="hidden" name="count" value="5">
              <input type="hidden" name="bydept" value="all">
               <input type="text" id="searchtxt" name="searchtxt" placeholder="Search" class="form-control mr-0">
               <div class="input-group-apppend">
                 <button class="btn-seccses btn " type="submit"><span class="fa fa-search"></span></button></div></div></form>
  
          </li>
        
        </ul>
       
          @endif
          
          <h1>
          <a   onclick="openNav()" style="font-size: 24pt;"  class="btn " >
            <span class="fa fa-navicon"></span>
        </a></h1>
      
        </div>
        
       
        
        
 
  </nav>
  @auth
      
  <div  class="navbar  bg-light mt-1 navbar-expand-sm  justify-content-end ">

        <ul class="navbar-nav nav">  
          <li class="nav-item">
            <a class="nav-link fa fa-cart-plus fa-2x">
      
            </a>
          </li>
          <li class="nav-item">
      <a class="nav-link ">
        {{Auth::user()->name}}
        <b class="text-info fa fa-user fa-2x"></b>
        

      </a>
    </li>
   
  </ul>
  </div>
  @endauth

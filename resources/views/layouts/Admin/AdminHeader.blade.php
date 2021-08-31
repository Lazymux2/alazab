<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    
    <script src="{{asset('js/jquery.min.js')}}" defer ></script>


    <script src="{{asset('js/app.js')}}" defer></script>
    {{--
    <script src="{{ asset('js/angular.min.js') }}" defer type="text/javascript"></script>
    <script src="{{ asset('js/angular-route.min.js') }}" defer></script>
   --}}
    <script src="{{ asset('js/admin.js')}}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
   <link href="{{asset('Fonts/fontawesome-4.6.3.min.css')}}" rel="stylesheet" />


<link href="{{ asset('css/mystyle.css') }}" rel="stylesheet" />
<link href="{{asset('css/panell.css')}}" rel="stylesheet" />


   
<style >
</style>
<script>
    function openNavAdmin() {
  document.getElementById("mySidenavAdmin").style.width = "35%";
  document.getElementById("adminapp").style.marginRight = "35%";

  document.body.className="modal-open";
}

/* Set the width of the side navigation to 0 and the left margin of the page content to 0 */
function closeNavAdmin() {
  document.getElementById("mySidenavAdmin").style.width = "0";
  document.getElementById("adminapp").style.marginRight = "0";
  document.body.className="";

}
</script>
</head>


<body>
    

    <div id="mySidenavAdmin" class="sidenavAdmin">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNavAdmin()">&times;</a>
        
        <div  class="justify-content-end mt-2 ml-2" id="">
            <ul  class="navbar-nav justify-content-end">
              
              <li class="nav-item dropdown-item"><a class="nav-link " href="{{ route('home',false) }}">{{__('الرئيسية')}}<span class="fa fa-home"></span></a></li>
              
                <li class="nav-item dropdown-item"><a class="nav-link " href="{{ route('deptadd',false) }}">{{__('أدارة الاقسام')}}<span class="fa fa-home"></span></a></li>
                <li class="nav-item dropdown-item"><a class="nav-link" href="{{ route('InfoForm',false) }}">{{__('أدارة صفحة العرض')}}</a></li>
                <li class="nav-item dropdown-item"><a class="nav-link" href="{{ route('locadd',false) }}">{{__('ادراة الفروع')}}  <span class="fa fa-map-marker"></span>
                </a></li>
                <li class="nav-item dropdown-item"><a class="nav-link" href="{{ route('getorders',['noAjax'=>'noAjax','count'=>0],false) }}">{{__('ادارة الطلبات')}}  <span class="fa fa-map-marker"></span>
                </a></li>
                
                <li class="nav-item dropdown-item"><a class="nav-link" href="{{ route('Mitem',false) }}">{{__('ادراة المنتجات')}}</a></li>
                <li class="nav-item dropdown-item">
                    <a class="nav-item btn" data-toggle="collapse" data-target="#moreAction">

                        More
                        <span class="fa fa-angle-down"></span>
                    </a>
                    <div id="moreAction" class="collapse">
                        <a class="dropdown-item" href="{{ route('register-admin',false) }}"> Add New Admin <span class="fa fa-sign-in"></span></a>
                        <a class="dropdown-item" href="#">Extras</a>
                        <a class="dropdown-item" href="#">Media</a> 
                        
                    </div>


                </li>
                
                <li class="nav-item dropdown-item">
                    <a class="nav-link btn" onclick="document.getElementById('logout').submit();">
                    Logout <span class="fa fa-sign-out"> </span></a>
                
            
            </ul>
            </div>

      </div>
      
      <!-- Use any element to open the sidenav -->
      
        <form action="{{route('logout')}}" name="logout" id="logout" style="display: none;" method="post">
            @csrf
        </form>
    
    <div id="adminapp"  style="transition: margin-right .5s;">
      
   
        <main  class=" ">

          @guest('admin')

          
              @else
          <nav   class="navbar navbar-expand-sm sticky-top  m-3  bg-light" >
            
            
            <div class="nav-item dropdown">
              <a  class="dropdown-toggle nav-link" data-toggle="dropdown" href="#">New
                <s class="fa fa-plus text-success"></s>
              <span class="caret"></span></a>
              <div class="dropdown-menu text-center">
                <a class="dropdown-item" href="{{ route('InfoForm',false) }}">{{__('أدارة صفحة العرض')}}</a>
                  <a class="dropdown-item" href="{{ route('register-admin',false) }}"><span class="fa fa-user-plus"></span>  اضافة ادمن</a>
                  <a class="dropdown-item" href="{{ route('deptadd',false) }}">{{__('اضافة قسم')}}</a>
                  <a class="dropdown-item" href="{{ route('locadd',false) }}">{{__('فرع')}}  </a>
                  <a class="dropdown-item" href="{{ route('Mitemadd',false) }}">{{__('منتج')}}</a> 
                  <a class="btn" onclick="document.getElementById('logout').submit();"><span class="fa fa-sign-out"></span>{{__('تسجيل خروج')}}</a>
              </div>
              <div class="nav-item">
                <span class="fa fa-user"></span> 
                <strong> {{Auth::user()->name}}</strong>
                <small>{{Auth::user()->email}}</small>
  
              </div> 
            </div>
            
            <div  class="navbar-collapse justify-content-end" style="position: absolute; right: 0; top:20;" id="myNavbar">
              
              <h1>
                    <a  onclick="openNavAdmin()" style="font-size: 24pt;"  class="btn " >
                    <span class="fa fa-navicon"></span>
                </a></h1>
            </div>
        </nav>
        @endguest
      
            @yield('con')
        </main>





    </div>


    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body ">
              Modal body..
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            
          </div>
        </div>
      </div>

</body></html>
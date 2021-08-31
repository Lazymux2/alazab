<div id="mySidenav"  class="sidenav sticky-top ">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    
   <ul class="navbar-nav" align='center'>
          <li class="dropdown-item nav-item"><a class="nav-link h2" href={{ route('Main') }}>{{__('الرئيسية')}}<span class="fa fa-home"></span></a>
        <hr width="50%"/>
        </li>
        <li class="nav-item">
            
        <form method="POST" action="{{ route('MainSearch') }}" class="">
            @csrf
            
            <input type="hidden" name="FromMain" value="Yes"/>
            <input type="hidden" name="count" value="5">
            
            <div class="row">
                <div class="col-2">

                    <select class="custom-select" name="bydept" id="" >
                        <option value="all">All</option>
                        @foreach ($depts as $dp)
                        @if (isset($did) && $dp->id==$did)
                            
                        <option selected value="{{$dp->id}}">{{$dp->titel}}</option>
                        @else
                            
                        <option value="{{$dp->id}}">{{$dp->titel}}</option>
                        @endif
                            
                        @endforeach
                    </select>

                </div>
                <div class="col-10">
                    <div class="input-group">
                        <input type="text" dir="auto" id="searchtxt" value="@isset($txt){{$txt}}@endisset" name="searchtxt" placeholder="Search" class="form-control">
                        <div class="input-group-apppend">
                            <button class="btn" type="submit"> <span class="fa fa-search"></span></button>
                            
                        </div>
                    
                    </div>
                </div>

            
                
            
            </div></form>

        </li>

        <li class="nav-item">
            <div class="container-fluid">
                <button class="navbar-toggler btn-block" data-toggle="collapse" data-target="#deptlist" ><h2>الاقسام
                    <span class="navbar-toggler-icon fa fa-navicon"></span> </h2>        
                </button>
                <div id="deptlist" class="collapse" style="width: 100%; font-size: small;">
                @if (isset($depts))
                @foreach ($depts as $dp)
                @if (isset($dept) && $dp->id==$dept->id  ||  (isset($did) && $dp->id==$did ))
                <a class="dropdown-item nav-item active  d{{$dp->id}}" href="{{ route('ShowItems', ['id'=>$dp->id,'count'=>8
                    ]) }}" >{{$dp->titel}}</a>
                    
                @else 
                    <a class="dropdown-item nav-item  d{{$dp->id}}" href="{{ route('ShowItems', ['id'=>$dp->id,{{--,'dept'=> base64_encode($dp),--}}'count'=>8
                    ]) }}">{{$dp->titel}}</a>
                
                
        
                    
                @endif
                    
                @endforeach
                    
                @endif
                </div>
            </div>
        
        </li>
        
        <li class="nav-item">
            <hr>
        </li>
        <li class="nav-item"><a class="nav-link" href="#locm">فروعنا <span class="fa fa-map-marker"></span></a></li>
        
        <li class="nav-item">
            <hr>
        </li>
        <li class="nav-item"><a class="nav-link" href="#footer">المكتب الرئيسي</a></li>

        
        <li class="nav-item">
            <hr>
        </li>
        <li class="dropdown-item ">

            <a class="navbar-toggler btn-block" data-toggle="collapse" data-target="#conectlist" >تواصل معنا
                <span class="navbar-toggler-icon fa fa-navicon"></span>        
            </a>
            
            <div class="collapse" id="conectlist">
                @isset($info['facebook'])
                
            
                <a class="dropdown-item" href="{{$info['facebook']}}">{{__('Facebook')}}
                <span class="fa fa-facebook"></span>
                </a>
                <a class="dropdown-item" href="{{$info['gmail']}}">{{__('Emial')}}</a>
                @endisset
            </div>
        </li>

        @auth
        
        <li class="nav-item dropdown-item">


            <a class="nav-link btn btn-lg" data-target="#account" data-toggle="collapse">
        
                
                    {{Auth::user()->name}}
                    <b class="text-info fa fa-user fa-2x"></b>
                    <br>
                    <small>{{Auth::user()->email}}</small>
                </a>
        <div class="collapse" id="account">

            <hr>
            <a href="{{route('myorders',['noAjax'=>'yes','count'=>0])}}" class="nav-link ">
    
                {{__('طلباتي ')}}
                <b class="text-warning fa fa-shopping-cart  fa-2x"></b>
            </a>
            <hr>
            <a href="">
                {{__('ادارة حسابي')}}
                <b class="text-primary fa fa-fix">

                </b>
            </a>
            <hr>
            
        <a class="nav-link btn" onclick="document.getElementById('logout').submit();">
            {{__('Logout')}} <span class="fa fa-sign-out"> </span></a>


        </div>
        
        </li>

        @else
        <li class="nav-item dropdown-item">

            <a class="btn m-3 orderNow"  data-toggle="modal" data-target="#loginModel">
                Login <span class="fa fa-sign-in"></span>
            </a>
        </li>
        @endauth


</ul>
        
</div>


<nav class="navbar navbar-expand-md  fixed-top mainnav" >
    <a class="navbar-brand h2" href="#myPage">{{ config('app.name', 'Laravel') }}</a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myNavbar">
        <span class="navbar-toggler-icon"></span>         
    </button>

    <div  class="collapse navbar-collapse justify-content-end" id="myNavbar">
    <ul  class="navbar-nav justify-content-end">
        <li class="nav-item"><a class="nav-link  h2" href="{{ route('deptadd',false) }}">{{__('أدارة الاقسام')}}<span class="fa fa-home"></span></a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('InfoForm',false) }}">{{__('أدارة صفحة العرض')}}</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('locadd',false) }}">{{__('ادراة الفروع')}}  <span class="fa fa-map-marker"></span>
        </a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('Mitem',false) }}">{{__('ادراة المنتجات')}}</a></li>
        <li class="nav-item dropdown">
        <a  class="dropdown-toggle nav-link" data-toggle="dropdown" href="#">MORE
        <span class="caret"></span></a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="{{ route('rigest',false) }}"> Add New Admin <span class="fa fa-sngin"></span></a>
            <a class="dropdown-item" href="#">Extras</a>
            <a class="dropdown-item" href="#">Media</a> 
        </div>
        </li>
        <li class="nav-item"><button class="nav-link" onclick="document.getElementById('logout').submit();">Logout</button></li>
        
    
    </ul>
    </div>

</nav>


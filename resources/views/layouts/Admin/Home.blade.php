@extends('layouts.Admin.AdminHeader')  
@section('head')
@include('layouts.Admin.Adminmenu')    
@endsection
@section('con')
    


<div class="container bg-dark  text-center" align='center'>

  <nav class="bg-light">
    <a class="btn nav-item active" onclick="swapiframe('smartphone tablet','laptop')"><span style="font-size: 30pt" class=" fa fa-laptop"></span></a>
    <a class="btn nav-item active" onclick="swapiframe('laptop tablet','smartphone')"><span style="font-size: 30pt" class=" fa fa-mobile"></span></a>
    <a class="btn nav-item active" onclick="swapiframe('smartphone laptop','tablet')"><span style="font-size: 30pt" class=" fa fa-tablet"></span></a>
  </nav>

  <div id="Aiframe" class="tablet text-center" >
    
  
    <div class="content">
      
      <iframe src="{{ url('Main') }}" style="width:100%;border:none;height:100%" >
        </iframe>
      
  </div>
  </div>
  

</div>
<div  class="container-fluid bg-light">

    </div>
    
    @endsection
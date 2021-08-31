@extends('layouts.app')

@section('content')





{{--



--}}

<div class="container-fluid  ">
<div class="row pt-4 pl-xl-4 pl-1 pr-1 " >

  <div class="col-xl-10 mb-2 bg-light  border" >
    <nav   class="navbar navbar-expand-sm sticky-top  bg-light" >
        
      <ul  class="navbar-nav ">
          <li class="nav-item"><a class="nav-link " href="{{url()->previous()}}"><span class="fa fa-angle-double-left"></span> back</a>
          </li>
          <li class="nav-item">
              <button type="button"  class="btn  btn-lg   dropdown-toggle-split" data-toggle="dropdown">
                  الاقسام
                  <span class=" fa fa-navicon"></span>
                  </button>
                  <div class="dropdown-menu">
                      <div id="depts" class="collapse show text-center mb-2" >
                                  @foreach ($depts as $dp)
                                  @if (isset($dept) && $dp->id==$dept->id)
                                  <a class="dropdown-item active d{{$dp->id}}"
  onclick="showDept('{{ route('ShowItemsAjax', ['id'=> $dp->id,'titel'=>$dp->titel,'count'=>5]) }}',$(this),{{$dp->id}})"
                                  >
                                  {{$dp->titel}}</a>
                                      @else
                                  <a class="dropdown-item d{{$dp->id}}"
  onclick="showDept('{{ route('ShowItemsAjax', ['id'=> $dp->id,'titel'=>$dp->titel,'count'=>5]) }}',$(this),{{$dp->id}})"
                                  
                                  >{{$dp->titel}}</a>
                                  @endif
                                  @endforeach 
                              </div> 
                      </div>
          </li>
      </ul>
      <div  class="navbar-collapse justify-content-end" style="position: absolute; right: 0;" id="myNavbar">
          <h1>
              <a  onclick="openNav()" style="font-size: 24pt;"  class="btn " >
              <span class="fa fa-navicon"></span>
          </a></h1>
      </div>
  </nav>
   
    <div id="listProdect" class="row pt-4" dir="auto" >
     <div  class="col-md-6 mt-2" dir="auto" align='center'><h3>{{$item->name}}</h3>
        <p class="mb-2 text-muted text-uppercase small">
            @if(isset($titel))
            {{$titel}}
            @else
           
            @foreach ($depts as $dp)
            @if ($dp->id==$item->item_id)
            {{$dp->titel}}
                
                
            @endif
                
            @endforeach
            @endif
          </p>
        <p><span class="mr-1"><strong>{{$item->price}}/RY</strong></span></p>
        <p class="pt-1" dir="rtl" align='right'>
         {{$item->desc}}   
        </p> <div class="table-responsive">
        <table dir="auto" class="table table-sm  mb-0">
            <tbody>
              <tr><th scope="row" class="pl-0 w-25"><strong>الموديل</strong></th>
              <td>{{$item->name}}</td></tr> <tr><th scope="row" class="pl-0 w-25"><strong>السعر</strong></th>
                <td>{{$item->price}}</td></tr> 
                
              </tbody></table></div>
                <hr>
                {{--<div class="table-responsive mb-2">
                  <table class="table table-sm table-borderless">
                    <tbody><tr><td class="pl-0 pb-0 w-25">Quantity</td>
                      <td class="pb-0">Select size</td></tr> <tr><td class="pl-0">
                        <div class="def-number-input number-input safari_only mb-0"><button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"></button> <input min="0" name="quantity" value="1" type="number" class="quantity"> <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button></div></td> <td><div class="mt-1"><div class="form-check form-check-inline pl-0"><input type="radio" id="small" name="materialExampleRadios" checked="checked" class="form-check-input"> <label for="small" class="form-check-label small text-uppercase card-link-secondary">Small</label></div> <div class="form-check form-check-inline pl-0"><input type="radio" id="medium" name="materialExampleRadios" class="form-check-input"> <label for="medium" class="form-check-label small text-uppercase card-link-secondary">Medium</label></div> <div class="form-check form-check-inline pl-0"><input type="radio" id="large" name="materialExampleRadios" class="form-check-input">
          <label for="large" class="form-check-label small text-uppercase card-link-secondary">Large</label>
          </div>
        </div>
      </td>
    </tr>
    </tbody>
    </table>
      </div>--}} 
        <button type="button" class="btn btn-primary btn-md mr-1 mb-2">Buy now</button> <button type="button" class="btn btn-light btn-md mr-1 mb-2">
          <i class="fas fa-shopping-cart pr-2"></i>Add to cart</button>
          <div class="row">
            
          </div>
        </div>
      
        
        <div class="col-md-6">
        
          <div class="row">
            <div class="col-12 mb-4" align="center">
              
          <img id="mainimg" src="myimages/moreitemsphoto/{{$item->imgs[mt_rand(0,count($item->imgs)-1)]}}"
          class="img-thumbnail mt-1"  />
        </div>
        @foreach ($item->imgs as $img)
  
        <div class="col-lg-3 border col-md-4 col-sm-4 col-6 mt-2" >
        <a class="btn" onclick="showimg('{{$img}}')" >
        <img src="myimages/moreitemsphoto/{{$img}}"
        class="img-thumbnail mt-1"/></a>
      </div>
        @endforeach
     
      
      
        </div>
        </div>
    </div>
    </div>







<div class="col-xl-2 " >
  <nav id="sidebar" class="sticky-top bg-light" >

      <div class="container-fluid">
      
  <form action="#" class="form-inline " style="width: 100% !important;"><div class="input-group">
      <input dir="auto" type="text" placeholder="بحث" class="form-control mr-0">
      <div class="input-group-append">
          <button class="btn" type="submit"><span class="fa fa-search"></span></button></div></div></form>

      </div>


      <div class="p-4 pt-5" align='center' dir="auto">
          
          <button class="navbar-toggler" data-toggle="collapse" data-target="#demo" ><h2>الاقسام
              <span class="navbar-toggler-icon fa fa-navicon"></span> </h2>        
          </button>
          <div id="demo" class="collapse">
          @if (isset($depts))
          @foreach ($depts as $dp)
          @if (isset($dept) && $dp->id==$dept->id)
          <a class="dropdown-item active d{{$dp->id}}" href="{{ route('ShowItems', ['dept'=> base64_encode($dp),'count'=>5
              ]) }}">{{$dp->titel}}</a>
              
          @else     <a class="dropdown-item d{{$dp->id}}" href="{{ route('ShowItems', ['dept'=> base64_encode($dp),'count'=>5
              ]) }}">{{$dp->titel}}</a>
          
              
          @endif
      
              
             @endforeach
              
             @endif
          </div>

          
          
          <hr>
          
      
</div>

<h2>Recent Product</h2>
<hr>





 
{{--<a href="#" class="link" target="_blank" rel="noopener noreferrer"><span class="fa fa-angle-double-down"></span>see more</a>
  --}}<hr>
</nav>
</div>
</div>
</div>




@endsection

@section('footer')
@include('layouts.footer')
    
@endsection
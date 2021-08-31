@extends('layouts.app')
@section('navbar')
    
<ul class="nav  navbar-expand-md  bg-light fixed-top mainnav">
    <li class="nav-item">
      <a class="nav-link" href="{{ route('Main') }}">Home</a>
    </li>
    <li class="nav-item nav-link">/</li>
    <li class="nav-item dropdown">

        <a  class="dropdown-toggle nav-link" data-toggle="dropdown" href="#">{{__('الاقسام   ->')}}
            <span class="caret"></span></a>
            <div class="dropdown-menu">
            

        <ul  class="nav nav-pills text-center bg-light sticky-top   justify-content-center flex-column">
            @foreach ($depts as $d)
        @if ($d->id ==$dept->id)
            
        
        <li class="nav-item " >
            <a  style="width: 100%;"
            href="{{ route('ShowItems', ['dept'=> base64_encode($d),'count'=>5
            ]) }}" class="nav-link  active show">{{$d->titel}}</a></li>
    
        @else
        <li class="nav-item">
            <a 
            href="{{ route('ShowItems', ['dept'=> base64_encode($d),'count'=>5
            ]) }}"
            class="nav-link">{{$d->titel}}</a></li>
            
        @endif
            
        @endforeach
        </ul>
            </div>
    </li>
    <li class="nav-item">
        <a class="nav-link disabled" >{{$dept->titel}}</a>
    </li>

</ul> 
@endsection

@section('content')
<div class="container-fluid ">
   
    <div class="row">
    <div dir="auto"  class="container">

    
        <div align='center' class="border container">
        <h1>{{$dept->titel}}</h1>
        <input type="hidden" id="deptid" name="deptid" value="{{$dept->id}}">

        <div class="row">
        <img   class="col-lg-6 col-md-6"  align='right'  src="myimages/items/{{$dept->img}}"  />
    
        <h5 class="col-lg-6 col-md-6">
            {{$dept->desc}}</h5>
        </div>

        </div>
    
    
    </div></div>

    <br/>
    <br/>



    <div dir="auto" class="row ">
        


        <div class="col-md-12">

<div class="panel-default">
<div  class="panel-heading">
    <label for="searchitemsf" class="col form-inline form-control">Search:
    <input type="search" id="searchitemsf" class="col form-inline form-control" name="searchitems" /></label>
</div>

<div class="panel-body">

    <div class="container-fluid">
        <div class="row" align='center' id="itemsrow">
            
            @if (count($items)==0)
            <h1 align='center' class="aling-center bg-light">No Items !</h1>
                
            @else
                
            @endif
                        @foreach ($items as $item)
                    
                        
                            <div align='center' style="" dir="auto" class="col-lg-3 col-md-6 col-sm-6 card" >
                                <div dir="auto" class="card-body container">
                                <h4 class="card-title">{{$item->name}}</h4>
                                
                                <img class="card-img-bottom" style="margin: 15px;" 
                                src="myimages/moreitemsphoto/{{$item->imgs[mt_rand(0,count($item->imgs)-1)]}}" alt="Card image" style="width:100%;">
                                <h5 class="card-text">
                                    @if (strlen($item->desc)>=150)
                        {{substr($item->desc,0,149)}}
                    @else
                        {{$item->desc}}
                    @endif
                                </h5>
                                <h3 class="align-bottom" >
                                    @if ($item->price ==0)
                                        
                                    @else
                                    {{$item->price}}    
                                    @endif
                                    </h3> 
                                </div>
                                <div class="card-footer">
                                    <input type="hidden" id="url" name="url" value="{{$url}}">
                                    <input type="hidden" id="titel" name="titel" value="{{$dept->titel}}">
                                    
                                    <a href="{{ route('deatils', ['item'=> base64_encode($item) ,'titel'=>$dept->titel] ) }}" 
                                        class="btn btn-block btn-primary">
                                        <span class="fa fa-eye"></span> See Product</a>
                            
                                </div>
                            
                            </div>
                            @endforeach
                            
                            <input type="hidden" name="count" id="count" value="{{$count}}">
                            @if (count($items)!=0)
                            <a id="showmoreitems" onclick="showmore()"  class="btn btn-block bg-light" ><span class="fa fa-angle-double-down"></span> More</a>
            @endif
            </div>

        </div>
    </div>


    
</div>

</div>
        </div>

    </div>
</div>
    
@endsection
@section('footer')
 @include('layouts.footer')
    
@endsection
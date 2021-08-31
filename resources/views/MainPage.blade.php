@extends('layouts.app')

@section('navbar')

@include('layouts.navbarFixed',Array('stat'=>'Main'))

<div class="container-fluid bg-light" style="position: relative">
  <img src="myimages/bg-images/header.png"  width="100%" height="" alt="">

  <div class="" style="position: absolute;bottom: 0; left: 50;" align='center'>

  </div>
  <div class=" pt-4 pb-4 mt-3 " align='center'>
    <h2 style="color: red;" > العزب للتجارة العامة والاستيراد</h2>
    @isset($info['note'])
    <p> {{$info['note']}} </p>
    
    @endisset

  </div>
</div>
@endsection

@section('content')
  












<hr>
<div class="container-fluid">  
  <div class="row"> 
@foreach ($reitems as $rit)

<div class="col-xl-2 col-lg-3 col-md-2 col-6 mt-2 mb-5  ">
<div class="product-grid new bg-light smallest mt-2 mb-2">
<div class="product-image text-center">
    <a href="{{ route('deatils', ['item'=> base64_encode($rit) ] ) }}"
        class="btn image">
        <img class="pic-1 mx-auto m-5 rounded-circle " style="max-height: 50% !important;" src="{{$rit->imgs[mt_rand(0,count($rit->imgs)-1)]}}"/>
    </a>
    <span class="product-new-label">New</span>
    <ul class="product-links">
        <li><a data-tip="Add to Wishlist"><small class="text-info fa fa-heart"></small></a></li>
        <li><a  data-tip="Quick View"><small class="text-info fa fa-search"></small></a></li>
        <li><a  data-tip="Add to Cart"><small class="text-info fa fa-shopping-bag"></small></a></li>
    </ul>
    <div class="price">RY:{{$rit->price}}</div>
</div>
<div class="product-content" style="padding: 20px;">
    <h3 class="title"><a href="{{ route('deatils', ['item'=> base64_encode($rit) ] ) }}" onclick="showProduct('{{ route('deatilsAjax', ['item'=> base64_encode($rit) ] ) }}',$(this))" >{{$rit->name}}</a></h3>
    <ul class="rating">
        <li class="fa fa-star"></li>
        <li class="fa fa-star"></li>
        <li class="fa fa-star"></li>
        <li class="fa fa-star"></li>
        <li class="fa fa-star disable"></li>
    </ul>
</div>
</div>
</div>
@endforeach   
</div>
<hr>

    <div class="container-fluid">

      <div class="panel panel-default item_panl">
       
       
       <div align="center" class="panel-heading">
          <h1 >الاقسام</h1>
        </div>
        
        
        <div class="panel-body item_list" align="center">
         
          <div class='container-fluid'>
          <div id="Itemss" class="row"  >
            @foreach ($item as $itm)
          
            
                <div class="col-lg-4 col-sm-6 col-xs-12 " onmouseover="" >
                  <div class="card deptcon">
            <blockquote class="blqu">
             <h4>{{$itm->titel}}</h4>
             <a class="link btn-block btn-default" target="_self" 
             href={{ route('ShowItems', ['id'=>$itm->id,'dept'=>base64_encode($itm),'count'=>5]) }} >
            
             <img class="img-thumbnail" src="{{$itm->img}}"  />
             </a>
             <p class="m-3 font-weight-bold" style="display: inline;" id="DP{{$itm->id}}">
               @if (strlen($itm->desc)>120)
              
               {{substr($itm->desc,0,118)}}
               
                <p id="dpr{{$itm->id}}" class="collapse mt-3 font-weight-bold">

                  {{$itm->desc}}
                </p>
               <a onclick="$('#DP{{$itm->id}}').slideToggle(900);"  data-toggle="collapse" data-target="#dpr{{$itm->id}}"
                class="btn"> ReadMore</a>
                  
               @else
               {{$itm->desc}}
                   
               @endif
             </p>
             <hr>
             <a href="{{ route('ShowItems', ['id'=>$itm->id{{--,'dept'=>base64_encode($itm)--}},'count'=>8]) }}">
        <h5 class="mt-2">  Show More</h5>
        </a>
            
        </blockquote>
            </div>
            
                  </div>
                  
                      @endforeach 
                     
                
                
      </div>  
          </div>
          </div>
      
        
      <div class="panel-footer">
      
  
      </div>
        
        
      </div>
      </div>




      



      <div id="locm" class="container-fluid">

      <div class='panel panel-default'>
        <div id="loc" class='panel-heading'>
          <h1>فروعنا</h1>
        </div>
        <div  class='panel-body'>
          <div class="row">
          @foreach ($loc as $lo)

      <div class='col-xl-3 col-lg-3 col-md-4'>
      @include('layouts.locmaps',$lo)

      </div>
      @endforeach
          </div>
        </div>
        <div class='panel-footer'></div>
      </div>
      </div>    





@endsection
@section('footer')
@include('layouts.footer')
@endsection
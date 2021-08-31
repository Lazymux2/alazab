



@extends('layouts.app')


@section('navbar')
    
@endsection    




@section('content')


<!-- Use any element to open the sidenav -->

<div class="container-fluid "  style="">


    
@isset($did)
    <input type="hidden" name="did" id="did" value="{{$did}}">
@endisset



    @if (isset($dept))
        
    <input type="hidden" name="" id="di" value="{{$dept->id}}">
    <input type="hidden" name="" id="titel" value="{{$dept->titel}}">
    
    @else
    
    <input type="hidden" name="" id="titel" value="Search">
        
    @endif


    <input type="hidden" name="" id="count" value="@isset($count){{$count}}@endisset">
    
    @isset($size)

    <input type="hidden" name="size" id="size" value="{{$size}}">
    @endisset
    
    @isset($txt)
    <input type="hidden" name="txt" id="txt" value="{{$txt}}">
        @endisset
    
   

<div class="row mb-4">
    
    <div class="col-xl-10 mb-4">
        
<div class="container-fluid bg-light" >

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
                                    @if ($dp->id==$did)
                                    <a class="dropdown-item active d{{$dp->id}}"
    onclick="showDept('{{ route('ShowItemsAjax', ['id'=> $dp->id,'titel'=>$dp->titel,'count'=>8]) }}',$(this),{{$dp->id}})"
                                    >
                                    {{$dp->titel}}</a>
                                        @else
                                    <a class="dropdown-item d{{$dp->id}}"
    onclick="showDept('{{ route('ShowItemsAjax', ['id'=> $dp->id,'titel'=>$dp->titel,'count'=>8]) }}',$(this),{{$dp->id}})"
                                    
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

    <div class="row">
        <div class="container-fluid mt-2">
        
            <form id="" style="text-align: center !important;" align='center' class="form-control SearchingForm">
                
                
               
                <div class="row">
                    <div class="col-md-4 mb-2" >
                        <button type="button"  class="btn btn-block btn-lg   dropdown-toggle-split" data-toggle="dropdown">
                            الاقسام
                            <span class=" fa fa-navicon"></span>
                            </button>
                            <div class="dropdown-menu">
                                <div id="depts" class="collapse show text-center mb-2" >
                                            @foreach ($depts as $dp)
                                            @if ($dp->id==$did)
                                            <a class="dropdown-item active d{{$dp->id}}"
            onclick="showDept('{{ route('ShowItemsAjax', ['id'=> $dp->id,'titel'=>$dp->titel,'count'=>8]) }}',$(this),{{$dp->id}})"
                                            >
                                            {{$dp->titel}}</a>
                                                @else
                                            <a class="dropdown-item d{{$dp->id}}"
            onclick="showDept('{{ route('ShowItemsAjax', ['id'=> $dp->id,'titel'=>$dp->titel,'count'=>8]) }}',$(this),{{$dp->id}})"
                                            
                                            >{{$dp->titel}}</a>
                                            @endif
                                            @endforeach 
                                        </div> 
                                </div>
                    </div>

                    <div class="col-md-8">
                    
                    
                    
            <div class="row">

                <div class="col-md-4 col-2">

                    <select class="custom-select mt-2 mb-2" name="bydept" id="" >
                        <option value="all">All</option>
                        @foreach ($depts as $dp)
                        @if ($dp->id==$did)
                            
                        <option selected value="{{$dp->id}}">{{$dp->titel}}</option>
                        @else
                            
                        <option value="{{$dp->id}}">{{$dp->titel}}</option>
                        @endif
                            
                        @endforeach
        
                    </select>
                </div>
                <div class="col-md-8 col-10">
                    <div class="input-group mt-2 mb-2">
                    <input type="text" value="@isset($txt){{$txt}}@endisset"  id="searchProdects" dir="auto" name="searchtxt" placeholder="بحث" class="form-control mr-0">
                    <div class="input-group-apppend"><button class="btn" type="submit"> <span class="fa fa-search"></span></button></div>
                    <input type="hidden" name="count" value="5"/>
                            <input type="hidden" name="Ajax" value="Yes"/>
                        
                </div>
            </div>
            
            </div>
                    
                        
                        
                    </div>

                </div>
            </form>
                </div>

    </div>
    <hr>




    <div style="" dir="auto" class="row pb-4" id="listProdect">
        
        

        @yield('ConView')
    

        @isset($items)
            
       
        @if (isset($dept))
            
        @include('ProductRow',Array('items'=>$items ,'titel'=>$dept->titel))

        @else
            

        @include('ProductRow',Array('items'=>$items ))
        @endif
 @endisset
 @isset($pro)

 @include('DeatilsAjax',Array('item'=>$pro,'countv'=>$countv))
    
 @endisset
        <hr>    
    </div>
    
    <div class="row mt-5">
        
    @if (isset($pro) || $count==$size)
    <div class="col-12 ">
        <button  id="showmorebtn" style="display: none;" class="btn btn-block ">
            <h2>More<span class="fa fa-angle-double-down"></span></h2></button>
    </div>
    @else
    <div class="col-12">
        <button  id="showmorebtn" class="btn btn-block ">
            <h2>More<span class="fa fa-angle-double-down"></span></h2></button>
    </div>
    @endif
        

    </div>
</div>
    

    </div>











    <div class="col-xl-2 col-md-12" >
        <nav id="sidebar" class="sticky-top bg-light" >

            <div class="container-fluid">
            
        <form  class=" form-inline SearchingForm"  style="width: 100% !important;">
            <div class="input-group">
                <input name="searchtxt" align='center' value="@isset($txt){{$txt}}@endisset"  id="searchProdects2" dir="auto" type="text" placeholder="بحث" class="searchProdects form-control" style="">
            
                <div class="input-group-append">
                    
                    <input type="hidden" name="count" value="5"/>
                    <input type="hidden" name="Ajax" value="Yes"/>
                    <input type="hidden" name="bydept" value="{{$did}}">
                    <button class="btn-seccses btn " type="submit"><span class="fa fa-search"></span></button>
                </div>
            </div>
            {{--
            <div class="input-group">
            <input dir="auto" type="text" placeholder="بحث" class="form-control mr-0">
            <div class="input-group-append">
                <button class="btn" type="submit"><span class="fa fa-search"></span></button></div></div>
            --}}
            </form>

            </div>


            <div class="p-4 pt-5" align='center' dir="auto">
                
                <button class="navbar-toggler" data-toggle="collapse" data-target="#demo" ><h2>الاقسام
                    <span class="navbar-toggler-icon fa fa-navicon"></span> </h2>        
                </button>
                <div id="demo" class="collapse">
                @if (isset($depts))
                @foreach ($depts as $dp)
                @if ($did==$dp->id)
                <a class="dropdown-item active d{{$dp->id}}" href="{{ route('ShowItems', ['id'=>$dp->id,'dept'=> base64_encode($dp),'count'=>8
                    ]) }}">{{$dp->titel}}</a>
                    
                @else     <a class="dropdown-item d{{$dp->id}}" href="{{ route('ShowItems', ['id'=>$dp->id,'dept'=> base64_encode($dp),'count'=>8
                    ]) }}">{{$dp->titel}}</a>
                
                    
                @endif
            
                    
                   @endforeach
                    
                   @endif
                </div>

                
                
                <hr>
                
            
    </div>
    
    <h2>Recent Product</h2>
    <hr>





    <div class="container-fluid">  
          <div class="row"> 
    @foreach ($reitems as $rit)
        
    <div class="col-xl-12 col-lg-3 col-md-4 col-6 mt-2 mb-5  ">
<div class="product-grid new bg-light smallest mt-2 mb-2">
        <div class="product-image">
            <a onclick="showProduct('{{ route('deatilsAjax', ['item'=> base64_encode($rit) ] ) }}',$(this),{{$rit->id}})" 
                class="btn image">
                <img class="pic-1 mx-auto m-5 rounded-circle" height="50" width="50" style="max-height: 50% !important;" src="{{$rit->imgs[mt_rand(0,count($rit->imgs)-1)]}}"/>
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
            <h3 class="title"><a onclick="showProduct('{{ route('deatilsAjax', ['item'=> base64_encode($rit) ] ) }}',$(this),{{$rit->id}})" >{{$rit->name}}</a></h3>
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

</div>

       
{{--<a href="#" class="link" target="_blank" rel="noopener noreferrer"><span class="fa fa-angle-double-down"></span>see more</a>
        --}}<hr>
    </nav>
    </div>
</div>
<div class="row bg-light mt-2">

    <div class="col-lg-2 col-sm-3 col-6">   </div>
</div>
</div>
@endsection
@section('footer')
@include('layouts.footer')
    
@endsection